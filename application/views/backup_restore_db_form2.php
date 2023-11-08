<!-- Main content -->
        <section class='content'>
         
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              <?php // echo $judul ?>
              <small>Administrator</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo base_url(); ?>index.php/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active">Daftar Administrator</li>
              <li class="active"><?php// echo $judul ?></li>
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
                  <h3 class='box-title'>BACKUP DAN RESTORE</h3>
                  <?php echo $this->session->flashdata("k"); ?>
                      <div class='box box-primary'>
        <form action="<?php echo base_URL()?>index.php/backup_restore_db/tool/restore" method="post" enctype="multipart/form-data"><table class='table table-bordered'>
	    
	    <tr><td>Foto Profil<?php echo form_error('file') ?></td>
            <td><input type="file" class="form-control" name="file_foto_profil" id="file_foto_profil"  />
        </td>
            
            
	    
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary">Restore</button> 
	    
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->