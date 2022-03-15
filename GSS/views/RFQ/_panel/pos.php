<div class="box box-info" id="pos_panel" style="  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);">
    <div class="box-header with-border">
        <b> Proof of Sending
        </b>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <?= group_select('Supplier', 'supplier', $supplier_opts, '', 'select2', '', false, '', true); ?>
            <?= proc_action_btn('Generate', '', 'export_pos', 'btn btn-flat bg-purple', '', '', '', 'fa fa-excel-o', '#'); ?>
        </div>
    </div>
</div>