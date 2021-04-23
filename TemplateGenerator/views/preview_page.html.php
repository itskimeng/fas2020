<?php session_start(); ?>

<?php foreach ($_SESSION['certificate']['attendees'] as $key => $attendee): ?>
	<div class="row">
	  <img src="images/template/base_template.jpg" style="width:60%;"/>
	  <div class="centered" style="text-align:center; color:black; font-size:10pt;"><br><br>This<br>
	  <b style="font-family:Trajan Pro Bold; font-weight:bold;font-size:25pt;"><?php echo $_SESSION['certificate']['certificate_type']; ?></b><br>
	  is hereby awarded to<br><br><div style="font-family:helvetica;font-weight:bold;font-size:26pt; text-align:center;"><?php echo $attendee; ?></div><br><br><div style="font-family:Verdana Regular;font-size:9pt; text-align:center;">in recognition of his/her active paritcipation during the conduct of the <b><br>
	  	<?php echo $_SESSION['certificate']['activity_title']; ?></b><br>held on <?php echo $_SESSION['certificate']['dates']; ?> via <b><?php echo $_SESSION['certificate']['activity_venue']; ?></b><br>



	  	<br>Given this <b><?php echo $_SESSION['certificate']['given_date_day']; ?></b> day of <b><?php echo $_SESSION['certificate']['given_date_my']; ?></b></div>
	  </div>
	</div>
<?php endforeach ?>

<?php unset($_SESSION['certificate']); ?>


<style type="text/css">
	.row {
	  position: relative;
	  /*text-align: center;*/
	  /*color: white;*/
	}

	.centered {
	  position: absolute;
	  top: 40%;
	  left: 30.5%;
	  transform: translate(-50%, -50%);
	}
</style>

<script type="text/javascript">
	$(document).ready(function(){
		window.moveTo(0, 0);
  		window.resizeTo(screen.width, screen.height);
	});
</script>