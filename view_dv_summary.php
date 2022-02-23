<?php include('base_call_connect.php'); ?> 
<?php include('connection.php'); ?> 
<?php require_once 'bower_components/phpti-master/src/ti.php'; ?>

<?php require_once 'menu_checker.php'; ?>
<?php $menuchecker = menuChecker('nta'); ?>
<?php $nta_id = $_GET['id']; ?>

<?php include 'sub_base_menu.php'; ?>

<?php startblock('content') ?>



<section class="content">


	<table class="table table-responsive table-bordered" id="example1">
		<thead>
			<tr>
				<th>NTA NUMBER</th>
				<th>DISBURSED AMOUNT</th>
				<th>DATE DISBURSED</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$total_disbursement = 0;
				$sql = ' SELECT 
				s.id AS s_id,
				s.dv_id AS s_dv_id,
				s.ors_id AS s_ors_id,
				s.nta_id AS s_nta_id,
				s.disbursed_amount AS s_disbursed_amount,
				s.status AS s_status,
				-- SUM(s.disbursed_amount) AS total_disbursement,
				DATE_FORMAT(s.date_created, "%M %d, %Y") AS date_created,
				n.nta_number AS nta_number
				FROM tbl_nta_entries s
				LEFT JOIN tbl_nta n ON n.id = s.nta_id
				WHERE s.dv_id = '.$nta_id.' ';

				$exec = $conn->query($sql);
				while ($row = $exec->fetch_assoc()) { $total_disbursement = $total_disbursement+$row['s_disbursed_amount']; ?>

					<tr>
						<td><?php echo $row['nta_number']; ?></td>
						<td><?php echo '₱'.number_format($row['s_disbursed_amount'], 2); ?></td>
						<td><?php echo $row['date_created']; ?></td>
					</tr>

			<?php } ?>
		</tbody>
		<tfoot>
			<tr style="background-color:#3d8556; color: white">
				<th>TOTAL:</th>
				<th colspan="2"><b><?php echo '₱'.number_format($total_disbursement, 2); ?></b></th>
			</tr>
		</tfoot>
	</table>

</section>



<?php endblock() ?>

