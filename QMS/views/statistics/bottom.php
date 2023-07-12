<div class="row">
	<!-----CALENDAR------>
	<div class="col-md-6">
	  	<div class="box box-warning dropbox">
			<div class="box-header">
			  <h3 class="box-title"><i class="fa fa-calendar-check-o"></i> QMS Calendar of Activities</h3>
			</div>
			<div class="box-body custom-box-body" style="height: 320px!important; max-height: 320px!important; overflow-y: hidden;">
				<ul class="todo-list">
					<?php foreach ($activities as $key => $activity): ?>
						<li class="move-calendar">
							<span style="display: inline-block;">
								<time class="icon">
								  <em><?= $activity['day']; ?></em>
								  <strong><?= $activity['month']; ?></strong>
								  <span><?= $activity['date_start']; ?></span>
								</time>
							</span>
							<span class="text" style="position: absolute;"><?= $activity['title']; ?></span>
							<small class="label label-info"><i class="fa fa-clock-o"></i> <?= $activity['interval']; ?></small>
						</li>	
					<?php endforeach ?>
					<!-- <li class="move-calendar">
						<span style="display: inline-block;">
							<time class="icon">
							  <em>Wednesday</em>
							  <strong>JUNE</strong>
							  <span>01</span>
							</time>
						</span>
						<span class="text" style="position: absolute;">FAD Talk: "A Series of Discussion to Deepen Knowledge on the Latest Financial and ..."</span>
						<small class="label label-info"><i class="fa fa-clock-o"></i> 7 days</small>
					</li>

					<li class="move-calendar">
						<span style="display: inline-block;">
							<time datetime="2014-09-20" class="icon">
							  <em>Thursday</em>
							  <strong>JUNE</strong>
							  <span>02</span>
							</time>
						</span>
						<span class="text" style="position: absolute;">2021 ANTI-DRUG ABUSE COUNCIL (ADAC) PERFORMANCE AUDIT</span>
						<small class="label label-info"><i class="fa fa-clock-o"></i> 8 days</small>
					</li>

					<li class="move-calendar">
						<span style="display: inline-block;">
							<time datetime="2014-09-20" class="icon">
							  <em>Friday</em>
							  <strong>JUNE</strong>
							  <span>03</span>
							</time>
						</span>
						<span class="text" style="position: absolute;">RMCC Meeting</span>
						<small class="label label-info"><i class="fa fa-clock-o"></i> 9 days</small>
					</li>

					<li class="move-calendar">
						<span style="display: inline-block;">
							<time datetime="2014-09-20" class="icon">
							  <em>Monday</em>
							  <strong>JUNE</strong>
							  <span>13</span>
							</time>
						</span>
						<span class="text" style="position: absolute;">INAUGURATION OF THE DEPARTMENT OF HEALTH DRUG ABUSE TREATMENT AND REHABILITATION ...</span>
						<small class="label label-info"><i class="fa fa-clock-o"></i> 19 days</small>
					</li> -->
				</ul>
			</div>
			<div class="box-footer text-center">
				<div class="btn-group">
			    	<a href="ViewCalendar.php?division=<?= $_SESSION['division']; ?>&username=<?= $_SESSION['username']; ?>" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-plus-square"></i> View More</a>
			    </div>
			</div>
		</div>
	</div>


	<!------NON CONFORMITIES & CORRECTIVE ACTIONS-------->
	<div class="col-md-6">
	<div class="box box-warning dropbox">
		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-list-ul"></i> Nonconformities and Corrective Action</h3>
		<!-- <div class="btn-group pull-right">
            <a href="" id="" class="btn btn-block btn-primary btn-sm"><i class="fa fa-plus"></i> Add New</a>
        </div> -->
		</div>
		<div class="box-body custom-box-body no-padding" style="height: 320px!important; max-height: 320px!important; overflow-y: hidden;">

			<ul class="nav nav-pills nav-stacked">
				<?php foreach ($documents[1] as $key => $doc): ?>
					<li><a href="ViewIssuance.php?division=<?= $_SESSION['division']; ?>&id=<?= $doc['id']; ?>" target="_blank"><b><?= mb_strimwidth($doc['title'], 0, 50, "..."); ?></b><span class="pull-right" title="Date Posted"> <?= $doc['date_issued']; ?></span></a>
					</li>
			    <?php endforeach ?>
			</ul>
			
		</div>
		<div class="box-footer text-center">
			<div class="btn-group">
				<a href="issuances.php?division=<?= $_SESSION['division']; ?>" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-plus-square"></i> View More</a>
			</div>
		</div>
	</div>
</div>
</div>
