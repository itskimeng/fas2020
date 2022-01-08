<div>
    <div class="box pr-table box-primary box-solid dropbox">
        <div class="box-header with-border">
            Purchase Request Summary
        </div>
        <div class="box-body box-emp">
            <div class="box-header with-border" class="box-body box-emp" style="height: 330px; max-height:500px; overflow-y: scroll;">
                <table class="table table-bordered" id="item_table" style="font-family: 'Titillium Web', sans-serif!important;">
                    <th>Stock No.</th>
                    <th>Unit</th>
                    <th>Item</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Unit Cost</th>
                    <th>Total Cost</th>
                    <th>Action</th>
                    <tbody id="tbody_item">
        
                    </tbody>
                    <tr>
                        <td colspan="6"  style="text-align:right;color:red;font-weight:bolder;">TOTAL COST</td>
                        <td><span id="total_val"></span></td>
                    </tr>
                    <tr id ="td_hidden" hidden>
                        <td colspan="7">
                            <label>Instruction/ Additional Notes</label>
                            <textarea style="margin: 0px; width: 893px; height: 85px;resize:none;"> </textarea>
                        </td>
                        <td>
                            <button class="btn btn-success col-lg-12 pull-right" style="height:100px;" type="submit" id="btn_submit"><i class="fa fa-save"></i> Submit</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>  
</div>    

