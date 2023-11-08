<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>LAPORAN SURAT KELUAR</h3>
                      <div class='box box-primary'>
        <form action="<?php echo base_URL(); ?>index.php/laporan_surat_keluar/cetak_surat_keluar" target="_blank" method="get" enctype="multipart/form-data" ><table class='table table-bordered'>
	   <?php
        $mode		= $this->uri->segment(2);

        
        ?>
	    
	    <tr><td>Dari Tanggal </td>
            <td><input type="text" class="form-control" name="tgl_start" id="tgl_start" data-date-format="yyyy-mm-dd" placeholder="Tanggal Mulai Cetak" value="" />
        </td>
	   <tr><td>Sampai Tanggal </td>
            <td><input type="text" class="form-control" name="tgl_end" id="tgl_end" data-date-format="yyyy-mm-dd" placeholder="Tanggal Akhir Cetak" value="" />
        </td> 
	    
	    
	    <input type="hidden" name="id" value="" /> 
	    <tr><td colspan='2'><button type="submit"  class="btn btn-primary">Cetak</button> 
	    <a href="<?php echo site_url('input_surat_keluar') ?>" class="btn btn-default">Kembali</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
