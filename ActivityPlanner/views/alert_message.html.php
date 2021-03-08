<?php if (isset($_SESSION['alert'])): ?>
<div style="float:right;">
	<div class="alert alert-success alert-dismissible fade-out">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  <h4><i class="icon fa fa-<?php echo $_SESSION['alert']['icon']; ?>"></i> Success!</h4>
		<?php echo $_SESSION['alert']['message']; ?>
	</div>
</div>

<?php unset($_SESSION['alert']); ?>
<?php endif ?>


<style type="text/css">
	.fade-out {
	  z-index: 1; 
	  position: absolute; 
	  margin-left: -25%; 
	  margin-top: -3%; 
	  min-width: 25%;
	  animation: fadeOut 15s forwards;
	}

	@keyframes fadeOut {
	    from {
	        opacity: 1;
	    }

	    to {
	        opacity: 0;
	    }
	}
</style>