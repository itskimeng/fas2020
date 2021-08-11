
    <?php 
include 'controller/PurchaseRequestController.php';

?>
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
              <label>Region</label>
              <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true" disabled>
                <option selected="selected" data-select2-id="19">Region IV-A Calabarzon</option>
              </select>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label>Office</label>
              <select class="form-control select2bs4 select2-hidden-accessible" id="office" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true" >
                <option></option>
                <?php foreach ($pmo as $key => $office): ?>
                    <option value="<?php echo $office['office'];?>" data-code="<?php echo $office['office']; ?>" ><?php echo $office['office']; ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label>PR Date</label>
              <input type="text" class="form-control pull-right" name="target_date" id="datepicker2" value="" required="" placeholder="mm/dd/yyyy" autocomplete="off">
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
 
   