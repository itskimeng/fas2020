<div class="navbar-inner">
    <ul class="nav nav-pills nav-wizard">
        <?php if (!$ltab_show): ?>
            <li class="active" style="border: .5px solid #b5b6b6;">
                <a class="hidden-xs" href="#step1" data-toggle="tab" data-step="1"><i class="fa fa-check"></i>Kriteria</a>
                <a class="visible-xs" href="#step1" data-toggle="tab" data-step="1"></a>
                <div class="nav-arrow"></div>
            </li>
        <?php else: ?>
            <li class="" style="border: .5px solid #b5b6b6;">
                <a class="hidden-xs" href="#step1" data-toggle="tab" data-step="1"><i class="fa fa-check"></i>Kriteria</a>
                <a class="visible-xs" href="#step1" data-toggle="tab" data-step="1"></a>
                <div class="nav-arrow"></div>
            </li>        
        <?php endif ?>        

        <?php if (!$seiri_show AND !$seiton_show AND !$seiso_show AND $ltab_show): ?>
        <li class="active" style="border: .5px solid #b5b6b6;">
            <div class="nav-wedge"></div>

            <?php if (!empty($fetchData1['date_submitted'])): ?>
                <a class="hidden-xs" href="#step2" data-toggle="tab" data-step="2"><i class="fa fa-check"></i>4. Kumpleto na</a>
            <?php else: ?>
                <a class="hidden-xs" href="#step2" data-toggle="tab" data-step="2"><i class="fa fa-check"></i>4. Konti na lang!</a>    
            <?php endif ?>
            <a class="visible-xs" href="#step2" data-toggle="tab" data-step="2">4.</a>
        </li>
        <?php endif ?>

    </ul>
</div>