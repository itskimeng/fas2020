<div class="modal fade" id="abstract" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 1500px;">
        <div class="modal-content" style="border-radius: 20px;height:750px;">
            <div class="modal-header">
                <div style="font-size: 15pt;margin-left:25%;font-family:'Times New Roman">DEPARTMENT OF THE INTERIOR
                </div>
                <div style="width: 75px; height: 75px; border-radius: 50%; display: flex; align-items: center; justify-content: center; position: absolute; top: -18px; background-color: white; color: #4cae4c; left: 48%;">
                    <img src="GSS/views/backend/images/logo.png" style="width:60px; height:60px;" />
                </div>
                <div style="position:relative;font-size: 15pt;margin-left:55%;margin-top:-30px;font-family:'Times New Roman">
                    AND LOCAL GOVERNMENT</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-abstract">
                    <div id='multi_rfq_panel'>
                        <div class="row">
                      
                            <div class="col-lg-12">
                                <div class="box box-primary">
                                    <!-- <div class="box-header with-border">
                                        <img src="GSS/views/backend/images/2.png" style="width:25px" /> Filled-up all data capture to complete awarding. <button type="button" class="btn btn-sm btn-warning" id="btn-back">Back
                                        </button>
                                        <button type="button" class="btn btn-sm btn-success" id="btn-award">Award
                                        </button>
                                        <button type="button" class="btn btn-sm btn-primary" id="btn-draft">Save as
                                            Draft </button>
                                    </div> -->
                                    <div class="box-body">
                                        <div class="panel panel-primary" >
                                            <div class="panel-heading"  style="background:linear-gradient(90deg, #2196F3, #0D47A1);color:#fff;">
                                                <span><i class="fa fa-bar-chart-o fa-fw"></i>Quotation Information</span>
                                                <button type="button" class="btn btn-danger pull-right" id="btn-export-abstract">Export</button>
                                            </div>

                                            <div class="box-body box-emp">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div id="cgroup-filter_year" class="form-group">
                                                            <label class=" control-label">Abstract No.: </label>
                                                            <input type="text" class="form-control" id="cform-abstract_no" value="" name="cform-abstract_no" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div id="cgroup-filter_year" class="form-group">
                                                            <label class=" control-label">RFQ No.: </label>
                                                            <input type="text" class="form-control" id="cform-abstract-rfq_no" name="cform-rfq_no" value='' disabled />

                                                            <input type="hidden" class="form-control" id="cform-rfq_id" name="cform-rfq_id" />

                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div id="cgroup-filter_year" class="form-group">
                                                            <label class=" control-label">PR No.: </label>
                                                            <input type="text" class="form-control" id="cform-abstract-pr_no" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div id="cgroup-filter_year" class="form-group">
                                                            <label class=" control-label">Total ABC: </label>
                                                            <input type="text" class="form-control" id="cform-abstract_abc" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div id="cgroup-filter_year" class="form-group">
                                                            <label class=" control-label">Abstract Date: </label>
                                                            <input type="text" class="form-control" name="cform-abstract_date" id="cform-abstract_date" value="" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div id="cgroup-filter_year" class="form-group">
                                                            <label class=" control-label">RFQ Date: </label>
                                                            <input type="text" class="form-control" id="cform-abstract-rfq_date" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div id="cgroup-filter_year" class="form-group">
                                                            <label class=" control-label">PR Date: </label>
                                                            <input type="text" class="form-control" id="cform-abstract-pr_date" disabled />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div id="cgroup-filter_year" class="form-group">
                                                            <label class=" control-label">Office: </label>
                                                            <input type="text" class="form-control" id="cform-abstract-office" disabled />
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <table class="table table-condensed table-striped">
                                                <thead style="background:linear-gradient(90deg, #2196F3, #0D47A1);color:#fff;">
                                                    <th>ITEM</th>
                                                    <th style="width:50%">TOTAL ABC</th>
                                                </thead>
                                                <tbody id="pr_items">

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-lg-9">

                                            <table class="table table-condensed table-striped">
                                            <thead style="background:linear-gradient(90deg, #2196F3, #0D47A1);color:#fff;" id="supplier_quotation">

                                                </thead>
                                                <tbody id="item_quoted">

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
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
        fetchSelectedSupplier();

        function fetchSelectedSupplier(item) {
            $.post({
                url: 'GSS/views/RFQ/_panel/tiles/awarding_item_table.php',
                data: {
                    id: item,
                },
                success: function(data) {
                    $('#awarding').html(data);
                }
            })

        }

    })
</script>