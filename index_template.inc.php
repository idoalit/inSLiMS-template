<?php
// ----------------------------------------------------------------------------
// Define current public template directory
// ----------------------------------------------------------------------------
define('CURRENT_TEMPLATE_DIR', $sysconf['template']['dir'] . '/' . $sysconf['template']['theme'] . '/');

// ----------------------------------------------------------------------------
// get thumbnail image url
// ----------------------------------------------------------------------------
function getImagePath($sysconf, $image, $path = 'docs')
{
  // cover images var
  $thumb_url = '';
  $image = urlencode($image);
  $images_loc = 'images/' . $path . '/' . $image;
  $img_status = pathinfo('images/' . $path . '/' . $image);
  if(isset($img_status['extension'])){
    $thumb_url = './lib/minigalnano/createthumb.php?filename=' . urlencode($images_loc) . '&width=120';
  }else{
    $thumb_url = './lib/minigalnano/createthumb.php?filename=images/default/image.png&width=120';   
  }

  return $thumb_url;
}

?>
<!DOCTYPE html>
<html lang="id_ID">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_OpacSLiMS">
    <meta name="csrf-token" content="<?= bin2hex(random_bytes(16)) ?>">
    <title><?= $page_title ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" type='image/x-icon' href="<?= CURRENT_TEMPLATE_DIR ?>assets/images/favicon.ico">

    <link href="<?= CURRENT_TEMPLATE_DIR ?>assets/css/_all-skins.css" rel="stylesheet">
    <link href="<?= CURRENT_TEMPLATE_DIR ?>assets/css/ionicons.min.css" rel="stylesheet">
    <link href="<?= CURRENT_TEMPLATE_DIR ?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?= CURRENT_TEMPLATE_DIR ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= CURRENT_TEMPLATE_DIR ?>assets/css/style-slider.css" rel="stylesheet">
    <link href="<?= CURRENT_TEMPLATE_DIR ?>assets/css/AdminLTE.css" rel="stylesheet">
    <link href="<?= CURRENT_TEMPLATE_DIR ?>assets/css/site.css" rel="stylesheet">
    <link href="<?= CURRENT_TEMPLATE_DIR ?>assets/css/styles.css" rel="stylesheet">
    <script src="<?= CURRENT_TEMPLATE_DIR ?>assets/js/jquery.js"></script>
</head>


<body class="skin-blue layout-top-nav">
    <div class="wrapper" style=" background-color: #FFF;">
        <?php include __DIR__ . '/parts/header.php' ?>
        <?php include __DIR__ . '/parts/search.php' ?>
        <div class="content-wrapper" style="min-height: 507px;">
            <div class="container">
                <section class="content">
                    <?php if (isset($_GET['p']) || isset($_GET['search'])): ?>
                        <?php if (isset($_GET['search'])): ?>
                            <?php include __DIR__ . '/parts/result.php' ?>
                        <?php elseif($_GET['p'] == 'member'): ?>
                            <?php include __DIR__ . '/parts/member.php' ?>
                        <?php else: ?>
                            <?php include __DIR__ . '/parts/other.php' ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="box box-default">
                            <div class="box-body" style="padding:20px 0">
                                <?php include __DIR__ . '/parts/recommendation.php' ?>
                                <?php include __DIR__ . '/parts/popular.php' ?>
                                <?php include __DIR__ . '/parts/newest.php' ?>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $("#clients-slider").carousel({
                                    interval: 2000 //TIME IN MILLI SECONDS
                                });
                            });
                        </script>
                    <?php endif; ?>
                </section>
            </div>
        </div>
    </div>

    <?php include __DIR__ . '/parts/footer.php' ?>

    <script src="<?= CURRENT_TEMPLATE_DIR ?>assets/js/app.js"></script>
    <script src="<?= CURRENT_TEMPLATE_DIR ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {

            $(document).ready(
                function() {
                    $('a.bookmarkShow').hide();
                }
            );

        });
    </script>
</body>

</html>

<div class="modal fade" id="modalBooking" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Booking Detail</h4>
            </div>
            <div class="modal-body">
                <p id="demo"></p>
                <div id="BookingShow">
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0)" id="PrintButton" class="btn btn-primary"> <span class="glyphicon glyphicon-print"></span> Print </a>&nbsp;&nbsp;
                <button type="button" class="btn btn-default" data-dismiss="modal">&nbsp;Tutup&nbsp;</button>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalUsulan" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Usulan Koleksi</h4>
            </div>
            <div class="modal-body">
                <p id="demo"></p>
                <div id="UsulanShow">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalLogin" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login Anggota</h4>
            </div>
            <div class="modal-body ">
                <p id="demo"></p>
                <div id="LoginShow">




                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalBantuan" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Bantuan</h4>
            </div>
            <div class="modal-body">
                <ul>
                    <li> Pencarian sederhana adalah pencarian koleksi dengan menggunakan hanya satu kriteria pencarian saja. </li>
                    <li> Ketikkan kata kunci pencarian, misalnya : " Sosial kemasyarakatan " </li>
                    <li> Pilih ruas yang dicari, misalnya : " Judul " . </li>
                    <li> Pilih jenis koleksi misalnya " Monograf(buku) ", atau biarkan pada pilihan " Semua Jenis Bahan " </li>
                    <li> Klik tombol "Cari" atau tekan tombol Enter pada keyboard </li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>