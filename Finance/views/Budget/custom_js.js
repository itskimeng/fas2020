  function format ( data ) {
  let tb = '<table class="table table-bordered" cellpadding="8">';
  tb += '<tr style="text-align: center; background-color: #f39c12; color: white;">';
  tb += '<td><b>PARTICULARS</b></td>';
  tb += '<td><b>UACS</b></td>';
  tb += '<td><b>ALLOTMENT</b></td>';
  tb += '<td><b>OBLIGATED</b></td>';
  tb += '<td><b>EXPENSE CLASS</b></td>';
  tb += '<td><b>SAROGROUP</b></td>';
  tb += '</tr>';
  tb += '<tr>';
  tb += '<td>'+data.particulars+'</td>';
  tb += '<td style="text-align:center;">'+data.uacs+'</td>';
  tb += '<td style="text-align:center;">'+data.balance+'</td>';
  tb += '<td style="text-align:center;">'+data.obligated+'</td>';
  tb += '<td style="text-align:center;">'+data.expense_class+'</td>';
  tb += '<td style="text-align:center;">';
      if (data.sarogroup == '') {
        tb += '-';  
      } else {
        tb += data.sarogroup;
      }
  tb += '</td>';
  tb += '</tr>';

  return tb;
}

$('#timeline').daterangepicker({
  timePicker: true,
  opens: 'right',
  startDate: moment().startOf('hour'),
  endDate: moment().startOf('hour'),
  locale: {
    format: 'M/DD/YYYY'
  }
});

$(document).ready(function() {
  var table = $('#example').DataTable( {
    // "ajax": "../ajax/data/objects.txt",
    "bFilter": true,
    "columns": [
      { "data": "id", "visible": false },
      {
        "className"     : 'details-control text-center',
        "orderable"     : false,
        "data"          : null,
        "defaultContent": '<a type="button" class="btn btn-xs btn-primary" style="border-radius:50%"><span class="fa fa-plus"></span></a>'
      },
      { "data": "date", "width": "8%", "className": 'text-center' },
      { "data": "source", "width": "10%", "className": 'text-center' },
      { "data": "fund", "width": "25%" },
      { "data": "legal_basis", "width": "21%" },
      { "data": "ppa", "width": "12%", "className": 'text-center' },
      { "data": "amount", "width": "12%", "className": 'text-center' },
      { "data": "action", "width": "12%", "sortable": false, "className": 'text-center' },
      { "data": "particulars", "visible": false },
      { "data": "uacs", "visible": false  },
      { "data": "balance", "visible": false  },
      { "data": "obligated", "visible": false  },
      { "data": "expense_class", "visible": false },
      { "data": "sarogroup", "visible": false  },   
    ],"order": [[1, 'asc']],
    'searching'   : true,
  });
   
  // Add event listener for opening and closing details
  $('#example tbody').on('click', 'td.details-control', function () {

      var tr = $(this).closest('tr');
      var row = table.row( tr );
      let tdf = tr.find('td:first');

      tdf.html('');

      if ( row.child.isShown() ) {
          // This row is already open - close it
          row.child.hide();
          tdf.append('<a type="button" class="btn btn-xs btn-primary" style="border-radius:50%"><span class="fa fa-plus"></span></a>');
          tr.removeClass('shown');
      }
      else {
          // Open this row
          row.child( format(row.data()) ).show();
          tdf.append('<a type="button" class="btn btn-cirle btn-xs btn-primary" style="border-radius:50%"><span class="fa fa-minus"></span></a>');
          tr.addClass('shown');
          row.child().css('background-color', '#b4b4b4');
      }
  } );
} );