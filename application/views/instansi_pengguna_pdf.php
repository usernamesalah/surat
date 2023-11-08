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
        <h2>Instansi_pengguna List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>Kepsek</th>
		<th>Nip Kepsek</th>
		<th>Logo</th>
		
            </tr><?php
            foreach ($instansi_pengguna_data as $instansi_pengguna)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $instansi_pengguna->nama ?></td>
		      <td><?php echo $instansi_pengguna->alamat ?></td>
		      <td><?php echo $instansi_pengguna->kepsek ?></td>
		      <td><?php echo $instansi_pengguna->nip_kepsek ?></td>
		      <td><?php echo $instansi_pengguna->logo ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>