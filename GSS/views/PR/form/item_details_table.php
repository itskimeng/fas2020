<div class="modal-body box item-list-table box-primary box-solid dropbox" style="height:500px;">
  <div class="box-header with-border">
    APP Item List
  </div>
  <div class="box-body box-emp" style="height: 400px; max-height:1500px; overflow-y: scroll;">
    <div class="box-header with-border">
      <div class="row" class="box-body box-emp">
        <div class="col-lg-12">
          <table id="example1" class="table table-striped table-bordered" style="width:100%;background-color: white;">
            <thead>
              <th hidden></th>
              <th hidden></th>
              <th hidden></th>
              <th hidden></th>
              <th>Item Title</th>
              <th hidden></th>

            </thead>
            <tbody>

              <?php
              include('db.class.php'); // call db.class.php
              $mydb = new db(); // create a new object, class db()

              $conn = $mydb->connect();
              if ($username == 'sglee' || $username == 'ctronquillo' || $username == 'cmfiscal') {
                $results = $conn->prepare("SELECT * FROM app");
              } else {
                $results = $conn->prepare("SELECT * FROM app where app_year = 2022");
              }
              $results->execute();
              while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>';
                echo '<td hidden>' . $row['id'] . '</td>';
                echo '<td hidden>' . $row['price'] . '</td>';
                echo '<td hidden>' . $row['sn'] . '</td>';
                echo '<td hidden>' . $row['price'] . '</td>';
                echo '<td style="text-align: left;" >' . $row['procurement'] . '</td>';
                echo '<td hidden>' . $row['unit_id'] . '</td>';
              }

              ?>

            </tbody>
          </table>
        </div>
        <div class="col-lg-12">
          <div hidden>
            <input type="text" id="app_items" class="form-control"  />
          </div>
          <div hidden>
            <input type="text" id="item_title" class="form-control" />
          </div>
          <br>
          <label>Stock/Property No. <font style="color: Red;">*</font> </label>
          <input type="text" id="stocknumber" class="form-control" readonly>
          <br>
          <label>Quantity <font style="color: Red;">*</font></label>
          <br>
          <input class="form-control" type="number" id="qty" >

          <label>Unit <font style="color: Red;">*</font></label>
          <input type="text" id="unit" class="form-control" readonly>
          <br>
          <label>Description/Specification </label>
          <textarea id="desc" rows="1" cols="50" class="form-control" style="resize:none;outline:none;" ></textarea>


          <label>Unit Cost <font style="color: Red;">*</font></label>
          <br>
          <input class="form-control" type="text" id="abc"  readonly>
          <input input type="hidden" class="form-control" type="text" id="total_cost"  readonly>
          <input input type="hidden" class="form-control" type="text" id="items1"  readonly>

        </div>

      </div>
    </div>
  </div>
  <div class="col-lg-12">

            <button type="button" id="btn_additem" class="btn btn-primary col-lg-12"> Add Item </button>
          </div>
</div>