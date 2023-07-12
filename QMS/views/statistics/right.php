<!-- <div class="row">
	<div class="col-md-12">
	  <div class="small-box bg-aqua bg-green-custom dropbox custom-border">
	    <div class="inner text-center">
	      <h4><b>QMS Documentations</b></h4>
	    </div>
	    
	    <ul style="list-style: none;">
	    	<?php foreach ($documents[2] as $key => $doc): ?>
	    		<li><a href="ViewIssuance.php?division=<?= $_SESSION['division']; ?>&id=<?= $doc['id']; ?>" target="_blank"><?= $doc['title']; ?></a></li>
	    	<?php endforeach ?>
      	</ul>
	  </div>
	</div>
</div> -->

<div class="row">
	<div class="col-md-12">
	  <div class="box box-warning dropbox">
	    <div class="box-header">
		<h3 class="box-title"><i class="fa fa-newspaper-o"></i> Issuances</h3>
	    </div>
	    
		<div class="box-body custom-box-body no-padding" style="height: 650px!important; max-height: 650px!important; overflow-y: auto;">
	    <ul class="nav nav-pills nav-stacked">
      		<?php foreach ($documents[3] as $key => $doc): ?>
	    		<li><a href="ViewIssuance.php?division=<?= $_SESSION['division']; ?>&id=<?= $doc['id']; ?>" target="_blank"><?= mb_strimwidth($doc['title'], 0, 100).'...'; ?></a></li>
	    	<?php endforeach ?>
      	</ul>
		</div>
	  </div>
	</div>
</div>
