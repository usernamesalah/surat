<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>EDIT INSTANSI PENGGUNA</h3>
                      <div class='box box-primary'>
                     
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data"><table class='table table-bordered'>
	    <tr><td>Nama <?php echo form_error('nama') ?></td>
            <td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </td>
	    <tr><td>Alamat <?php echo form_error('alamat') ?></td>
            <td><input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </td>
	    <tr><td>Kadinkes <?php echo form_error('kadinkes') ?></td>
            <td><input type="text" class="form-control" name="kadinkes" id="kadinkes" placeholder="Kadinkes" value="<?php echo $kadinkes; ?>" />
        </td>
	    <tr><td>Nip Kadinkes <?php echo form_error('nip_kadinkes') ?></td>
            <td><input type="text" class="form-control" name="nip_kadinkes" id="nip_kadinkes" placeholder="Nip Kadinkes" value="<?php echo $nip_kadinkes; ?>" />
        </td>
	    <tr><td>Foto Profil<?php echo form_error('logo') ?></td>
            <td><input type="file" class="form-control" name="logo" id="logo"  />
        </td>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo base_url(); ?>index.php/instansi_pengguna" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->