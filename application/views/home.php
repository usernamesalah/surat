<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <small>SELAMAT DATANG di APLIKASI e-Surat (Aplikasi Manajemen Surat <?php echo $this->session->userdata('nama') ?>)</small>
    </h1>
    
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo $surat_masuk ?></h3>
                    <p>Surat Masuk</p>
                </div>
                <div class="icon">
                    <i class="fa fa-envelope"></i>
                </div>
                <a href="<?php echo base_url(); ?>index.php/input_surat_masuk" class="small-box-footer">Lihat surat masuk <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo $surat_masuk ?></h3>
                    <p>Laporan Surat Masuk</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?php echo base_url(); ?>index.php/laporan_surat_masuk" class="small-box-footer">Cetak surat masuk <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo $admin ?></h3>
                    <p>Manajemen Admin</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="<?php echo base_url(); ?>index.php/admin" class="small-box-footer">Lihat Admin <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>1</h3>
                    <p>Setting Instansi</p>
                </div>
                <div class="icon">
                    <i class="fa fa-laptop"></i>
                </div>
                <a href="<?php echo base_url(); ?>index.php/instansi_pengguna/update/1" class="small-box-footer">Edit Instansi <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
    </div><!-- /.row -->
    
    
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3><?php echo $surat_keluar ?></h3>
                    <p>Surat Keluar</p>
                </div>
                <div class="icon">
                    <i class="	fa fa-random"></i>
                </div>
                <a href="<?php echo base_url(); ?>index.php/input_surat_keluar" class="small-box-footer">Lihat surat keluar <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-fuchsia">
                <div class="inner">
                    <h3><?php echo $surat_keluar ?></h3>
                    <p>Laporan Surat Keluar</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="<?php echo base_url(); ?>index.php/laporan_surat_keluar" class="small-box-footer">Cetak surat keluar <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-light-blue">
                <div class="inner">
                    <h3><?php echo $klasifikasi_surat ?></h3>
                    <p>Klasifikasi Surat</p>
                </div>
                <div class="icon">
                    <i class="fa fa-list"></i>
                </div>
                <a href="<?php echo base_url(); ?>index.php/klasifikasi_surat" class="small-box-footer">Lihat klasifikasi surat <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua-active">
                <div class="inner">
                    <h3>1</h3>
                    <p>Setting Cetak</p>
                </div>
                <div class="icon">
                    <i class="fa fa-print"></i>
                </div>
                <a href="<?php echo base_url(); ?>index.php/atur_cetak" class="small-box-footer">Edit Cetak <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
    </div><!-- /.row -->
    
    </section>