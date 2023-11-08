<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>BACKUP, OPTIMIZE DAN RESTORE</h3>
                      <div class='box box-primary'>	
<?php echo $this->session->flashdata("k");?>
<br><br>
<legend>Backup Database</legend>	
Klik pada tombol "Backup" disamping untuk memulai proses backup &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_URL()?>index.php/backup_restore_db/tool/backup" class="btn btn-success">Backup</a>

<br><br>
<legend>Optimize Database</legend>		
Klik pada tombol "Optimize" disamping untuk memulai proses optimize database &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_URL()?>index.php/backup_restore_db/tool/optimize" class="btn btn-success">Optimize</a>


<br><br>
<legend>Restore Database</legend>		
<form action="<?php echo base_URL()?>index.php/backup_restore_db/tool/restore" method="post" accept-charset="utf-8" enctype="multipart/form-data">	
	
	<tr><td>Pilih file hasil restore yang telah di ekstrak menjadi .txt, kemudian klik tombol "Restore".<?php echo form_error('file') ?></td>
            <td><input type="file" class="form-control" name="file_backup" id="file_backup"  />
        </td>
	<button type="submit" onclick="javascript: return confirm('Anda yakin akan menghapus semua data sebelumnya ?')" class="btn btn-primary" >Restore</button>
</form>
</div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->