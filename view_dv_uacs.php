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
				<th>FUND SOURCE</th>
				<th>PPA</th>
				<th>UACS</th>
				<th>AMOUNT</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$sql = "SELECT
				oe.fund_source,
				oe.mfo_ppa as mfo_ppa,
				oe.amount,
				fe.uacs as uacs,
				oe.amount as amount,
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
				 	<td><?php echo $list['fund_source']; ?></td>
				 	<td><?php echo $list['mfo_ppa']; ?></td>
				 	<td><?php echo $list['uacs']; ?></td>
				 	<td><?php echo '₱'.number_format($list['amount'], 2); ?></td>
				 </tr>
			<?php } ?>
		</tbody>
	</table>

</section>



<?php endblock() ?>

