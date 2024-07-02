<div class="box box-default">
    <div class="box-body" style="padding:20px 0">
        <div class="breadcrumb">
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a>Detail Result</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-2 cover"><?= $image ?></div>
                    <div class="col-md-10">
                        <table class="table table-striped">
                            <tr>
                                <td>Judul</td>
                                <td style="color:red"><?= $title ?></td>
                            </tr>
                            <tr>
                                <td>Pengarang</td>
                                <td><?= $authors ?></td>
                            </tr>
                            <tr>
                                <td>EDISI</td>
                                <td>
                                    <div itemprop="bookEdition" property="bookEdition"><?php echo ($edition) ? $edition : '-'; ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Penerbitan</td>
                                <td>
                                    <span itemprop="publisher" property="publisher" itemtype="http://schema.org/Organization" itemscope><?php echo $publish_place ?></span> :
                                    <span itemprop="publisher" property="publisher"><?php echo $publisher_name ?></span>.,
                                    <span itemprop="datePublished" property="datePublished"><?php echo $publish_year ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Deskripsi Fisik</td>
                                <td>
                                    <div itemprop="numberOfPages" property="numberOfPages"><?php echo ($collation) ? $collation : '-'; ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td>ISBN/ISSN</td>
                                <td>
                                    <div itemprop="isbn" property="isbn"><?php echo ($isbn_issn) ? $isbn_issn : '-'; ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Subjek</td>
                                <td>
                                    <div class="s-subject" itemprop="keywords" property="keywords"><?php echo ($subjects) ? $subjects : '-'; ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Bahasa</td>
                                <td>
                                    <div>
                                        <meta itemprop="inLanguage" property="inLanguage" content="<?php echo $language_name ?>" /><?php echo $language_name ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Bentuk Karya</td>
                                <td><?= $gmd_name; ?></td>
                            </tr>
                        </table>
                        <br>
                    </div>
                </div>
                <div class="row">&nbsp;</div>
                <div class="row">
                    <div class="col-md-12">
                        <span class="nav-tabs-content">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_11" data-toggle="tab">Eksemplar</a></li>
                                <li><a href="#tab_12" data-toggle="tab" title="Tampilkan Konten Digital">Konten Digital</a></li>
                            </ul>
                        </span>
                        <div class="tab-content">
                            <div class="tab-pane-content active" id="tab_11">
                                <div id="detail-<?= $biblio_id ?>">
                                    <div class="table-responsive" class="p-3">
                                        <?= ($availability) ? $availability : '<p class="text-grey-dark">' . __('No copy data') . '</p>'; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane-content " id="tab_12">
                                <div itemprop="associatedMedia" class="p-3">
                                    <?= !$file_att ? '<i>'.__('No Data').'</i>' : $file_att ; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">&nbsp;</div>
            </div>
            <div class="col-md-3">
                <span style="margin-bottom:13px"><strong>Karya Terkait :</strong></span>
                <div class="list-group facet" id="side-panel-authorStr">
                        <a href="javascript:void(0)" style="padding: 8px 40px 8px 8px;" class="list-group-item faced">Currently not available</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">&nbsp;</div>