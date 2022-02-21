<?php
$active = ($is_awarded['rfq_awarded'] == '1') ? 'active' : '';

?>
<ul role="tablist" class="nav nav-tabs bs-adaptive-tabs" id="myTab">
    <li id="rfq"  role="presentation">
        <a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="tab1-tab" href="#tab1">
            <i class="fa fa-archive"></i>
            <label>Request for Quotation</label>
        </a>
    </li>
    <li id="award" role="presentation" class="<?= $active; ?>" ><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="tab2-tab" href="#tab2"><i class="fa fa-calendar"></i> <label>For Awarding</label></a></li>
    <li id="po" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="tab3-tab" href="#tab3"><i class="fa fa-cog"></i> <label>Purchase Order</label></a></li>
</ul>