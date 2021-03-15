<script type="text/javascript">

  $(document).ready(function(){
    $('.next').click(function(){
      let nextId = $(this).parents('.tab-pane').next().attr("id");
      $('[href=#'+nextId+']').tab('show');
      return false;
    });

    $('.back').click(function(){
        let prevId = $(this).parents('.tab-pane').prev().attr("id");
        $('[href=#'+prevId+']').tab('show');
        return false;
    });

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
      //update progress
      let step = $(e.target).data('step');
      let percent = (parseInt(step) / 4) * 100;
      
      $('.progress-bar').css({width: percent + '%'});
      $('.progress-bar').text("Step " + step + " of 4");
      //e.relatedTarget // previous tab    
    });

    $('.first').click(function(){
      $('#myWizard a:first').tab('show');
    });
  });

</script>