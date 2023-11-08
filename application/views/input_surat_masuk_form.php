<!-- Main content -->
        <section class='content'>
         
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              <?php echo $judul ?>
              <small>Surat Masuk</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo base_url(); ?>index.php/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active">Daftar Surat Masuk</li>
              <li class="active"><?php echo $judul ?></li>
              <!--
              <li><a href="#">Layout</a></li>
              <li class="active">Top Navigation</li>
              -->
            </ol>
          </section>
          
         
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
          
                <div class="box-header with-border">
                  <h3 class='box-title'>Form Data Input Surat Masuk</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" ><table class='table table-bordered'>
	   <?php
        $mode		= $this->uri->segment(2);

        if ($mode == "create") {
           $no_agenda	= gli("input_surat_masuk", "no_agenda", 4);
  
        }
        ?>
	    <tr><td>No Agenda <?php echo form_error('no_agenda') ?></td>
            <td><input type="text" class="form-control" name="no_agenda" id="no_agenda" placeholder="No Agenda" value="<?php echo $no_agenda; ?>" />
        </td>
	    <tr><td>Asal Surat <?php echo form_error('dari') ?></td>
            <td><input type="text" class="form-control" name="dari" id="dari" placeholder="Masukkan Asal Surat" value="<?php echo $dari; ?>" />
        </td>
        <tr><td>Nomor Surat <?php echo form_error('no_surat') ?></td>
            <td><input type="text" class="form-control" name="no_surat" id="no_surat" placeholder="Masukkan Nomor Surat" value="<?php echo $no_surat; ?>" />
        </td>
        <tr><td>Isi Ringkas <?php echo form_error('isi_ringkas') ?></td>
            <td><textarea class="form-control" name="isi_ringkas" id="isi_ringkas" required style="height: 90px" placeholder="Masukkan Isi Ringkasan" ><?php echo $isi_ringkas; ?></textarea>
        </td>
        <tr><td>Nomor Petunjuk <?php echo form_error('kode') ?></td>
            <td><input type="text" class="form-control" name="kode" id="kode_surat" placeholder="Masukkan Kode Klasifikasi"  value="<?php echo $kode; ?>" />
        </td>
        <tr><td>Nomor Paket <?php echo form_error('indek_berkas') ?></td>
            <td><input type="text" class="form-control" name="indek_berkas" id="indek_berkas" placeholder="Indek Berkas" value="<?php echo $indek_berkas; ?>" />
        </td>
	    <tr><td>Tanggal Surat <?php echo form_error('tgl_surat') ?></td>
            <td><input type="text" class="form-control" name="tgl_surat" id="tgl_surat" data-date-format="yyyy-mm-dd" placeholder="Tgl Surat" value="<?php echo $tgl_surat; ?>" />
        </td>
	    <tr><td>File Surat (Scan)<?php echo form_error('file') ?></td>
            <td><input type="file" class="form-control" name="file_surat_masuk" id="file_surat_masuk"  />
        </td>
	    <tr><td>Keterangan <?php echo form_error('keterangan') ?></td>
            <td><input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
        </td>
	    
	    
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('input_surat_masuk') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->