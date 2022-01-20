<div class="col-md-12">
  	<div class="box box-primary dropbox">

	    <div class="box-body table-responsive">
			<div class="section group"  style="overflow-x:auto;">

				<div class="col-md-1" >
           			<a href = "CreateTravelClaim.php?step=1&ro=&ui=1&username=<?php echo $username;?>" ><button class = "btn btn-md btn-success">Create</button></a>
				</div>
			</div>
			<br>
			<!-- main table -->

			<table id="example" class="table table-striped table-bordered table-responsive" style="width:;background-color: white;">
			    <thead>
			        <th>NO</th>
			        <th>EMPLOYEE NAME</th>
			        <th>RO/OT/OB</th>
			        <th>NO. OF TRAVEL DAYS</th>
			        <th>START DATE</th>
			        <th>END DATE</th>
			        <th>ORIGIN</th>
			        <th>DESTINATION</th>
			        <th>DISTANCE</th>
			        <th>VENUE</th>
			        <th style = "text-align:center;max-width:20%;">ACTION</th>
			    </thead>

			</table>


			<!-- main table -->
			<div class="panel-footer"></div>


			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document" style = "width:60%;">
					<div class="modal-content">
					  <div class="modal-header">
					  <span class = "pull-right"><i>Appendix 45 </i></span>

					    <h2 class="modal-title" id="exampleModalLabel" style = "text-align:center;">ITINERARY OF TRAVEL</h2>
					    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					      <span aria-hidden="true">&times;</span>
					    </button>
					  </div>
					  <div class="modal-body">
					  <table id = "table1" border="1"  width="100%" >
					          
					  </table>
					  <table id = "results" width="100%" border = "1">
					  </table>
					  <table id = "table3" class="equalDivide" width="100%" border="1">          
					  </table>

					  </div>
					  <div class="modal-footer">
					    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
					    <button type="button" class="btn btn-primary" data-dismiss = "modal">Close</button>
					  </div>
					</div>
				</div>
			</div>


			<div class="modal fade" id="add_travel_dates">
				<div class="modal-dialog" style = "width:60%;">
					<div class="modal-content" >
						<div class="modal-header">
							<h4 class="modal-title">Edit Travel Dates</h4>
							<span type="span" class="close" data-dismiss="modal">&times; </span>
						</div>
						<div class="modal-body" style = " max-height: calc(500vh - 100px); overflow-y: auto;max-width:100%;">
							<div class="box-body">
								<form method = "POST" action = "travelclaim_functions.php?action=modifyTravelDate">
									<input type = "hidden" name = "hidden_ro" value = "<?php echo $_GET['ro'];?>" />
									<table id = "travelDate_panel" border = 1 h>
									</table>
									<!-- 
									<div class = "well" style = "padding:10px;" id = "travelPanel">
									</div> -->
									<!-- <button type = "button" class = "btn btn-primary btn-md pull-right" id= "add_fare" style = "margin-right:10px"><i class = "fa fa-plus"></i>&nbsp;Add Fare</button> -->
								</form>
							</div>
						</div>
					 
					</div>

				</div>


			</div>


			<!-- box body -->
	    </div>
	</div>
</div>