
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CPANEL | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/font-awesome-4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/ionicons-2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/plugins/iCheck/square/blue.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
  <body class="hold-transition login-page">
    

	<?php 
	$q_instansi	= $this->db->query("SELECT * FROM instansi_pengguna LIMIT 1")->row();
	?>
    <div class="container">
	
	<br><br>



	<div class="container-fluid" style="margin-top: 30px">
	
      <div class="row">
		<div style="width: 400px; margin: 0 auto">
			<div class="well well-sm">
				<img src="&lt;?php echo base_url(); ?>upload/&lt;?php echo $q_instansi->logo; ?>" class="thumbnail span3" style="display: inline; float: left; margin-right: 20px; width: 80px; height: 80px">
				<h3 style="margin: 5px 0 0.4em 0; font-size: 16px; color: #000; font-weight: bold"><!--?php echo $q_instansi--->nama; ?><br>DINKES OKI<br></h3>
				<div style="color: #000; font-size: 13px" class="clearfix"><!--?php echo $q_instansi--->alamat; ?></div>
			 </div>
		</div>
		
		<div class="well" style="width: 400px; margin: 20px auto; border: solid 1px #d9d9d9; padding: 30px 20px; border-radius: 8px">
		
		<form action="&lt;?php echo base_URL(); ?>index.php/admin/do_login" method="post">
		<legend><center>Login Admin</center></legend>	
		<!--?php echo $this--->session->flashdata("k"); ?>
		<table align="center" style="margin-bottom: 0" class="table-form" width="90%">
			<tbody><tr><td width="40%">Username</td><td><input type="text" autofocus="" name="u" required="" style="width: 200px" class="form-control"></td></tr>
			<tr><td>Password</td><td><input type="password" name="p" required="" style="width: 200px" class="form-control"></td></tr>
			<tr><td>Tahun</td><td><select name="ta" class="form-control" required=""><option value="">--</option>
			<!--?php 
			for ($i = 2012; $i <= (date('Y')); $i++) {
				if (date('Y') == $i) {
					echo "<option value='$i' selected-->$i";
				} else {
					echo "<option value="$i">$i</option>";
				}
			}
			?>
			</select>
			</td></tr>
			<tr><td></td><td><input type="submit" class="btn btn-success form-control" value="Login"></td></tr>
		</tbody></table>
		
		</form>
		
		
		</div><!--/span-->
      </div><!--/row-->

    </div><!--/.fluid-container-->
    
    
	<center style="margin-top: -15px;">Aplikasi Surat Masuk dan Surat Keluar DINKES OKI
	</center>
	
	<script type="text/javascript">
	$(document).ready(function(){
		$(" #alert" ).fadeOut(6000);
	});
	</script>
	  
    </div>
   <!-- jQuery 2.1.4 -->
        <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
  
</body></html>

