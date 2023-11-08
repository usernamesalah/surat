
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              DAFTAR SURAT KELUAR
              <small></small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo base_url(); ?>index.php/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active">Daftar Surat Keluar</li>
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
        <?php echo anchor('input_surat_keluar/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('input_surat_keluar/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('input_surat_keluar/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('input_surat_keluar/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', array('target' => '_blank','class'=>'btn btn-primary btn-sm')); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
                   <?php echo $this->session->flashdata("k"); ?> 
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
		<tr>
			<th width="15%">No. Agd/Kode</th>
			<th width="30%">Isi Ringkas, File</th>
			<th width="25%">Tujuan Surat</th>
			<th width="15%">Nomor, Tgl. Surat</th>
			<th width="15%">Aksi</th>
		</tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($input_surat_keluar_data as $b)
            {
                ?>
                <tr>
                
		    <td><?php echo $b->no_agenda."/".$b->kode;?></td>
			<td><?php echo $b->isi_ringkas."<br><b>File : </b><i><a href='".base_URL()."upload/surat_keluar/".$b->file."' target='_blank'>".$b->file."</a>"?></td>
			<td><?php echo $b->tujuan?></td>
			<td><?php echo $b->no_surat."<br><i>".indonesian_date($b->tgl_surat)."</i>"?></td>
		    
		    
		    <td align="center">
                        <?php  
				if ($b->pengolah == $this->session->userdata('admin_id')) {
				?>
            <div class="btn-group" role="group">
                 	<a href="<?php echo base_url(); ?>index.php/input_surat_keluar/update/<?php echo $b->id ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
                	<a href="<?php echo base_url(); ?>index.php/input_surat_keluar/delete/<?php echo $b->id ?>" onclick="javascript: return confirm('Anda yakin akan menghapus data ini ?')" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i> Hapus</a>
            </div>
            <?php } else { ?>
				<div class="label label-danger">No Action</div>
				<?php } ?>
                    
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