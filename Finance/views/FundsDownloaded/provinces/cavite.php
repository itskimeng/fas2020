<div style="position: absolute;">
  <div class="btn-group">
    <button type="button" id="btn-advance_search" value="close" class="btn btn-block btn-secondary btn-sm">
      <i class="fa fa-search-plus"></i> Advance Filter
    </button>
  </div>
</div>
<table id="example2" class="table table-bordered table-striped display">
  <thead>
    <tr style="color: white; background-color: #367fa9;">
      <th class="text-center">LDDAP NO.</th>
      <th class="text-center">LDDAP DATE</th>
      <th class="text-center">TOTAL AMOUNT</th>
      <th class="text-center">STATUS</th>
      <th class="text-center">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $key => $dd): ?>
      <tr>
        <td><?= $dd['lddap']; ?></td>
        <td><?= $dd['lddap_date']; ?></td>
        <td>---</td>
        <td>
          <center>
            <span class="badge" <?php echo $style; ?>><?= $dd['status']; ?></span>
          </center>
        </td>
        <td>
          <center>
              <div class="btn-group">
                <a href="funds_downloaded_history.php?id=<?= $dd['id']; ?>&status=<?= $dd['status']; ?>" class="btn btn-primary btn-sm" title="View"><i class="fa fa-eye"></i> View</a>
              </div>    
          </center>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>