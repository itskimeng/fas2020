<div class="modal fade" id="rfq_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 900px;margin-left:-15%;margin-top:15%;border-radius: 20px;">
            <div class="modal-header">
                <div style="    width: 75px; height: 75px; border-radius: 50%; display: flex; align-items: center; justify-content: center; position: absolute; top: -18px; background-color: white; color: #4cae4c; left: 48%;">
                    <img src="GSS/views/backend/images/logo.png" style="width:60px; height:60px;" />
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="multiple_rfq">
                    <div id='multi_rfq_panel'>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-primary hideme" style="height: 302px; box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
                                    <div class="box-header with-border">
                                        Assigning multiple Purchase Request Number
                                    </div>
                                    <div class="box-body">
                                        <div class="col-lg-6">
                                            <!-- Color Picker -->
                                            <div class="form-group">
                                                <label>RFQ No:</label>
                                                <input type="text" class="form-control pull-right" value="<?= $rfq_no['rfq_no']; ?>" name="rfq_no">

                                            </div>
                                            <!-- /.form group -->

                                            <!-- Color Picker -->
                                            <div class="form-group">
                                                <label>Mode of Procurement:</label>

                                                <div class="form-group">
                                                    <select class="form-control form-control" data-placeholder="-- Select  --" required="1" style="width:100%;" name="mode">
                                                        <option disabled="" selected="">-- Please select --</option>
                                                        <option value="1" data-id="Small Value Procurement" data-value="1">Small Value Procurement</option>
                                                        <option value="2" data-id="Shopping" data-value="2">Shopping
                                                        </option>
                                                        <option value="4" data-id="NP Lease of Venue" data-value="4">NP
                                                            Lease of Venue</option>
                                                        <option value="5" data-id="Direct Contracting" data-value="5">
                                                            Direct Contracting</option>
                                                        <option value="6" data-id="Agency to Agency" data-value="6">
                                                            Agency to Agency</option>
                                                        <option value="7" data-id="Public Bidding" data-value="7">Public
                                                            Bidding</option>
                                                        <option value="8" data-id="Not Applicable N/A" data-value="8">
                                                            Not Applicable N/A</option>
                                                    </select><input type="hidden" name="hidden-mode[]" value="">
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            <!-- /.form group -->

                                            <!-- time Picker -->
                                            <div class="bootstrap-timepicker">
                                                <div class="form-group">
                                                    <label>RFQ Date:</label>

                                                    <div class="input-group date" id="datepicker-group" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-autoclose="true">
                                                        <div class="input-group-addon"><i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="text" class="form-control pull-right info-dates" id="datepicker1" name="rfq_date">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                                <!-- /.form group -->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>PARTICULARS:</label>
                                                <textarea name="particulars" style="width: 406px; height: 190px;resize:none;"></textarea>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="box box-primary hideme">

                                    <div class="box-body">
                                        <table class="table table-condensed table-striped">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th>PR NO</th>
                                                    <th>Price</th>
                                                    <th>Office</th>
                                                    <th>Type</th>
                                                    <th>Purpose</th>
                                                </tr>
                                            </thead>
                                            <tbody id="items">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <input type="hidden" id="data-pr-id" name="data-pr-id" />
                                <button type="submit" class="btn btn-success" style="width: 100%;" id="btn_copy">Save</button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#datepicker1').datepicker({
            autoclose: true
        })
        $('#multiple_rfq').on('submit', function(e) {
            var form = this;

            let data_id = $('#data-pr-id').val();
            let form_serialize = $('#multiple_rfq').serialize();
            let date = $('#rfq_date').val();
            $.post({
                url: 'GSS/route/post_assign_multiple_rfq.php?'+form_serialize,
                success: function(data) {
                    setTimeout(() => {
                        toastr.success(
                            "RFQ successfully created!");
                        location.reload();
                    }, "3000")

                }
            })

            e.preventDefault();
        });
    })
</script>