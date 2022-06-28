<?php include('base_call_connect.php'); ?>
<?php include('connection.php'); ?>
<?php include('GSS/macro/macro.php'); ?>

<?php require_once 'bower_components/phpti-master/src/ti.php'; ?>

<?php require_once 'menu_checker.php'; ?>
<?php $menuchecker = menuChecker('procurement');
?>

<?php include 'base_menu.html.php'; ?>

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
            pr_no: pr,
            pr_id:id,
            reason: val
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
</script>