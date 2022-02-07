$('#timeline').daterangepicker({
  opens: 'right',
  showButtonPanel: false,
  startDate: moment().startOf('hour'),
  endDate: moment().startOf('hour'),
  locale: {
    format: 'M/DD/YYYY'
  }
});

function generateTableDetails($data){
  $.each($data, function(key, item){
    let tr = '<tr>';
      tr+= '<td class="hidden" style="vertical-align: middle;">';
        tr+= key;
      tr+= '</td>';

      tr+= '<td class="text-center" style="vertical-align: middle;">';
        tr+= item.source;
      tr+= '</td>';
      
      tr+= '<td style="vertical-align: middle;">';
        tr+= item.name;
      tr+= '</td>';
      
      tr+= '<td class="text-center" style="vertical-align: middle;">';
        tr+= item.ppa;
      tr+= '</td>';
      
      tr+= '<td class="text-center" style="vertical-align: middle;">';
        tr+= item.legal_basis;
      tr+= '</td>';
      
      tr+= '<td class="text-center" style="vertical-align: middle;">';
        tr+= item.particulars;
      tr+= '</td>';
      
      tr+= '<td class="text-center" style="vertical-align: middle;">';
        tr+= moment(item.date_created).format('MMM. DD, YYYY');
      tr+= '</td>';
      
      tr+= '<td class="text-center" style="vertical-align: middle!important;">';
        tr+= '<div class="form-inline">';
          
          tr+= '<div class="btn-group">';
            tr+= '<a href="budget_fundsource_edit.php?source='+key+'" class="btn btn-block btn-primary btn-sm" title="Edit">';
            tr+= '<i class="fa fa-edit"></i></a>';
          tr+= '</div>';

          tr+= '<div class="btn-group">';
            tr+= '<a href="Finance/route/delete_fundsource.php?source='+key+'" class="btn btn-block btn-danger btn-sm" title="Delete">';
            tr+= '<i class="fa fa-trash"></i></a>';
          tr+= '</div>';
        tr+= '</div>';
      tr+= '</td>';
    tr+= '</tr>'; 
    
    $('#fs-body').append(tr);
  })

}

$(document).ready(function() {
  <?php
    session_start();
    if (isset($_SESSION['toastr'])) {
        echo 'toastr.'.$_SESSION['toastr']['type'].'("'.$_SESSION['toastr']['message'].'", "'.$_SESSION['toastr']['title'].'")';
        unset($_SESSION['toastr']);
    }
  ?> 
  
  var table = $('#example').DataTable({
    "bFilter": true,
    "columns": [
      { "data": "id", "visible": false },
      { "data": "source", "width": "15%", "className": 'text-center' },
      { "data": "fund" },
      { "data": "total_allotment", "width": "12%", "className": 'text-center' },
      { "data": "total_obligated", "width": "12%", "className": 'text-center'  },
      { "data": "total_balance", "width": "12%", "className": 'text-center'  },      
      { "data": "date_created", "width": "10%", "className": 'text-center' },
      { "data": "action", "width": "12%", "sortable": false, "className": 'text-center' }  
    ],"order": [[1, 'desc']],
    'searching'   : true,
  });

  $(document).on('click', '.btn-filter', function(){
    let startdate = $('#timeline').data('daterangepicker').startDate.format('YYYYMMDD');
    let enddate = $('#timeline').data('daterangepicker').endDate.format('YYYYMMDD');
    let path = 'Finance/route/filter_fundsource.php?startdate='+startdate+'&enddate='+enddate;

    $.get(path, function(data, status){
      let getdata = JSON.parse(data);
      $('#fs-body').empty();
      generateTableDetails(getdata);
      table;
    })
  })

  $(document).on('click', '.btn-remove_fsource', function(e){
    let row = $(this).closest('tr');
    let id = $(this).data('source_id');
    let code = row.find('td:eq(0)').html();

    let modal = $('#modal_delete_fundsource');
    let modal_sourceID = modal.find('#cform-source_id');
    let modal_sourceCode = modal.find('#cform-source_code');
    let modal_sourceCodeTxt = modal.find('#source_code');

    modal_sourceID.val(id);
    modal_sourceCode.val(code);
    modal_sourceCodeTxt.html(code);
  })
  
});