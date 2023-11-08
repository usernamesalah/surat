
        <!-- Main content -->
   
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Klasifikasi Surat
              <small></small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo base_url(); ?>index.php/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active">Klasifikasi Surat</li>
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
        <?php echo anchor('klasifikasi_surat/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('klasifikasi_surat/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('klasifikasi_surat/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('klasifikasi_surat/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', array('target' => '_blank','class'=>'btn btn-primary btn-sm')); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    
		    <th>Kode</th>
		    <th>Nama</th>
		    <th>Bobot</th>
		    <th>Aksi</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($klasifikasi_surat_data as $klasifikasi_surat)
            {
                ?>
                <tr>
		    
		    <td><?php echo $klasifikasi_surat->kode ?></td>
		    <td><?php echo $klasifikasi_surat->nama ?></td>
		    <td><?php echo $klasifikasi_surat->uraian ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('klasifikasi_surat/read/'.$klasifikasi_surat->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('klasifikasi_surat/update/'.$klasifikasi_surat->id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			 
			?>
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