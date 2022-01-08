<div class="col-md-12">
  <div class="box box-primary dropbox">

    <div class="box-body table-responsive">
      <table id="example" class="table table-striped table-bordered display" style="width:100%">
        <thead>
          <tr style="color:  white; background-color: #367fa9;">
            <th class="hidden"></th>
            <th style="color:#367fa9;">CHECKER</th>
            <th style="text-align:center;">DATE</th>
            <th style="text-align:center;">SOURCE</th>
            <th style="text-align:center;">FUND</th>
            <th style="text-align:center;">LEGAL BASIS</th>
            <th style="text-align:center;">PPA</th>
            <th style="text-align:center;">BALANCE</th>
            <th style="text-align:center;">ACTION</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data as $key => $item): ?>
            <tr>
              <td class="hidden" style="vertical-align: middle;"><?php echo $item['id']; ?></td>
              <td style="vertical-align: middle;"></td>
              <td style="vertical-align: middle;"><?php echo date('M. d, Y', strtotime($item['sarodate'])); ?></td>
              <td style="vertical-align: middle;"><?php echo $item['saronumber']; ?></td>
              <td style="vertical-align: middle;"><?php echo $item['fund']; ?></td>
              <td style="vertical-align: middle;"><?php echo $item['legalbasis']; ?></td>
              <td style="vertical-align: middle;"><?php echo $item['ppa']; ?></td>
              <td style="vertical-align: middle;"><?php echo number_format($item['amount'], 2); ?></td>
              <td  style="vertical-align: middle;">
                <div class="form-inline">
                  <div class="btn-group">
                    <a href="saroupdate.php?getid=<?php echo $item['id']; ?>" class="btn btn-block btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                  </div>
                  <div class="btn-group">
                    <a href="#" class="btn btn-block btn-success btn-sm" title="View"><i class="fa fa-folder-open"></i></a>
                  </div>
                  <div class="btn-group">
                    <a href="#" class="btn btn-block btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a>
                  </div>
                </div>
              </td>
              <td class="hidden"><?php echo $item['particulars']; ?></td>
              <td class="hidden"><?php echo $item['uacs']; ?></td>
              <td class="hidden"><?php echo number_format($item['balance'], 2); ?></td>
              <td class="hidden"><?php echo $item['obligated']; ?></td>
              <td class="hidden"><?php echo $item['expenseclass']; ?></td>
              <td class="hidden"><?php echo $item['sarogroup']; ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>  

  </div>
</div>
