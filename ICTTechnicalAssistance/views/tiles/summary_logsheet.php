<table class="table table-striped table-bordered table-responsive" id="psl_monitoring" style="height: 550px;">
  <thead class="bg-primary" style="background:linear-gradient(90deg,#1E88E5,#0D47A1);">
    <tr>
      <th >NO</th>
      <th  style="width: 10%;">DATE.</th>

      <th  scope="colgroup" style="text-align: center;">TOTAL NUMBER OF REQUEST FOR TECHNICAL ASSISTANCE RECEIVED (A)" </th>
      <th style="text-align: center;">TOTAL NUMBER OF TECHNICAL ASSISTANCE PROVIDED WITHIN THREE (3) WORKING DAYS UPON RECEIPT OF REQUEST OR WITHIN AGREED TIMELINE (B) </th>
      <th style="text-align: center;">%(B/A) * 100</th>
      <th style="text-align: center;">Indicate reason if % is < 90%</th>

    </tr>
   
  </thead>

  <tbody>
    <?php $i = 1; ?>
    <?php foreach ($psl_opts as $key => $data) : ?>

    <tr>
        <td> <?= $data['date']; ?></td>
        <td> <?= $i++;?></td>
        <td> <?= $i++;?></td>
        <td> <?= $i++;?></td>
        <td> <?= $i++;?></td>
        <td> <?= $i++;?></td>
    </tr>
    <?php endforeach; ?>

  </tbody>
</table>
<style>
  .btn {
  border: none;
  color: #fff;
  text-align: center;
  text-decoration: none;
  font-size: 16px;
  border-radius: 4px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
  margin-bottom: 3%;
}

.btn:hover {
  box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
  transform: translateY(-2px);
}

</style>
<script>
  $(document).ready(function() {
    $('#psl_monitoring').DataTable({
      // "ajax": "../ajax/data/objects.txt",
      "bInfo": false,

      'lengthChange': false,
      "dom": '<"pull-left"f><"pull-right"l>tip',

      'lengthChange': true,
      'searching': true,
      'ordering': true,
      'info': false,
      'autoWidth': false,
      pageLength: 5,


      "bLengthChange": false,
      "bFilter": true,
      "bInfo": false,
      "bAutoWidth": false,

      'searching': true,
    })

  })
</script>