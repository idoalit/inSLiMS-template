<?php
$sql = "SELECT max(biblio.biblio_id) AS biblio_id, max(biblio.title) AS title, max(biblio.image) As image, GROUP_CONCAT(mst_author.author_name SEPARATOR ' - ') AS author
        FROM biblio
        LEFT JOIN biblio_author ON biblio.biblio_id=biblio_author.biblio_id
        LEFT JOIN mst_author ON biblio_author.author_id=mst_author.author_id
        GROUP BY biblio_author.biblio_id
        ORDER BY RAND()
        LIMIT 20";
$query = \SLiMS\DB::getInstance()->query($sql);
$data  = $query->fetchAll(\PDO::FETCH_OBJ);
$chunk = array_chunk($data, 4);
?>

<h4>KOLEKSI UNGGULAN </h4>

<!-- CLIENT SLIDER STARTS-->
<div class="carousel slide clients-carousel" id="clients-slider-newest">
    <div class="carousel-inner">
        <?php $n=0; foreach ($chunk as $rows) : $n++;?>
            <div class="item <?= $n == 1 ? 'active' : '' ?>">
                <div class="row">
                    <?php foreach($rows as $row): ?>
                    <div class="col-sm-3 col-xs-6">
                        <a class="thumbnail" href="index.php?p=show_detail&id=<?= $row->biblio_id ?>">
                            <img src="<?= getImagePath($sysconf, $row->image) ?>" style="width:97px; height:144px;">
                            <p><?= $row->title ?></p>
                        </a>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <a data-slide="prev" href="#clients-slider-newest" class="left carousel-control">‹</a>
    <a data-slide="next" href="#clients-slider-newest" class="right carousel-control">›</a>

</div>