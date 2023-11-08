<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>e-Surat Versi 1.1 | Dinas Kesehatan OKI</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/font-awesome-4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/ionicons-2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/plugins/datatables/dataTables.bootstrap.css">
         <!-- DATATABLES -->
         <link href="<?php echo base_url() ?>template/plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />   

         <link href="<?php echo base_url() ?>template/plugins/datatables/extensions/Responsive/css/responsive.dataTables.css" rel="stylesheet" type="text/css" />
        
        <!-- Date Picker -->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/plugins/datepicker/datepicker3.css">
        <!-- Autocomplete -->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/plugins/jqueryui/jquery-ui.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/dist/css/skins/_all-skins.min.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini ">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>e</b>SV</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>e-Surat Versi 1.1</b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">



                            <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?=base_url('upload/foto_profil/'.$this->session->userdata('admin_foto'));?>" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $this->session->userdata('admin_nama'); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?=base_url('upload/foto_profil/'.$this->session->userdata('admin_foto'));?>" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $this->session->userdata('admin_nama'); ?>
                      <small><?php echo $this->session->userdata('admin_level'); ?></small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo site_url()?>/auth/change_password" class="btn btn-default btn-flat" >Ubah Password</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo site_url()?>/auth/logout" class="btn btn-default btn-flat" >Logout</a>
                    </div>
                  </li>
                </ul>
              </li>
			          			  
                              <li>  <a href="#" data-toggle="control-sidebar" title="Option"><i class="fa fa-gears"></i></a> </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?=base_url('upload/foto_instansi/'.$this->session->userdata('logo'));?>"  alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $this->session->userdata('nama') ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                    <li class="header">MENU UTAMA</li>

                        <li>
                            <a href="<?php echo site_url(); ?>/home">
                                <i class="fa fa-laptop"></i> <span>Dashboard</span>
                                <small class="label pull-right bg-red"></small>
                            </a>
                        </li>
                        <li class="header">ADMINISTRASI</li>
                        <?php
                        if ($this->session->userdata('admin_level') == "Super Admin") {
                            $menu = $this->db->get_where('menu', array('is_parent' => 0,'is_active'=>1));
                        foreach ($menu->result() as $m) {
                            // chek ada sub menu
                            $submenu = $this->db->get_where('menu',array('is_parent'=>$m->id,'is_active'=>1));
                            if($submenu->num_rows()>0){
                                // tampilkan submenu
                                echo "<li class='treeview'>
                                    ".anchor('#',  "<i class='$m->icon'></i> <span>".($m->name).'</span> <i class="fa fa-angle-left pull-right"></i>')."
                                        <ul class='treeview-menu'>";
                                foreach ($submenu->result() as $s){
                                     echo "<li>" . anchor($s->link, "<i class='$s->icon'></i> <span>" . ($s->name)) . "</span></li>";
                                }
                                   echo"</ul>
                                    </li>";
                            }else{
                                echo "<li>" . anchor($m->link, "<i class='$m->icon'></i> <span>" . ($m->name)) . "</span></li>";
                            }
                            
                            }
                        }  else {
                            
                            $menu = $this->db->get_where('menu', array('is_parent' => 0,'is_active'=>1, 'id_menu'=>0));
                        foreach ($menu->result() as $m) {
                            // chek ada sub menu
                            $submenu = $this->db->get_where('menu',array('is_parent'=>$m->id,'is_active'=>1, 'id_menu'=>0));
                            if($submenu->num_rows()>0){
                                // tampilkan submenu
                                echo "<li class='treeview'>
                                    ".anchor('#',  "<i class='$m->icon'></i> <span>".($m->name).'</span> <i class="fa fa-angle-left pull-right"></i>')."
                                        <ul class='treeview-menu'>";
                                foreach ($submenu->result() as $s){
                                     echo "<li>" . anchor($s->link, "<i class='$s->icon'></i> <span>" . ($s->name)) . "</span></li>";
                                }
                                   echo"</ul>
                                    </li>";
                            }else{
                                echo "<li>" . anchor($m->link, "<i class='$m->icon'></i> <span>" . ($m->name)) . "</span></li>";
                            }
                            
                            }
                            }
                        
                        ?>
						<li class="header">BANTUAN</li>
						<li class="treeview">
			              <a href="#">
			                <i class="fa fa-book"></i> <span>Dokumentasi</span> 
			              </a>
			              
			            </li>
						<li class="treeview">
			              <a href="#">
			                <i class="fa fa-legal"></i> <span>Tentang Aplikasi</span> 
			              </a>
			              
			            </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                
                
                
                <?php
                
                echo $contents;
                ?>



            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>e-Surat Versi</b> 1.1
                </div>
                <strong>Copyright &copy; 2023 <a href="http://www.dinkes-kaboki.com"><?php echo $this->session->userdata('nama') ?></a>.</strong> All rights reserved.
            </footer>

         <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
		</ul>
		<div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
		  </div>
		</div>
	  </aside>
            
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.4 -->
        <script src="<?php echo base_url() ?>template/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo base_url() ?>template/bootstrap/js/bootstrap.min.js"></script>
        
        <!-- SlimScroll -->
        <script src="<?php echo base_url() ?>template/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url() ?>template/plugins/fastclick/fastclick.min.js"></script>
        <!-- Date Picker-->
        <script src="<?php echo base_url() ?>template/plugins/datepicker/bootstrap-datepicker.js"></script>
        <!-- Autocomplete-->
        <script src="<?php echo base_url() ?>template/plugins/jqueryui/jquery-ui.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url() ?>template/dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url() ?>template/dist/js/demo.js"></script>
        <!-- page script -->
        <!-- DATATABLES -->
    <script src="<?php echo base_url() ?>template/plugins/datatables/media/js/jquery.dataTables.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url() ?>template/plugins/datatables/media/js/dataTables.bootstrap.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url() ?>template/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url() ?>template/plugins/datatables/extensions/Responsive/js/responsive.bootstrap.js" type="text/javascript"></script>
        
        
        <script>
           
    
            $(function () {
                $("#example1").DataTable();
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                });
            });
          
          
    
    
            $(function() {
                    $( "#tgl_surat" ).datepicker({ 
                      autoclose: true,
                      appendText: "(yyyy-mm-dd)",
                      autoSize: true,
                      changeMonth: true,
                      changeYear: true,
                      currentText: "Now",
                      dateFormat: "yy-mm-dd"
                    });
                    $( "#batas_waktu" ).datepicker({ 
                      autoclose: true,
                      appendText: "(yyyy-mm-dd)",
                      autoSize: true,
                      changeMonth: true,
                      changeYear: true,
                      currentText: "Now",
                      dateFormat: "yy-mm-dd"
                    });


                  $( "#tgl_start" ).datepicker({ 
                      autoclose: true,
                      appendText: "(yyyy-mm-dd)",
                      autoSize: true,
                      changeMonth: true,
                      changeYear: true,
                      currentText: "Now",
                      dateFormat: "yy-mm-dd"
                    });
                    $( "#tgl_end" ).datepicker({ 
                      autoclose: true,
                      appendText: "(yyyy-mm-dd)",
                      autoSize: true,
                      changeMonth: true,
                      changeYear: true,
                      currentText: "Now",
                      dateFormat: "yy-mm-dd"
                    });
                 });
       
                $( "#kode_surat" ).autocomplete({
                  source: function(request, response) {
                                                        $.ajax({ 
                                                                url: "<?php echo site_url('klasifikasi_surat/get_klasifikasi'); ?>",
                                                                data: { kode: $("#kode_surat").val()},
                                                                dataType: "json",
                                                                type: "POST",
                                                                success: function(data){
                                                                        response(data);
                                                                }    
                                                        });
                                                },
                });
        
        
        </script>
        
        
    </body>
</html>