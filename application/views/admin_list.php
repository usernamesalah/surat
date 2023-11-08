
        <!-- Main content -->
   
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Daftar Administrator
              <small></small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo base_url(); ?>index.php/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active">Daftar Administrator</li>
              <!--
              <li><a href="#">Layout</a></li>
              <li class="active">Top Navigation</li>
              -->
            </ol>
          </section>
        
        
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
        <?php echo anchor('admin/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('admin/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('admin/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('admin/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', array('target' => '_blank','class'=>'btn btn-primary btn-sm')); ?></h3>
              
                </div><!-- /.box-header -->
                <div class='box-body'>
                   <?php echo $this->session->flashdata("k"); ?> 
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>  
		    <th>Username</th>
		    <th>Nama, NIP</th>
		    <th>Level</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($admin_data as $admin)
            {
                ?>
                <tr>
		    
		    <td><?php echo $admin->username ?></td>
		    
		    <td><?php echo $admin->nama."<br>".$admin->nip?></td>
		    
		    <td><?php echo $admin->level ?></td>
		    <td style="text-align:center" width="140px">
			
			<a href="<?php echo base_url(); ?>index.php/admin/update/<?php echo $admin->id ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
			
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").DataTable( {
                    responsive: true
                 } );
            });
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->