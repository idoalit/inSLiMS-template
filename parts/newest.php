<?php
$query = SLiMS\DB::getInstance()->query('select biblio_id, title, image from search_biblio order by last_update limit 20');
$data  = $query->fetchAll(\PDO::FETCH_OBJ);
$chunk = array_chunk($data, 4);
?>

<h4>KOLEKSI TERBARU </h4>

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