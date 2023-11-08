
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>INSTANSI PENGGUNA</h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
                    <?php echo $this->session->flashdata("k"); ?>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Nama</th>
		    <th>Alamat</th>
		    <th>Kadinkes</th>
		    <th>Nip Kadinkes</th>
		    <th>Logo</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($instansi_pengguna_data as $instansi_pengguna)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $instansi_pengguna->nama ?></td>
		    <td><?php echo $instansi_pengguna->alamat ?></td>
		    <td><?php echo $instansi_pengguna->kadinkes ?></td>
		    <td><?php echo $instansi_pengguna->nip_kadinkes ?></td>
		    <td><?php echo $instansi_pengguna->logo ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('instansi_pengguna/read/'.$instansi_pengguna->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('instansi_pengguna/update/'.$instansi_pengguna->id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
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
                $("#mytable").dataTable();
            });
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->