<div class="box box-danger box-solid dropbox">
    <div class="box-header with-border">
      <h5 class="box-title">Staff Workload</h5>

      <div class="box-tools pull-right">

      	<div class="btn-group">
      		<a href='base_planner_emp_workspace.html.php?evp_id=<?php echo $event["id"];?>&username=<?php echo $_SESSION['username']; ?>&division=<?php echo $_GET['division']; ?>&emp_id=<?php echo $_SESSION['currentuser']; ?>' class="btn btn-block btn-primary"><i class="fa fa-anchor"></i> My Workspace</a>  
    	</div>

        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
        </button>
      </div>
    </div>
	<div class="box-body box-emp" style="height: 375px; max-height: 375px; overflow-y: scroll;">
		<ul class="list-group">
		<?php foreach ($lgcdd_emp as $key=>$emp): ?>
			<li class="list-group-item" style="background-color:<?php echo $emp['color'] ?>">
				<span data-letters="<?php echo $emp['initials']; ?>"></span>
				<span style="font-size:10px">
					<div class="rrrrr" style="margin-top: -31px; margin-left: 39px;"><?php echo $emp['designation'];?><br>
						<b><?php echo $emp['name'];?></b>
					</div>
				</span>

				<div class="pull-right" style="margin-top: -24px;">
		            <span class="label label-default label2"><?php echo $emp['tasks']['Created'] ?></span>
		            <span class="label label-warning label2"><?php echo $emp['tasks']['Ongoing'] ?></span>
		            <span class="label label-primary label2"><?php echo $emp['tasks']['For Checking'] ?></span>
		            <span class="label label-success label2"><?php echo $emp['tasks']['Done'] ?></span>
		        </div>
            </li>

			<?php endforeach ?>
		</ul>
	</div>
</div>		

<style type="text/css">

	/*.label2 {
		position: absolute;
    top: -4px;
    right: 135px;
	}*/
	
	[data-letters]:before {
	  content:attr(data-letters);
	  display:inline-block;
	  font-size:1em;
	  width:2.5em;
	  height:2.5em;
	  line-height:2.5em;
	  text-align:center;
	  border-radius:50%;
	  background:#746869;
	  vertical-align:middle;
	  /*margin-right:1em;*/
	  color:white;
	  /*margin-top: -13px;*/
	}

	/*.box-emp:hover {*/
		/*overflow-y: scroll !important;*/
	    /*background: transparent;  make scrollbar transparent */
		
	/*}*/
	/*.box-emp:hover::-webkit-scrollbar {
	    width: 0px;
		background: transparent;  make scrollbar transparent 
	}*/
</style>