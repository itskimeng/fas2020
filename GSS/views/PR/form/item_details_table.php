<div class="modal-body box item-list-table box-primary box-solid dropbox" style="height:700px;">
  <div class="box-header with-border">
    APP Item List
  </div>
  <div class="box-body box-emp">
    <div class="box-header with-border">
      <div class="row" class="box-body box-emp">
        <div class="col-lg-12">
          <label>APP Item <font style="color: Red;">*</font> </label>

          <?= group_select('Item', 'unit', $app_item_list, '', '', '', false, '', true); ?>
        </div>
        <div class="col-lg-12">
          <div hidden>
            <input type="text" id="app_items" class="form-control" />
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
          <input class="form-control" type="number" id="qty">

          <label>Unit <font style="color: Red;">*</font></label>
          <input type="text" class="form-control" id="unit" readonly>
          <br>
          <label>Description/Specification </label>
          <textarea id="desc" rows="20" cols="50" class="form-control" style="height: 140px; width: 929px;resize:none;outline:none"></textarea>


          <label>Unit Cost <font style="color: Red;">*</font></label>
          <br>
          <input class="form-control" type="text" id="abc" readonly>
          <input input type="hidden" class="form-control" type="text" id="total_cost" readonly>
          <input input type="hidden" class="form-control" type="text" id="items1" readonly>

        </div>

      </div>
    </div>
  </div>
  <div class="col-lg-12">

    <button type="button" id="btn_additem" class="btn btn-success col-lg-12"> Add Item </button>
  </div>
</div>