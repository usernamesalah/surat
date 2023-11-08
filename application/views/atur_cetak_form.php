<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>PILIHAN CETAK</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Jenis Font <?php echo form_error('jenis_font') ?></td>
            <td><select name="jenis_font" class="form-control" style="width: 200px" required tabindex="6" ><option value=""> - Level - </option>
			<?php
				$l_sifat	= array('Times','Arial');
				
				for ($i = 0; $i < sizeof($l_sifat); $i++) {
					if ($l_sifat[$i] == $jenis_font) {
						echo "<option selected value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
					} else {
						echo "<option value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
					}				
				}			
			?>			
			</select>
        </td>
	    <tr><td>Ukuran Kertas <?php echo form_error('ukuran_kertas') ?></td>
            <td><select name="ukuran_kertas" class="form-control" style="width: 200px" required tabindex="6" ><option value=""> - Level - </option>
			<?php
				$l_sifat	= array('A4','Legal');
				
				for ($i = 0; $i < sizeof($l_sifat); $i++) {
					if ($l_sifat[$i] == $ukuran_kertas) {
						echo "<option selected value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
					} else {
						echo "<option value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
					}				
				}			
			?>			
			</select>
        </td>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('atur_cetak') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->