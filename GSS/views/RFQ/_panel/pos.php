<div class="col-md-6">
    <div class="box box-info dropbox">
        <div class="box-header">
            <h3 class="box-title"><i class="fa fa-book"></i> Supplier Ranking</h3>

        </div>
        <div class="box-body custom-box-body no-padding" style="height: 450px; max-height:230px; overflow-y: auto;">
        <div class="box_content">
            <ol class="rounded-list">
                <li>
                    <ol>
                    <?php foreach ($supplier as $key => $item) : ?>
                        <li><a href="#"><?= $item['supplier_title'];?> <b>(<?= $item['count'];?>)</b></a></li>
                    <?php endforeach; ?>
                        
                    </ol>
                </li>
            </ol>
        </div>
            <!-- <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Rank</th>
                        <th>Supplier Name</th>
                        <th>No. of POs Awarded</th>
                    </tr>
                   

                </tbody>
            </table> -->
        </div>
    </div>
</div>
<style>
    .box_content{text-align: justify;max-width: 600px;width: 100%;margin: 20px auto;padding: 15px;background: #fff;color: #595959;-webkit-border-bottom-right-radius: 4px;-webkit-border-bottom-left-radius: 4px;-moz-border-radius-bottomright: 4px;-moz-border-radius-bottomleft: 4px;border-bottom-right-radius: 4px;border-bottom-left-radius: 4px}ol{counter-reset: li;list-style: none;font: 15px 'trebuchet MS', 'lucida sans';padding: 0;margin-bottom: 4em;text-shadow: 0 1px 0 rgba(255,255,255,.5);margin-left: -5px;margin-top: 0px;margin-bottom: 0px}ol ol{margin: 0 0 0 2em}.rounded-list a{position: relative;display: block;padding: .4em .4em .4em 2em;margin: .5em 0;background: #ddd;color: #444;text-decoration: none;-moz-border-radius: .3em;-webkit-border-radius: .3em;border-radius: .3em;-webkit-transition: all .3s ease-out;-moz-transition: all .3s ease-out;-ms-transition: all .3s ease-out;-o-transition: all .3s ease-out;transition: all .3s ease-out}.rounded-list a:before{content: counter(li);counter-increment: li;position: absolute;left: -1.3em;top: 50%;margin-top: -1.3em;background: #ffc923;height: 39px;width: 39px;line-height: 31px;border: .3em solid #fff;text-align: center;font-weight: bold;-moz-border-radius: 2em;-webkit-border-radius: 2em;border-radius: 2em;-webkit-transition: all .3s ease-out;-moz-transition: all .3s ease-out;-ms-transition: all .3s ease-out;-o-transition: all .3s ease-out;transition: all .3s ease-out}.rounded-list a:hover:before{-moz-transform: rotate(360deg);-webkit-transform: rotate(360deg);-moz-transform: rotate(360deg);-ms-transform: rotate(360deg);-o-transform: rotate(360deg);transform: rotate(360deg)}.rounded-list a:hover:before{background: #1da7e7;color: #fff}
</style>