<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Input_surat_masuk List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode</th>
		<th>No Agenda</th>
		<th>Indek Berkas</th>
		<th>Isi Ringkas</th>
		<th>Dari</th>
		<th>No Surat</th>
		<th>Tgl Surat</th>
		<th>Tgl Diterima</th>
		<th>Keterangan</th>
		<th>File</th>
		<th>Pengolah</th>
		
            </tr><?php
            foreach ($input_surat_masuk_data as $input_surat_masuk)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $input_surat_masuk->kode ?></td>
		      <td><?php echo $input_surat_masuk->no_agenda ?></td>
		      <td><?php echo $input_surat_masuk->indek_berkas ?></td>
		      <td><?php echo $input_surat_masuk->isi_ringkas ?></td>
		      <td><?php echo $input_surat_masuk->dari ?></td>
		      <td><?php echo $input_surat_masuk->no_surat ?></td>
		      <td><?php echo $input_surat_masuk->tgl_surat ?></td>
		      <td><?php echo $input_surat_masuk->tgl_diterima ?></td>
		      <td><?php echo $input_surat_masuk->keterangan ?></td>
		      <td><?php echo $input_surat_masuk->file ?></td>
		      <td><?php echo $input_surat_masuk->pengolah ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>