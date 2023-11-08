<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>ADMIN</h3>
                      <div class='box box-primary'>
        <form action="" method="post"><table class='table table-bordered'>
	    <tr><td>Username <?php echo form_error('username') ?></td>
            <td><input type="text" class="form-control" name="username" id="username" placeholder="Username" value="" />
        </td>
	    <tr><td>Password <?php echo form_error('password') ?></td>
            <td><input type="text" class="form-control" name="password" id="password" placeholder="Password" value="" />
        </td>
       
	    <tr><td>Nama <?php echo form_error('nama') ?></td>
            <td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="" />
        </td>
	    <tr><td>Nip <?php echo form_error('nip') ?></td>
            <td><input type="text" class="form-control" name="nip" id="nip" placeholder="Nip" value="" />
        </td>
	    
	    <input type="hidden" name="id" value="" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"></button> 
	    <a href="<?php echo site_url('admin') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->