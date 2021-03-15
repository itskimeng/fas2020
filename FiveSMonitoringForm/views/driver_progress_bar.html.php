<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="4" style="width: 50%;">
	Step 1 of 2
</div>

<script type="text/javascript">

  $(document).ready(function(){

  	

    <?php if (!$seiri_show AND !$seiton_show AND !$seiso_show AND $ltab_show): ?>    
      let step = 2;
      let percent = (parseInt(step) / 2) * 100;

      $('.progress-bar').css({width: percent + '%'});
      $('.progress-bar').text("Step " + step + " of 2");
    <?php endif ?>  


  //   $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
  //     //update progress
  //     let step = $(e.target).data('step');
  //     let percent = (parseInt(step) / 4) * 100;
      
  //     $('.progress-bar').css({width: percent + '%'});
  //     $('.progress-bar').text("Step " + step + " of 4");
  //     //e.relatedTarget // previous tab    
  //   });

  //   $('.first').click(function(){
  //     $('#myWizard a:first').tab('show');
  //   });
  });

</script>