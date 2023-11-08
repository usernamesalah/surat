<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CPANEL | Log in e-Surat versi 1.1</title>
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
        <div class="login-box">
            <div class="login-logo">
                
                <img src="<?=base_url('upload/'.$instansi_logo);?>" height="82" width="82" alt="User Image">
            <b>e-Surat  </b> <br> <?php echo $instansi_nama; ?>
            </div><!-- /.login-logo -->
            
            <div class="login-box-body">
                <p class="login-box-msg"><?php echo $this->session->flashdata("k"); ?></p>
                <?php echo form_open('auth/login'); ?>
                
                <div class="form-group has-feedback">
                    <?php  echo  form_input(array('name' => 'u',
										'id'    => 'user',
										'type'    => 'text',
                                'class' => 'form-control',
                                'placeholder'=>'Email / Username')); ?>

                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                     <?php  echo  form_input(array('name' => 'p',
										'id'    => 'password',
										'type'    => 'password',
                                'class' => 'form-control',
                                'placeholder'=>'Password')); ?>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                
                <div class="row">

                    <div class="col-xs-12">
                        <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in"></i> LOGIN</button>
                    </div><!-- /.col -->

                </div>
                </form>



            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <!-- jQuery 2.1.4 -->
        <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
        <script>
            
            
            $(document).ready(function(){
                $(" #alert" ).fadeOut(6000);
            });
	
            
        </script>
    </body>
</html>
