<?php
// ----------------------------------------------------------------------------
// Get popular title by loan
// ----------------------------------------------------------------------------
function getPopularBiblio($limit = 5)
{
  $sql = "SELECT b.biblio_id, b.title, b.image, COUNT(*) AS total
          FROM loan AS l
          LEFT JOIN item AS i ON l.item_code=i.item_code
          LEFT JOIN biblio AS b ON i.biblio_id=b.biblio_id
          WHERE b.title IS NOT NULL
          GROUP BY b.biblio_id
          ORDER BY total DESC
          LIMIT {$limit}";

  $query = \SLiMS\DB::getInstance()->query($sql);
  $return = $query->fetchAll(\PDO::FETCH_OBJ);

  if (count($return) < $limit) {
    $need = $limit - count($return);
    if ($need < 0) {
      $need = $limit;
    }

    $sql = "SELECT biblio_id, title, image FROM biblio ORDER BY last_update DESC LIMIT {$need}";
    $query = \SLiMS\DB::getInstance()->query($sql);
    
    $return = [...$return, ...$query->fetchAll(\PDO::FETCH_OBJ)];
  }

  return $return;
}

$data = getPopularBiblio(20);
$chunk = array_chunk($data, 4);
?>

<h4>KOLEKSI SERING DI PINJAM </h4>

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