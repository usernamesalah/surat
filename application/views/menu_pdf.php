<!doctype html>
<html>
    <head>
        <title>Laporan menu</title>
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
        <h2>Menu List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Name</th>
		<th>Link</th>
		<th>Icon</th>
		<th>Is Active</th>
		<th>Is Parent</th>
		
            </tr><?php
            foreach ($menu_data as $menu)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $menu->name ?></td>
		      <td><?php echo $menu->link ?></td>
		      <td><?php echo $menu->icon ?></td>
		      <td><?php echo $menu->is_active ?></td>
		      <td><?php echo $menu->is_parent ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>