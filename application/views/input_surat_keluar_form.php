<!-- Main content -->
        <section class='content'>
         
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              <?php echo $judul ?>
              <small>Surat Keluar</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo base_url(); ?>index.php/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active">Daftar Surat Keluar</li>
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
                  <h3 class='box-title'>Form Data Input Surat Keluar</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" ><table class='table table-bordered'>
	   <?php
        $mode		= $this->uri->segment(2);

        if ($mode == "create") {
           $no_agenda	= gli("input_surat_keluar", "no_agenda", 4);
           $no_surat	= gli("input_surat_keluar", "no_surat", 4);
        }
        ?>
	    <tr><td>No Agenda <?php echo form_error('no_agenda') ?></td>
            <td><input type="text" class="form-control" name="no_agenda" id="no_agenda" placeholder="No Agenda" value="<?php echo $no_agenda; ?>" />
        </td>
	    <tr><td>Tujuan Surat <?php echo form_error('tujuan') ?></td>
            <td><input type="text" class="form-control" name="tujuan" id="dari" placeholder="Masukkan Tujuan Surat" value="<?php echo $tujuan; ?>" />
        </td>
        <tr><td>Nomor Surat <?php echo form_error('no_surat') ?></td>
            <td><input type="text" class="form-control" name="no_surat" id="no_surat" placeholder="Masukkan Nomor Surat" value="<?php echo $no_surat; ?>" />
        </td>
        <tr><td>Isi Ringkas <?php echo form_error('isi_ringkas') ?></td>
            <td><textarea class="form-control" name="isi_ringkas" id="isi_ringkas" required style="height: 90px" placeholder="Masukkan Isi Ringkasan" ><?php echo $isi_ringkas; ?></textarea>
        </td>
        <tr><td>Kode Klasifikasi<?php echo form_error('kode') ?></td>
            <td>
        <select name="kode" id="kode" class="form-control"  style="width: 100%;" >
                    
                    <?php
                    $klasifikasi_surat = $this->db->get('klasifikasi_surat');
                    foreach ($klasifikasi_surat->result() as $k){
                       
                        
                        echo "<option value='$k->kode' ";
                        echo $k->kode?'selected':'';
                        echo">".  $k->kode."   ". $k->nama."   ". $k->uraian."</option>";
                    }
                    ?>
                 
        
        
        </select>
        </td>
        
	    <tr><td>Tanggal Surat <?php echo form_error('tgl_surat') ?></td>
            <td><input type="text" class="form-control" name="tgl_surat" id="tgl_surat" data-date-format="yyyy-mm-dd" placeholder="Tgl Surat" value="<?php echo $tgl_surat; ?>" />
        </td>
	    <tr><td>File Surat (Scan)<?php echo form_error('file') ?></td>
            <td><input type="file" class="form-control" name="file_surat_keluar" id="file_surat_keluar"  />
        </td>
	    <tr><td>Keterangan <?php echo form_error('keterangan') ?></td>
            <td><input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
        </td>
	    
	    
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('input_surat_keluar') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->