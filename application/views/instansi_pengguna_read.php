
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Data Instansi Pengguna</h3>
        <table class="table table-bordered">
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Kadinkes</td><td><?php echo $kadinkes; ?></td></tr>
	    <tr><td>Nip Kadinkes</td><td><?php echo $nip_kadinkes; ?></td></tr>
	    <tr><td>Logo</td><td><?php echo $logo; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('instansi_pengguna') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->