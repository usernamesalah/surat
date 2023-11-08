<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>ADMIN</h3>
                      <div class='box box-primary'>
                      <p class="login-box-msg"><?php echo $this->session->flashdata("k_passwod");?></p>
                      
        <form action="<?php echo site_url()?>/auth/change_password/simpan" method="post"><table class='table table-bordered'>
	    <tr><td>Username <?php echo form_error('username') ?></td>
            <td><input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?=$this->session->userdata('admin_user')?>" />
        </td>
	    <tr><td>Password Lama<?php echo form_error('password') ?></td>
            <td><input type="password" class="form-control" name="p1" id="p1" placeholder="Password Lama" value="" />
        </td>
       
	    <tr><td>Password Baru<?php echo form_error('password') ?></td>
            <td><input type="password" class="form-control" name="p2" id="p2" placeholder="Password Baru" value="" />
        </td>
	    <tr><td>Password Baru <?php echo form_error('password') ?></td>
            <td><input type="password" class="form-control" name="p3" id="p3" placeholder="Ulangi Password Baru" value="" />
        </td>
	    
	    
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><i class="icon icon-ok icon-white"></i> Simpan</button>
	    <a href="<?php echo site_url('admin') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->