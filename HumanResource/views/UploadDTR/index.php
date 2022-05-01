<?php require_once 'HumanResource/controller/UploadDTRController.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Upload DTR</h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li><a href="#">Human Resource</a></li>
      <li class="active">Upload DTR</li>
    </ol> 
  </section>
    
  <section class="content">
    <div class="row">
      <?php include 'filter.php'; ?>
    </div>
    <div class="row">
      <?php include 'dtr_table.php'; ?>
    </div>
  </section>
</div>

<style type="text/css">
   th {
    background-color: #367fa9 !important; 
    color: white;
  }
  .zoom
  {
    transition: transform .6s;
  }
  .small-box
  {
    border-radius: 15px;
    box-shadow: 0 1px 8px rgb(0,0,0);
  }
  .dataTables_filter
  {
    float: right;
  }

  .delete_modal_header {
  text-align: center;
  background-color: #f15e5e;
  color: white;
  padding:5% !important;
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
  }

  * {
      box-sizing: border-box;
    }

    .fade-scale {
      transform: scale(0);
      opacity: 0;
      -webkit-transition: all .25s linear;
      -o-transition: all .25s linear;
      transition: all .25s linear;
    }

    .fade-scale.in {
      opacity: 1;
      transform: scale(1);
    }
</style>

<script type="text/javascript">
  toastr.options = {
    "closeButton": true,
    "debug": true,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "500",
    "hideDuration": "1500",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
  
  <?php
      // toastr output & session reset
      session_start();
      
      if (isset($_SESSION['toastr'])) {
          echo 'toastr.success("Transaction Updated", "Success!")';
          unset($_SESSION['toastr']);
      }
  ?>

  var table = $('#dtr').DataTable( {
    // "ajax": "../ajax/data/objects.txt",
    'lengthChange': false,
    "columns": [
      { "data": "id", "visible": false },
      // { "data": "cutoff", "width": "15%", "className": 'text-center' },
      { "data": "date_from", "width": "15%", "className": 'text-center' },
      { "data": "date_to", "width": "15%", "className": 'text-center' },
      { "data": "uploaded", "width": "15%", "className": 'text-center' },
      { "data": "action", "width": "10%", "className": 'text-center' },
    ],"order": [[1, 'asc']],
    'searching'   : true,
  });

   $('#timeline').daterangepicker({
    opens: 'right',
    showButtonPanel: false,
    startDate: moment().startOf('hour'),
    endDate: moment().startOf('hour'),
    locale: {
    format: 'M/DD/YYYY'
    }
  });

  $(document).on('change', ':file', function() {
    let input = $(this);
    let numFiles = input.get(0).files ? input.get(0).files.length : 1;
    let label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    
    input.trigger('fileselect', [numFiles, label]);
    $('#uploadtxt').val(label);
  });

  $('#cform-details').on('submit', function(e) {
    e.preventDefault();
    let path = 'HumanResource/route/import_dtr.php';
    let formData = new FormData();
    let fd = $('#uploadfile')[0].files[0];
    let timeline = $('#timeline').val();

    formData.append('uploadfile', fd);
    formData.append('timeline', timeline);

    $.ajax({
      xhr: function(){
          // get the native XmlHttpRequest object
          var xhr = $.ajaxSettings.xhr() ;
          // set the onprogress event handler
          xhr.upload.onprogress = function(evt){ console.log('progress', evt.loaded/evt.total*100) } ;
          // set the onload event handler
          xhr.upload.onload = function(){ console.log('DONE!') } ;
          // return the customized object
          return xhr ;
      },
      async: true,
      url   : path,
      type  : 'post',
      data  : formData,
      processData : false,
      contentType : false,

      success: function(response, success) {
        if (success == 'success') {
          toastr.success("DTR has been uploaded successfully", "Success!")
        }
      }
    })
  })

  // $(document).on('click', '.btn-generate', function() {
  //   let path = $('#cform-details').attr('action');
  //   let data = $('#cform-details').serialize();
  //   // let formData = new FormData($('#cform-details'));

  //   // formData.append('file', $('#uploadfile')[0].files[0]);
    
  //   // console.log($('#uploadfile')[0]);
    

  //   $.post(path, data, function(data, success){

  //   })
  // });

</script>
