<div class="col-md-6">
    <div class="box box-primary dropbox">
        <div class="box-header">
            <h3 class="box-title"><i class="fa fa-book"></i> Purchase Request</h3>
        </div>
        <div class="box-body custom-box-body no-padding" style="height: 450px; max-height:230px; overflow-y: auto;">
        <?= proc_text_input("hidden", '', 'cform-received-by', '', false, $_SESSION['currentuser']); ?>

            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th class="text-center" width="25%">PR NO</th>
                        <th class="text-center">OFFICE</th>
                        <th class="text-center">TOTAL ABC</th>
                        <th class="text-center" width="25%">DATE SUBMITTED</th>
                        <th class="text-center">ACTION</th>
                    </tr>
                    <?php if (empty($rfq_pending_pr_opts)) : ?>
                        <tr>
                            <td colspan=5>
                                <div class="callout callout-warning">
                                    <h4> <i class="icon fa fa-warning"></i> No data available in table
                                    </h4>
                                </div>
                            </td>
                        </tr>

                    <?php endif; ?>
                    <?php foreach ($rfq_pending_pr_opts as $key => $data) : ?>
                        <tr>
                            <td><?= $data['pr_no']; ?></td>
                            <td><?= $data['office']; ?></td>
                            <td><?= $data['amount']; ?></td>
                            <td><?= $data['pr_date']; ?></td>
                            <td style="text-align:center;">
                                <button id="btn_received_by_gss" data-id="<?= $data['id'];?>" value="<?= $data['pr_no']; ?>" class="btn bg-purple btn-sm" title="Received by GSS" >
                                    <i class="fa fa-rocket"></i>
                                </button>

                                <!-- <button type="button" class="btn btn-primary btn-sm" id="btn_create_rfq" value="<?= $data['pr_no']; ?>">
                                    <a href="procurement_request_for_quotation_create.php?id=<?= $data['id']; ?>&pr_no=<?= $data['pr_no']; ?>"><i class="fa fa-plus-square"></i></a>
                                </button> -->
                                <button type="button" data-toggle="modal" data-id="<?= $data['id'];?>"  id="btn-return" data-target="#exampleModal"  value="<?= $data['pr_no']; ?>" class="btn btn-danger btn-sm" title="Return" value="<?= $data['pr_no']; ?>"><i class="fa fa-undo"></i>
                                </button>

                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
  
<style>
    .box_content{text-align: justify;max-width: 600px;width: 100%;margin: 20px auto;padding: 15px;background: #fff;color: #595959;-webkit-border-bottom-right-radius: 4px;-webkit-border-bottom-left-radius: 4px;-moz-border-radius-bottomright: 4px;-moz-border-radius-bottomleft: 4px;border-bottom-right-radius: 4px;border-bottom-left-radius: 4px}ol{counter-reset: li;list-style: none;font: 15px 'trebuchet MS', 'lucida sans';padding: 0;margin-bottom: 4em;text-shadow: 0 1px 0 rgba(255,255,255,.5);margin-left: -5px;margin-top: 0px;margin-bottom: 0px}ol ol{margin: 0 0 0 2em}.rounded-list a{position: relative;display: block;padding: .4em .4em .4em 2em;margin: .5em 0;background: #ddd;color: #444;text-decoration: none;-moz-border-radius: .3em;-webkit-border-radius: .3em;border-radius: .3em;-webkit-transition: all .3s ease-out;-moz-transition: all .3s ease-out;-ms-transition: all .3s ease-out;-o-transition: all .3s ease-out;transition: all .3s ease-out}.rounded-list a:before{content: counter(li);counter-increment: li;position: absolute;left: -1.3em;top: 50%;margin-top: -1.3em;background: #ffc923;height: 39px;width: 39px;line-height: 31px;border: .3em solid #fff;text-align: center;font-weight: bold;-moz-border-radius: 2em;-webkit-border-radius: 2em;border-radius: 2em;-webkit-transition: all .3s ease-out;-moz-transition: all .3s ease-out;-ms-transition: all .3s ease-out;-o-transition: all .3s ease-out;transition: all .3s ease-out}.rounded-list a:hover:before{-moz-transform: rotate(360deg);-webkit-transform: rotate(360deg);-moz-transform: rotate(360deg);-ms-transform: rotate(360deg);-o-transform: rotate(360deg);transform: rotate(360deg)}.rounded-list a:hover:before{background: #1da7e7;color: #fff}
</style>
</div>
<div class="col-md-6">
<div class="box box-primary dropbox">
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
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-book"></i>Return Purchase Request</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>

            </div>
            <form method="POST" action="GSS/route/post_return_pr.php" id="form">
                <div class="modal-body">
                    Remarks:
                    <textarea style="width: 572px; height: 143px;resize:none;" name="remarks">
        </textarea>
                    <?= proc_text_input('hidden', '', 'hidden-pr-no', 'hidden-pr-no', $required = true, '') ?>
                    <?= proc_text_input('hidden', '', 'hidden-pr-id', 'hidden-pr-id', $required = true, '') ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '#btn-return', function() {
        let id = $(this).data("id"); 

        $('#hidden-pr-no').val($(this).val());
        $('#hidden-pr-id').val(id);
    })
    $(document).on('click', '#btn_received_by_gss', function () {
        let path = "GSS/route/";
        let pr = $(this).val();
        if (pr != '') {
            pr = $(this).val();


        } else {
            pr = $('#btn_received').data('value');
        }
        let current_user = $('#cform-received-by').val();
        let division = '<?= $_GET['division'];?>';
        let id = $(this).data("id"); 



        $.post({
            url: path + "post_received.php",
            data: {
                pr_no: pr,
                pr_id:id,
                received_by: current_user
            },
            success: function (data) {
                toastr.success("You have successfully received this PR!");
                setTimeout(
                    function () {
                        window.location = "procurement_request_for_quotation.php?division=" + division;
                    },
                    1000);


            }
        })



    })
</script>