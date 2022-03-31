<?php include('base_call_connect.php'); ?> 
<?php include('connection.php'); ?> 
<?php require_once 'bower_components/phpti-master/src/ti.php'; ?>

<?php require_once 'menu_checker.php'; ?>
<?php $menuchecker = menuChecker('nta'); ?>
<?php $ors = $_GET['id']; ?>

<?php include 'sub_base_menu.php'; ?>

<?php startblock('content') ?>



<section class="content">


	<table class="table table-responsive table-bordered" id="example1">
		<thead>
			<tr>
				<th><center>FUND SOURCE</center></th>
				<th><center>PPA</center></th>
				<th><center>UACS</center></th>
				<th><center>AMOUNT</center></th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$ttl = 0;
				$sql = "SELECT
		                oe.fund_source,
		                oe.amount,
		                fe.uacs as uacs,
		                oe.amount as amount,
		                fs.ppa as mfo_ppa,
		                fs.source as fund_source
		                FROM tbl_obentries oe
		                LEFT JOIN tbl_obligation ob ON ob.id = oe.ob_id
		                LEFT JOIN tbl_fundsource_entry fe ON fe.id = oe.uacs
		                LEFT JOIN tbl_fundsource fs ON fs.id = fe.source_id
		                LEFT JOIN supplier s ON s.id = ob.supplier
						WHERE oe.ob_id = $ors";
				$exec = $conn->query($sql);
				while ($list = $exec->fetch_assoc()){
				 ?>
				 <tr>
				 	<td align="center"><?php echo $list['fund_source']; ?></td>
				 	<td align="center"><?php echo $list['mfo_ppa']; ?></td>
				 	<td align="center"><?php echo $list['uacs']; ?></td>
				 	<td align="center"><?php echo '₱'.number_format($list['amount'], 2); ?></td>
				 </tr>
			<?php $ttl += $list['amount']; } ?>
		</tbody>
		<tfoot>
			<tr style="background-color:#3d8556; color: white">
				<td colspan="3"></td>
				<td align="center">
					<?php 
						echo '₱'.number_format($ttl, 2);
					 ?>
				</td>
			</tr>
		</tfoot>
	</table>

</section>



<?php endblock() ?>

