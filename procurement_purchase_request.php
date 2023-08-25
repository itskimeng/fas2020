<?php include('base_call_connect.php'); ?>
<?php include('connection.php'); ?>
<?php include('GSS/macro/macro.php'); ?>

<?php require_once 'bower_components/phpti-master/src/ti.php'; ?>

<?php require_once 'menu_checker.php'; ?>
<?php $menuchecker = menuChecker('procurement');
?>

<?php include 'base_menu.html.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<?php startblock('title'); ?>
Procurement
<?php endblock('title'); ?>

<?php startblock('content'); ?>

<?php include('GSS/views/PR/index.php'); ?>
<?php endblock(); ?>
<script src="GSS/views/backend/js/custom.js"></script>

<script>
$(document).on('click', '#sweet-4', function() {
    let pr = $(this).val();
    let id = $(this).data('id');

    swal({
            title: "Do you really want to cancel this purchase request?",
            text: "Please explain why you are canceling this purchase request in the box below!<br><textarea id='text' style='width: 379px; height: 101px;resize:none'></textarea>",
            html: true,
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, cancelled it!",
            closeOnConfirm: false
        },
        function(inputValue) {
            if (inputValue === false) return false;
            if (inputValue === "") {
                swal.showInputError("You need to write something!");
                return false
            }
            // get value using textarea id
            var val = document.getElementById('text').value;
            $.post({
                url: "GSS/route/post_cancel_pr.php",
                data: {
                    'pr_no': pr,
                    'pr_id': id,
                    'reason': val
                },
                success: function(data) {

                    toastr.success("This item has been successfully cancelled!");
                    setTimeout(
                        function() {
                            location.reload();
                        },
                        1000);


                }
            })
            swal("Success!", "Your purchase request number has been cancelled!", "success");
        })
})

$(document).ready(function() {
  <?php
  if($_SESSION['username'] == $_SESSION['jamonteiro'] || $_SESSION['username'] == $_SESSION['mmmonteiro'] || $_SESSION['username'] == $_SESSION['masacluti'])
  {
    ?>
    $('#pendingModal').modal('hide');
    <?php
  }else{
    ?>
    $('#pendingModal').modal({
        backdrop:'static',
        keyboard:false
      });
    <?php
  }
  ?>
    $("#pendingTable").DataTable({
        'lengthChange': false,
        "bInfo": false,
        "dom": '<"pull-left"f><"pull-right"l>tip',
        'searching': true,
        'ordering': false,
        'info': false,
        'autoWidth': false
    })
})

$(document).click(function(e){
  if (!$(e.target).closest("#inside_box").length) {
    $("#inside_box").addClass('animate__animated animate__bounce animate__heartBeat').on("animationend", function(e) {
      $(this).removeClass('animate__animated animate__bounce animate__heartBeat').off("animationend");
    });
  }
})

$(document).on('click','#btn-search',function (e) {
  let year = $('#cform-filter_year').val();
  let quarter = $('#cform-filter_quarter').val();
  let office = $('#cform-filter_office').val();

  window.location = 'procurement_purchase_request.php?quarter='+quarter+'&year='+year+'&division='+office;

  
})

$(document).on('click', '#btn-advance_search', function(){
    let val = $(this).val();
    
    if (val == 'close') {
      $('.filter_buttons').removeClass('hidden');
      $(this).val('open');
      $(this).find('i').toggleClass('fa-search-plus fa-search-minus');
      $('.filter_buttons').show(1000);
      $('.filter_buttons').addClass('fadeInDown');
    } else {
      // $('.filter_buttons').addClass('hidden');
      $(this).val('close');
      $(this).find('i').toggleClass('fa-search-minus fa-search-plus');
      $('.filter_buttons').hide(1000);
      $('.filter_buttons').removeClass('fadeInDown');
    }
  });
</script>