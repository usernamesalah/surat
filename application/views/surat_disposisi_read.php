
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Surat_disposisi Read</h3>
        <table class="table table-bordered">
	    <tr><td>Id Surat</td><td><?php echo $id_surat; ?></td></tr>
	    <tr><td>Kpd Yth</td><td><?php echo $kpd_yth; ?></td></tr>
	    <tr><td>Isi Disposisi</td><td><?php echo $isi_disposisi; ?></td></tr>
	    <tr><td>Sifat</td><td><?php echo $sifat; ?></td></tr>
	    <tr><td>Batas Waktu</td><td><?php echo $batas_waktu; ?></td></tr>
	    <tr><td>Catatan</td><td><?php echo $catatan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('surat_disposisi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->