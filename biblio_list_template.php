<?php

function biblio_list_format($dbs, $biblio_detail, $n, $settings = array(), &$return_back = array()) {
    global $sysconf;

    $title      = $biblio_detail['title'];
    $biblio_id  = $biblio_detail['biblio_id'];
    $detail_url = SWB.'index.php?p=show_detail&id='.$biblio_id.'&keywords='.urlencode($settings['keywords']??'');

    // image thumbnail
    $images_loc = 'images/docs/'.$biblio_detail['image'];
    if($biblio_detail['image'] == '' || $biblio_detail['image'] == NULL){
        $images_loc = 'images/default/image.png';
    }
    $thumb_url = './lib/minigalnano/createthumb.php?filename='.urlencode($images_loc).'&width=240';

    $availability = getAvailability($dbs, $biblio_id, $sysconf);

    // authors
    $_authors = isset($biblio_detail['author'])?$biblio_detail['author']:biblio_list_model::getAuthors($dbs, $biblio_id, true);
    if ($_authors) {
        if (!is_array($_authors)) {
            $_authors = explode('-', $_authors);
        }
        $_authors = array_map(function($a) {
            $a = trim($a);
            return '<a href="index.php?author='.urlencode($a).'&search=Search" itemprop="name" property="name">'.$a.'</a>';
        }, $_authors);
    }
    $_authors_string = implode(' - ', $_authors);

    $no = $n+1;

    return <<<HTML
    <tr>
        <td>
            <div id="search{$n}" style="padding: 1rem 0">
                <div class="row">
                    <div class="col-sm-1"> &nbsp; {$no} &nbsp;</div>
                    <div class="col-sm-2"><a><img src="{$thumb_url}" style="width:97px ; height:144px"></a></div>
                    <div class="col-sm-9">
                        <table class="table2" style="background:transparent" width="100%">
                            <tr>
                                <th colspan="2"> <a href="{$detail_url}" class="topnav-content">{$title}</a></th>
                            </tr>
                            <tr>
                                <td width="22%">ISBN / ISSN</td>
                                <td width="78%">{$biblio_detail['isbn_issn']}</td>
                            </tr>

                            <tr>
                                <td>Edisi</td>
                                <td>{$biblio_detail['edition']}</td>
                            </tr>

                            <tr>
                                <td>Kolasi</td>
                                <td>{$biblio_detail['collation']}</td>
                            </tr>

                            <tr>
                                <td>Pengarang</td>
                                <td>{$_authors_string}</td>
                            </tr>

                            <tr>
                                <td valign=top>Penerbitan</td>
                                <td>
                                    {$biblio_detail['publish_place']}:{$biblio_detail['publisher']} <br> {$biblio_detail['publish_year']}
                                </td>
                            </tr>

                            <tr>
                                <td>Ketersediaan</td>
                                <td>{$availability} Eksemplar</td>
                            </tr>

                            <tr>
                                <td valign=top>Nomor Panggil</td>
                                <td>{$biblio_detail['call_number']}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </td>
    </tr>
    HTML;
}

function getAvailability($dbs, $biblio_id, $sysconf)
{
    // get total number of this biblio items/copies
    $_item_q = $dbs->query('SELECT COUNT(*) FROM item WHERE biblio_id='.$biblio_id);
    $_item_c = $_item_q->fetch_row();
    // get total number of currently borrowed copies
    $_borrowed_q = $dbs->query('SELECT COUNT(*) FROM loan AS l INNER JOIN item AS i'
        .' ON l.item_code=i.item_code WHERE l.is_lent=1 AND l.is_return=0 AND i.biblio_id='.$biblio_id);
    $_borrowed_c = $_borrowed_q->fetch_row();
    // total available
    $_total_avail = $_item_c[0]-$_borrowed_c[0];

    return $_total_avail;
}
