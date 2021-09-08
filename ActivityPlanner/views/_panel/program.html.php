<div class="box box-warning box-solid dropbox">
    <div class="box-header with-border">
      <h5 class="box-title"><i class="fa fa-book"></i> Program View</h5>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
        </button>
      </div>
    </div>
	<div class="box-body box-emp" style="height: 374px; max-height: 374px; overflow-y: auto;">
    	<div class="about-page-content testimonial-page">
			<div class="faq-content">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<?php foreach ($lgcdd_programs as $key => $program): ?>

						<div class="panel panel-default">
							<div class="panel-heading" role="tab">
								<h4 class="panel-title">
									<a class="collapsed" style="color: black !important;" role="button" data-toggle="collapse" data-parent="#accordion" href="#faq_<?php echo $key; ?>">
										<span><?php echo $key; ?></span>
									</a>
								</h4>
							</div>
							<div id="faq_<?php echo $key; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?php echo $key; ?>">
								<div class="panel-body">
									<ul class="fa-ul">
		                <?php foreach ($program as $key => $item): ?>
		                  <li style="display: block; margin-left: 3%">
			                	<a class="program_activity" href='base_planner_subtasks.html.php?event_planner_id=<?php echo $item["event_id"];?>&username=<?php echo $username; ?>&division=<?php echo $_GET['division']; ?>' style = "color:black; font-weight:normal;" onHover="changeColor(this)">
			                  	<span class="fa-li"><i class="fa fa-circle text-yellow"></i></span>
													<div class="row ddd_list">
		                      	<div class="col-md-7" style="padding-bottom: 5px;">
			                      	<div style="border-right: 1px solid #dbdbdb;">
		                        		<?php echo $item['activity']; ?>
		                        	</div>
		                        </div>
		                        <div class="col-md-5">
			                      	<?php echo $item['date_range']; ?>
		                        </div>
		                       </div>
		                    </a>	
		                  </li>
		                <?php endforeach ?>
		            	</ul>
								</div>
							</div>
						</div>

        	<?php endforeach ?>
				</div>
			</div>

		</div>
  </div>	
</div>		

<style type="text/css">

	div.box-emp::-webkit-scrollbar {
	    width: 12px;
	}
	 
	div.box-emp::-webkit-scrollbar-track {
	    -webkit-box-shadow: inset 0 0 2px rgba(0,0,0,0.3); 
	    border-radius: 2px;
	}
	 
	div.box-emp::-webkit-scrollbar-thumb {
	    border-radius: 2px;
	    -webkit-box-shadow: inset 0 0 2px rgba(0,0,0,0.5); 
	}
	 
	

	.program_list > a, .program_activity:hover {
		background-color: lightgray;
	}

	.faq-content #accordion .panel-title > a.accordion-toggle::before, .faq-content #accordion a[data-toggle="collapse"]::before  {
    content:"−";
    float: left;
    font-family: 'Glyphicons Halflings';
	margin-right :1em;
	margin-left:10px;
	color:#fff;
	font-size:13px;
	font-weight:300;
	display:inline-block;
	width:20px;
	height:20px;
	line-height:20px;
	
	border-radius:50%;
	text-align:center;
	font-size:10px;
	background:#ff9900;
}
.faq-content #accordion .panel-title > a.accordion-toggle.collapsed::before, .faq-content  #accordion a.collapsed[data-toggle="collapse"]::before  {
    content:"+";
	color:#fff;
	font-size:10px;
	font-weight:300;
	background:#333;
}

.faq-content{float:left; width:100%;}
.faq-content .panel-heading{padding-left:0px; border-radius:0px !important;}
.faq-content .panel-heading a{text-decoration:none;}
.faq-content .panel{border-radius:0px !important;}
.faq-content .panel-default{}
.faq-content .panel-heading{background:#f3f3f3 !important; color:#666666;}
.faq-content .panel-body{font-size:14px; color:#666666;}
.faq-saelect{background:#f3f3f3; padding:15px; border-bottom:2px solid #666666; float:left; width:100%; margin-bottom:20px; margin-top:-10px;}
.faq-saelect span{font-size:16px; color:#333; margin-right:20px;}
.faq-saelect select{border:1px solid #dcdcdc; color:#999999; width:300px; height:40px;}
.faq-content .panel{border-top:none !important; border-right:none !important; border-left:none !important;}
.faq-content .panel-body{border:1px solid #f3f3f3;}
</style>

<script type="text/javascript">
	function changeArrow(elem) {
		if ($(elem).find('.glyphicon').hasClass('glyphicon-chevron-down')) {
		    $(elem).find('.glyphicon').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
		}
		else if ($(elem).find('.glyphicon').hasClass('glyphicon-chevron-up')) {
		    $(elem).find('.glyphicon').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
		}
	}	

	function highlightRow(element) {
		let row = element.closest('row');
		row.css();
	}

	$(document).ready(function(){
		$('a.page-scroll').on('click', function(e){
			let anchor = $(this);
			$('html, body').stop().animate({
				scrollTop: $(anchor.attr('href')).offset().top - 50
			}, 1500);
			e.preventDefault();
		});	
	});
</script>