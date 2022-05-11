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
      <?php include 'dtr_table.php'; ?>
    </div>
  </section>
</div>

<?php include('modal_import.php'); ?>


<style type="text/css">

  .progress-bar {
    height: 35px;
    width: 100%;
    border: 0.5px solid #9c9c9c;
    display: none;
    border-radius: 3px;
    background-color: #cecece;
  }

  .progress-bar-fill {
    height: 100%;
    width: 0%;
    background: #cbcbcb;
    display: flex;
    align-items: center;
    transition: width 0.25s;
    border-radius: 3px;
  }

  .progress-bar-text {
    margin-left: 10px;
    font-weight: bold;
    margin: 0 auto;
  }

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
    'lengthChange': false,
    "columns": [
      { "data": "id", "visible": false },
      { "data": "date_from", "width": "15%", "className": 'text-center' },
      { "data": "date_to", "width": "15%", "className": 'text-center' },
      { "data": "date_uploaded", "width": "15%", "className": 'text-center' },
      { "data": "uploaded", "width": "15%", "className": 'text-center' },
      { "data": "action", "width": "10%", "className": 'text-center' },
    ],"order": [[1, 'asc']],
    'searching'   : true,
  });

  var progressBarFill = $('#progressBar > .progress-bar-fill');
  var progressBarText = progressBarFill.find('.progress-bar-text');
  var downloadProgressText = $("#download-progress-text");

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

  $("#uploadForm").on('submit', function(e){
    e.preventDefault();

    let formData = new FormData();
    let fd = $('#uploadfile')[0].files[0];
    let timeline = $('#timeline').val();

    formData.append('uploadfile', fd);
    formData.append('timeline', timeline);

    $('#progressBar').css('background-color', '#cecece');
    progressBarFill[0].style.backgroundColor = '#cbcbcb';

    $.ajax({
      xhr: function() {
        var xhr = new XMLHttpRequest();
        xhr.upload.addEventListener("progress", e => {
          progressBar.style.display = 'block';

          let percent = e.lengthComputable ? (e.loaded / e.total) * 100 : 0;
          progressBarFill[0].style.width = percent.toFixed(2) + '%';

          if (percent.toFixed(2) == 100.00) {
                $('#progressBar').css('background-color', '#00a65a');
                progressBarFill[0].style.backgroundColor = '#5de3a5';
            setTimeout(
              function() 
              {
                progressBarText[0].textContent = 'Data is now being written. Please wait for a while....';
              }, 2000);
          } else if (percent.toFixed(2) > 88.3) {
            $('#progressBar').css('background-color', '#00a65a');
            progressBarFill[0].style.backgroundColor = '#5de3a5';
          } else if (percent.toFixed(2) > 65.8 && percent.toFixed(2) < 88.3) {
            $('#progressBar').css('background-color', '#49bfc2');
            progressBarFill[0].style.backgroundColor = '#5ddbde'; 
          } else if (percent.toFixed(2) > 42.7 && percent.toFixed(2) < 65.8) {
            $('#progressBar').css('background-color', '#337ab7');
            progressBarFill[0].style.backgroundColor = 'lightblue';
          }

          progressBarText[0].textContent = percent.toFixed(2) + '%';


        }, false);

        return xhr;
      },
      type: 'POST',
      url: 'HumanResource/route/import_dtr.php',
      data: formData,
      contentType: false,
      cache: false,
      processData:false,
      error:function(){
          $('#uploadStatus').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
      },
      success: function(data, response){
        // if (response == 'success') {
        //   setTimeout(function() {
        //     progressBarText[0].textContent = 'Uploading is now finished. Page will now refresh.';
        //   }, 2000);

        //   setTimeout(function() {
        //     location.reload();
        //   }, 5000);

        // }
      }
    });
    });

</script>
