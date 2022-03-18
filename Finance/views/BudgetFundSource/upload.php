<?php require_once 'Finance/controller/FundSourceController.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Fund Source</h1>
        
        <ol class="breadcrumb"> 
          <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
          <li>Finance</li>
          <li>Budget Section</li>
          <li class="active">Fund Source Upload</li>
        </ol> 
    </section>
    
    <section class="content">
      <form id="cform-cert_details" method="POST" enctype="multipart/form-data" action="Finance/route/import_fs.php">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-warning dropbox">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-3">
                    
                    <div class="form-group attendee">
                      <label>File:</label>
                      <div class="input-group">
                        <label class="input-group-btn">
                          <span class="btn btn-primary">
                            Browse&hellip; <input type="file" name="uploadfile" style="display: none;">
                          </span>
                        </label>
                        <input type="text" id="uploadtxt" class="form-control" readonly>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="btn-group">
                      <button type="submit" class="btn btn-success btn-import"><i class="fa fa-upload"></i> Import</button>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div> 


      </form>
    </section>
</div>


<style type="text/css">
  .dropbox {
    box-shadow: 0 1px 2px rgb(0 0 0 / 50%);
  }

  #list_table {
    box-shadow: 0 1px 2px rgb(0 0 0 / 15%);
  }

  td.details-control {
    background: url('../resources/details_open.png') no-repeat center center;
    cursor: pointer;
  }

  tr.shown td.details-control {
    background: url('../resources/details_close.png') no-repeat center center;
  }

  .dataTables_filter {
    text-align: right !important;
  }

  .activity_content, .delete_modal {
    border-radius: 5px!important;
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
  $(document).ready(function(e){
    <?php
      session_start();
      if (isset($_SESSION['toastr'])) {
          echo 'toastr.'.$_SESSION['toastr']['type'].'("'.$_SESSION['toastr']['message'].'", "'.$_SESSION['toastr']['title'].'")';
          unset($_SESSION['toastr']);
      }
    ?> 
  })

  $(document).on('change', ':file', function() {
    let input = $(this);
    let numFiles = input.get(0).files ? input.get(0).files.length : 1;
    let label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    
    input.trigger('fileselect', [numFiles, label]);
    $('#uploadtxt').val(label);
  });

</script>

