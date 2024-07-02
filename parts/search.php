<section class="content-search">
    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <span class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"> <a href="#tab_1" data-toggle="tab">Cari</a> </li>
                        <li> <a href="#">Browse</a> </li>
                    </ul>
                </span>
            </div>
        </div>

        <form action="index.php" method="GET">
            <input type="hidden" name="search" value="search" />
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" id="title" placeholder='Masukan kata kunci'>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select id="adv-location" name="location" class="form-control"> <?=$location_list; ?></select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <select id="adv-gmd" name="gmd" class="form-control"><?=$gmd_list; ?></select>
                        </div>
                    </div>
                    <div class="col-sm-1"><input class="btn btn-success" type="submit" value="Cari"></div>
                </div>
            </div>
        </form>

        <div class="row">&nbsp;</div>

        <div class="row">
            <div class="col-sm-12">&nbsp; &nbsp; <a href="javascript:void(0)">Pencarian lanjut </a> - <a href="javascript:void(0)">Riwayat Pencarian </a> - <a href="" data-toggle="modal" data-target="#modalBantuan">Bantuan</a> </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalBantuan" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Bantuan</h4>
                </div>
                <div class="modal-body">
                    <ul>
                        <li> Pencarian sederhana adalah pencarian koleksi dengan menggunakan hanya satu kriteria pencarian saja. </li>
                        <li> Ketikkan kata kunci pencarian, misalnya : " Sosial kemasyarakatan " </li>
                        <li> Kata kunci akan mencari pada ruas judul . </li>
                        <li> Pilih lokasi buku berada, atau biarkan pada pilihan " All Location " </li>
                        <li> Pilih jenis koleksi misalnya " Text(buku) ", atau biarkan pada pilihan " All GMD / media " </li>
                        <li> Klik tombol "Cari" atau tekan tombol Enter pada kata kunci </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</section>