<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>INPUT DISPOSISI</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    
            <td><input type="hidden" class="form-control" name="id_surat" id="id_surat" placeholder="Id Surat" value="<?php echo $id_surat; ?>" />
        </td>
	    <tr><td>Tujuan Disposisi <?php echo form_error('kpd_yth') ?></td>
            <td><input type="text" class="form-control" name="kpd_yth" id="kpd_yth" placeholder="Tujuan Disposisi" value="<?php echo $kpd_yth; ?>" />
        </td>
	    <tr><td>Isi Disposisi <?php echo form_error('isi_disposisi') ?></td>
            <td><textarea class="form-control" name="isi_disposisi" id="isi_disposisi" required style="height: 90px" placeholder="Masukkan Isi Disposisi" ><?php echo $isi_disposisi; ?></textarea>
        </td>
            <tr><td>Sifat</td>
                <td>   <select name="sifat" class="form-control" tabindex="3" style="width: 200px" required><option value=""> - Sifat - </option>
			<?php
				$l_sifat	= array('Biasa','Segera','Perlu Perhatian Khusus','Perhatian Batas Waktu');
				
				for ($i = 0; $i < sizeof($l_sifat); $i++) {
					if ($l_sifat[$i] == $sifat) {
						echo "<option selected value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
					} else {
						echo "<option value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
					}				
				}			
			?>			
		</select>
	 </td>
            <tr><td>Batas Waktu <?php echo form_error('batas_waktu') ?></td>
            <td><input type="text" class="form-control" name="batas_waktu" id="batas_waktu" data-date-format="yyyy-mm-dd" placeholder="Batas Waktu" value="<?php echo $batas_waktu; ?>" />
        </td>
	    <tr><td>Catatan <?php echo form_error('catatan') ?></td>
            <td><input type="text" class="form-control" name="catatan" id="catatan" placeholder="Catatan" value="<?php echo $catatan; ?>" />
        </td>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button  type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    
            <a onclick='self.history.back()' class="btn btn-success"><i class="icon icon-arrow-left icon-white"></i> Kembali</a></td>
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->