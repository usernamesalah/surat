
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Daftar Disposisi <?php echo anchor('surat_disposisi/create/'.$this->uri->segment(3),'Create',array('class'=>'btn btn-danger btn-sm'));?>
		<a href="<?php echo site_url('input_surat_masuk') ?>" class="btn btn-default">Kembali</a></td></tr></h3>
                    
                    <div class="alert alert-info">Perihal Surat</b> : <i><?php echo $judul_surat; ?> </i></div>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <?php echo $this->session->flashdata("k");?>
	
        
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                  
			<th width="15%">ID</th>
			<th width="20%">Tujuan Disposisi</th>
			<th width="20%">Isi Disposisi</th>
			<th width="15%">Sifat, Batas Waktu</th>
			<th width="30%">Aksi</th>
		
                </tr>
            </thead>
	    <tbody>
        <?php 
            if (empty($surat_disposisi_data)) {
                echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
            } else {
                $no 	= ($this->uri->segment(4) + 1);
                foreach ($surat_disposisi_data as $surat_disposisi) {
            ?>  
                
                
                <tr>
		    <td><?php echo $no++; ?></td>
		   
			<td><?php echo $surat_disposisi->kpd_yth; ?></td>
			<td><?php echo $surat_disposisi->isi_disposisi; ?></td>
			<td><?php echo $surat_disposisi->sifat."<br><i>Batas waktu s.d. ".indonesian_date($surat_disposisi->batas_waktu)."</i>"?></td>
		   
		    <td style="text-align:center" width="140px">
			<div class="btn-group" role="group">
                        <a href="<?php echo base_url(); ?>index.php/surat_disposisi/update/<?php echo $surat_disposisi->id ?>/<?php echo $this->uri->segment(3); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit </a>
                	<a href="<?php echo base_url(); ?>index.php/surat_disposisi/delete/<?php echo $surat_disposisi->id ?>" onclick="javascript: return confirm('Anda yakin akan menghapus data ini ?')" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i> Hapus</a>
                        
                        
                        </div>
		    </td>
	        </tr>
                <?php
            }}
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->