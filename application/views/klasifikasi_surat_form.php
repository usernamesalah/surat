<!-- Main content -->
        <section class='content'>
         
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Tambah
              <small>Klasifikasi Surat</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo base_url(); ?>index.php/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active">Klasifikasi Surat</li>
              <li class="active">Tambah</li>
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
                  <h3 class='box-title'>Form Data Klasifikasi Surat</h3>
                   
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Kode <?php echo form_error('kode') ?></td>
            <td><input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>" />
        </td>
	    <tr><td>Nama <?php echo form_error('nama') ?></td>
            <td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </td>
	    <tr><td>Uraian <?php echo form_error('uraian') ?></td>
            <td><textarea class="form-control" name="uraian" id="uraian" required style="height: 90px" placeholder="Masukkan Uraian" ><?php echo $uraian; ?></textarea>
        </td>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('klasifikasi_surat') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->