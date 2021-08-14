    $(document).ready(function() {
        $('.select2').select2()
        $('.ors_select').select2()

      $(document).on('click','.btn-return',function() {

        let id = $(this).data('id');
        $('#id').val(id);

        // AJAX request
        $('#exampleModal').modal('show');
      });
      $(document).on('click', '.btn-view', function() {
        let id = $(this).data('id');
        $('#id').val(id);

        $.post({
          url: 'ORS/function/post.php',
          data: {
            ors_id: id
          },
          success: function(response) {
            clear_ors();
            view_ors(JSON.parse(response));
            $('#viewPanel').modal('show');
          }
        });
        // AJAX request
      });
      $(document).on('click', '#btn-filter', function() {
        let path = 'entity/filter_ors.php';
        let data = {
          ors: $('#ors_num').val(),
          ponum: $('#ponum').val(),
          status: $('#status').val(),
          dateprocessed: $('#datepicker2').val(),
          datereleased: $('#datepicker3').val(),

        };

        $.get(path, data, function(data, status) {
          // $('#example1').empty();
          let lists = JSON.parse(data);
          $('#example1').dataTable().fnClearTable();
          $('#example1').dataTable().fnDestroy();
          generateMainTable(lists);
          $('#example1').DataTable({
           'lengthChange': true,
            'searching'   : true,
            'ordering'    : false,
            'info'        : true,
            'autoWidth'   : false,
          })
        });
      });
      $(document).on('click','#btn-reset',function(){
        location.reload();
      })
      $( ".ors_select" ).change(function() {
        $.post({
            url: 'ORS/function/post.php',           
            data: {
              ors: $(this).val()
            },
            success: function(response) {
                // $('#ors_num').val(response.ponum);
                setpo(JSON.parse(response));

               
            }
          });
      });
    });

    function view_ors(elements) {

      let viewPanel = $('.view-body');
      let ors_elements = ["ors", "ponum", "datereceived", "datereprocessed", "payee", "particular", "datereturned", "datereleased", "saronumber", "ppa", "uacs", "amount", "status"];
      $.each(ors_elements, function(key, value) {
        let data = viewPanel.find('.' + value);
        data.val(elements[value]);
        $('.status').text(elements.status);
        console.log(elements.status);
      });
    
    }

    function setpo(elements) {

        let viewPanel = $('.po_body');
        let ors_elements = ["ponum"];
        $.each(ors_elements, function(key, value) {
          let data = viewPanel.find('#' + value);
          console.log('#' + value);
          data.val(elements.ponum);
        });
      
      }
    

    function clear_ors() {

      let viewPanel = $('.view-body');
      let ors_elements = ["ors", "ponum", "datereceived", "datereprocessed", "payee", "particular", "datereturned", "datereleased", "saronumber", "ppa", "uacs", "amount", "status"];
      $.each(ors_elements, function(key, value) {
        let data = viewPanel.find('.' + value);
        data.val('');
        $('#status').text('');
      });
    }
    function generateMainTable($data) {
           $.each($data, function(key, item) {
   
             let tr = '<tr>';
             tr += '<td '+item['ors_gss']+'>' + item['date_received'] + '</td>';
             tr += '<td '+item['ors_gss']+'>' + item['date_obligated'] + '</td>';
             tr += '<td '+item['ors_gss']+'>' + item['date_return'] + '</td>';
             tr += '<td '+item['ors_gss']+'>' + item['date_released'] + '</td>';
             tr += '<td '+item['ors_gss']+'>' + item['ors'] + '</td>';
             tr += '<td '+item['ors_gss']+'>' + item['ponum'] + '</td>';
             tr += '<td '+item['ors_gss']+'>' + item['payee'] + '</td>';
             tr += '<td '+item['ors_gss']+'>' + item['particular'] + '</td>';
             tr += '<td '+item['ors_gss']+'>' + item['amount'] + '</td>';
   
             tr += '<td>' + item['remarks'] + '</td>';
             tr += '<td>' + item['status'] + '</td>';
             tr += '<td colspan="1" '+item['ors_gss']+'> ';
   
             tr += item['actions'];
        
             tr += '</td>';
   
   
             tr += '</tr>';
             $('#example1').append(tr);
           });
   
           return $data;
         }

  