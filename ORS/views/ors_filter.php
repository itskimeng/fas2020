
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-filter"></i> Filters</h3>


                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">

                        </div>
                    </div>

                    <form id="form-filter">
                        <div class="card-body card-body-filter collapse show">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>ORS Number</label>
                                        <select class="form-control select2 select2-hidden-accessible ors" id="ors_num" style="width: 100%;"  tabindex="-1" aria-hidden="true">
                                            <?php foreach ($filter_ors as $key => $ors):?>
                                                <option  value="<?php echo $ors['ors'];?>" data-id="<?php echo $ors['id'];?>"><?php echo $ors['ors'];?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 po_body">
                                    <div class="form-group">
                                        <label>PO Number</label>
                                        <input type="text" id= "ponum" class="form-control pull-right" value="" required=""  autocomplete="off" readonly>

                                       
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control select2 select2-hidden-accessible" id="status" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                            <option></option>
                                            <option VALUE = "FROM GSS">FROM GSS</option>
                                            <option value = "Obligated">OBLIGATED</option>
                                            <option value = "Draft">DRAFT</option>
                                            
                                        </select>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="row">
                               

                            <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date Obligated</label>
                                        <input type="text" class="form-control pull-right" name="target_date" id="datepicker2" value="" required="" placeholder="mm/dd/yyyy" autocomplete="off">
                                    </div>
                                </div>
                                

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date Released</label>
                                        <input type="text" class="form-control pull-right" name="target_date" id="datepicker3" value="" required="" placeholder="mm/dd/yyyy" autocomplete="off">
                                    </div>
                                </div>
                                
                            </div>





                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group float-right">
                                        <div class="d-grid gap-2 d-md-block">

                                            <button class="btn btn-primary btn-md pull-right" id="btn-filter" type="button"><i class="fa fa-search"></i> Filter</button>
                                            <button class="btn btn-default btn-md pull-right" id="btn-reset" type="button"><i class="fa fa-sync-alt"></i> Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row float-right">
                                <div class="col-md-12">


                                </div>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>