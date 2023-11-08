<!-- Main content -->
        <section class='content'>
         
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              <?php echo $judul ?>
              <small>Administrator</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo base_url(); ?>index.php/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active">Daftar Administrator</li>
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
                  <h3 class='box-title'>Form Data Administrator</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data"><table class='table table-bordered'>
	    <tr><td>Username <?php echo form_error('username') ?></td>
            <td><input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </td>
	    <tr><td>Password <?php echo form_error('password') ?></td>
            <td><input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </td>
       
	    <tr><td>Nama <?php echo form_error('nama') ?></td>
            <td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </td>
	    <tr><td>Nip <?php echo form_error('nip') ?></td>
            <td><input type="text" class="form-control" name="nip" id="nip" placeholder="Nip" value="<?php echo $nip; ?>" />
        </td>
	    <tr><td>Foto Profil<?php echo form_error('file') ?></td>
            <td><input type="file" class="form-control" name="file_foto_profil" id="file_foto_profil"  />
        </td>
            
            <tr><td>Level <?php echo form_error('level') ?></td>
            <td><select name="level" class="form-control" style="width: 200px" required tabindex="6" ><option value=""> - Level - </option>
			<?php
				$l_sifat	= array('Super Admin','Admin');
				
				for ($i = 0; $i < sizeof($l_sifat); $i++) {
					if ($l_sifat[$i] == $level) {
						echo "<option selected value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
					} else {
						echo "<option value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
					}				
				}			
			?>			
			</select>
        </td>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->