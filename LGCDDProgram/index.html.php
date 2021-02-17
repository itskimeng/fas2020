<?php 
  // $path = $_SERVER['DOCUMENT_ROOT'];
  $path = 'LGCDDProgram/controller/ProgramController.php';

  require_once($path);
?>

<div class="content-wrapper">
    <section class="content-header">
      <!-- <button><a href="update_series_code.php">Run</a></button> -->
        
        <h1>
          LGCDD Program List
        </h1>
        <ol class="breadcrumb"> 
          <li>
            <a href="home.php">
              <i class="fa fa-dashboard"></i> 
              Home
            </a>
          </li> 
          <li class="active">
            LGCDD Program
          </li>
        </ol> 
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <?php include 'table.html.php'; ?>
        </div>
      </div>
    </section>
</div>

<?php include 'modal_add_program.html.php'; ?>
<?php include 'modal_edit_program.html.php'; ?>


<script type="text/javascript">
  function fireSwal($id, $code) {
    swal({
      title: "Are you sure",
      text: "This will remove the program",
      type: "info",
      showCancelButton: true,
      closeOnConfirm: false,
      showLoaderOnConfirm: true
    }, function () {
      $.ajax({
        url:"LGCDDProgram/entity/remove_program.php",
        type:"GET",
        data:{id: $id, code: $code},
        success:function(data){
          setTimeout(function(){// wait for 5 secs(2)
            location.reload(); // then reload the page.(3) 
          }, 1000);
        }
      });
      
    });
  }
  $(document).ready(function(){
    $('#list_table').DataTable( {
        // 'paging'      : true,  
        'lengthChange': false,
        'searching'   : true,
        'ordering'    : false,
        'info'        : false,
        'autoWidth'   : false,
      } );

    $(document).on('click', '.edit-program', function(){
      let tr = $(this).closest('tr');
      let progid = tr.find('.progid');
      let code = tr.find('.code');
      let name = tr.find('.name');
      let modal_progid = $('#modal-edit-program').find('.progid');
      let modal_code = $('#modal-edit-program').find('.code');
      let modal_name = $('#modal-edit-program').find('.name');

      modal_progid.val(progid.val());
      modal_code.val(code.val());
      modal_name.val(name.val());

    });

    $(document).on('click', '.remove_program', function(){
      let tr = $(this).closest('tr');
      let progid = tr.find('.progid');
      let code = tr.find('.code');

      fireSwal(progid.val(), code.val());
    });

  });
</script>






    

