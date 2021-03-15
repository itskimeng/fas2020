<div class="navbar-inner">
    <ul class="nav nav-pills nav-wizard">
        <?php if (empty($pid) OR $seiri_show AND !$seiton_show AND !$seiso_show AND !$ltab_show): ?>
            <li class="active" style="border: .5px solid #b5b6b6;">
                <a class="hidden-xs" href="#step1" data-toggle="tab" data-step="1"><i class="fa fa-check"></i>S1. Sort - SEIRI</a>
                <a class="visible-xs" href="#step1" data-toggle="tab" data-step="1"></a>
                <div class="nav-arrow"></div>
            </li>
        <?php else: ?>
            <li class="" style="border: .5px solid #b5b6b6;">
                <a class="hidden-xs" href="#step1" data-toggle="tab" data-step="1"><i class="fa fa-check"></i>S1. Sort - SEIRI</a>
                <a class="visible-xs" href="#step1" data-toggle="tab" data-step="1"></a>
                <div class="nav-arrow"></div>
            </li>
        <?php endif ?>
            
        
        <?php if (!$seiri_show AND $seiton_show AND !$seiso_show AND !$ltab_show): ?>
            <li class="active" style="border: .5px solid #b5b6b6;">
                <div class="nav-wedge"></div>
                <a class="hidden-xs" href="#step2" data-toggle="tab" data-step="2"><i class="fa fa-check"></i>S2. Set in order - SEITON</a>
                <a class="visible-xs" href="#step2" data-toggle="tab" data-step="2">S2.</a>
                <div class="nav-arrow"></div>
            </li>
        <?php elseif (!$seiri_show AND !$seiton_show AND $seiso_show OR $ltab_show): ?>
            <li class="" style="border: .5px solid #b5b6b6;">
                <div class="nav-wedge"></div>
                <a class="hidden-xs" href="#step2" data-toggle="tab" data-step="2"><i class="fa fa-check"></i>S2. Set in order - SEITON</a>
                <a class="visible-xs" href="#step2" data-toggle="tab" data-step="2">S2.</a>
                <div class="nav-arrow"></div>
            </li>
        <?php endif ?>
            

        <?php if (!$seiri_show AND !$seiton_show AND $seiso_show AND !$ltab_show): ?>
            <li class="active" style="border: .5px solid #b5b6b6;">
                <div class="nav-wedge"></div>
                <a class="hidden-xs" href="#step3" data-toggle="tab" data-step="3"><i class="fa fa-check"></i>S3. Shining - SEISO</a>
                <a class="visible-xs" href="#step3" data-toggle="tab" data-step="3">3.</a>
                <div class="nav-arrow"></div>
            </li>
        <?php elseif (!$seiri_show AND !$seiton_show AND !$seiso_show AND $ltab_show): ?>
            <li class="" style="border: .5px solid #b5b6b6;">
                <div class="nav-wedge"></div>
                <a class="hidden-xs" href="#step3" data-toggle="tab" data-step="3"><i class="fa fa-check"></i>S3. Shining - SEISO</a>
                <a class="visible-xs" href="#step3" data-toggle="tab" data-step="3">3.</a>
                <div class="nav-arrow"></div>
            </li>
        <?php endif ?>
            

        <?php if (!$seiri_show AND !$seiton_show AND !$seiso_show AND $ltab_show): ?>
        <li class="active" style="border: .5px solid #b5b6b6;">
            <div class="nav-wedge"></div>

            <?php if (!empty($fetchData1['date_submitted'])): ?>
                <a class="hidden-xs" href="#step4" data-toggle="tab" data-step="4"><i class="fa fa-check"></i>4. Completed</a>
            <?php else: ?>
                <a class="hidden-xs" href="#step4" data-toggle="tab" data-step="4"><i class="fa fa-check"></i>4. Almost There!</a>    
            <?php endif ?>
            <a class="visible-xs" href="#step4" data-toggle="tab" data-step="4">4.</a>
        </li>
        <?php endif ?>

    </ul>
</div>