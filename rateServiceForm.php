<?php
$username = $_SESSION['username'];
require_once('_includes/setting.php');
require_once('_includes/dbaseCon.php');
require_once('_includes/library.php');
require_once('_includes/sql_statements.php');
include 'ict/views/checklist.php';
include 'ict/views/table.php';


$id = $_GET['id'];
$request = $_GET['req'];
$sub = $_GET['sub_req'];
include 'connection.php';
$sql = "SELECT * from tbltechnical_assistance as ta where ta.CONTROL_NO = '$id'";


$result = mysqli_query($conn, $sql);
if ($row = mysqli_fetch_array($result)) {
  $is_checked = category($row['TYPE_REQ']);
  $is_selected = sub_category(($row['TYPE_REQ_DESC']));
  $sub = sub_category(($row['TEXT1']));
  $sub_req = $row['TYPE_REQ_DESC'];
}




// carlo panget
// exit();

?>

<!DOCTYPE html>
<html>

<head>
  <title>FAS | Rate Service</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

  <!-- <button class="btn btn-lg btn-danger sweet-14" onclick="_gaq.push(['_trackEvent', 'example, 'try', 'Danger']);">Danger</button> -->
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="panel panel-default">
          <div class="box-body">
            <div>
              <h1>ICT Technical Assistance</h1><br>
            </div>

            <input type="hidden" name="curuser" value="" id="selectedUser" />
              <form method="POST" enctype="multipart/form-data" class="myformStyle" autocomplete="off" id = "saveAll" >    

                          <?php echo fillTableInfo(); ?>
                          <br>



                          <!-- START OF TYPE OF REQUEST -->
                          <u style="margin-top:20px;">TYPE OF REQUEST</u>

                            <?php include 'ict/views/type_request.php'; ?>
                            <?php include 'ict/views/table_footer.php'; ?>

              </form>

          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"><i class='fa fa-save'></i> Save</button>
<form  enctype="multipart/form-data" class="myformStyle" autocomplete="off" id = "checklist" >    
    <!-- Modal -->

    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document" style="width:70%;">

                          <!-- Modal content-->
                          <div class="modal-content" style="background-color:rgba(57,58,56,0.1);border-radius:30px;">
                            <div class="modal-body">
                              <ul class="nav nav-pills" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" data-toggle="pill" href="#login" style="margin-left:-140px;">A. SERVICE DIMENSION</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-toggle="pill" href="#regis" style="margin-right:-140px;">B. SUGGESTION FOR IMPROVEMENT</a>
                                </li>
                              </ul>
                              <div class="tab-content bg-success" style="background-color:#fff;height:auto;">
                                <div id="login" class="container tab-pane active">
                                  <table border=1 id="cssTable">
                                    <tbody class="table-scroll">
                                      <tr>
                                        <td></td>
                                        <td></td>
                                        <td style="text-align:center;font-weight:bold;" class="tdSpacing">
                                          (5)<br>
                                          Strongly Agree<br>
                                          Lubos na
                                          sumasang ayon
                                          <br><img src="images/happy.gif" style="width:50px;height:50px;">
                                        </td>
                                        <td style="text-align:center;font-weight:bold;" class="tdSpacing">
                                          (4)<br>
                                          Agree<br>
                                          Sumasang ayon
                                          <br>
                                          <img src="images/4.gif" style="width:50px;height:50px;">
                                        </td>
                                        <td style="text-align:center;font-weight:bold;" class="tdSpacing">
                                          (3)<br>
                                          Neutral<br>
                                          Sumasangayon o hindi sumasangayon<br>
                                          <img src="images/3.gif" style="width:50px;height:50px;">
                                        </td>
                                        <td style="text-align:center;font-weight:bold;" class="tdSpacing">
                                          (2)<br>
                                          Disagree<br>
                                          Hindi
                                          Sumasang ayon<br>
                                          <img src="images/2.gif" style="width:50px;height:50px;">
                                        </td>
                                        <td style="text-align:center;font-weight:bold;" class="tdSpacing">
                                          (1)<br>
                                          Strongly Disagree<br>
                                          Lubos na hindi sumasang ayon<br>
                                          <img src="images/1.gif" style="width:50px;height:50px;">
                                        </td>
                                      </tr>
                                      <tr>
                                        <td class="tdTitle tdSpacing">Responsiveness</td>
                                        <input type="hidden" value="Responsiveness" name="sd[]" />

                                        <td class="tdSpacing" style="text-align:justify;" class="tdSpacing">
                                          The service was willingly and <br>
                                          promptly extended to the <br>client/customer.<br>
                                          Maagap na naibibigay ang<br> serbisyo sa kliyente </td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold; text-align:center;"><input type="checkbox" class="g1" value="5" name="rating[]" style="width:25px;height:25px;" /> 
                                      </td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g1" value="4" name="rating[]" style="width:25px;height:25px;" /></td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g1" value="3" name="rating[]" style="width:25px;height:25px;" /></td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g1" value="2" name="rating[]" style="width:25px;height:25px;" /></td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g1" value="1" name="rating[]" style="width:25px;height:25px;" /></td>
                                      </tr>
                                      <tr>
                                        <td class="tdTitle tdSpacing">Reliability</td>
                                        <input type="hidden" value="Reliability" name="sd[]" />

                                        <td class="tdSpacing" style="text-align:justify;">
                                          Performed the service within the expectations of the client/customer served.
                                          Naisagawa ang serbisyo ayon sa inaasahan ng kliyente.
                                        </td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g2" value="5" name="rating[]" style="width:25px;height:25px;" /> </td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g2" value="4" name="rating[]" style="width:25px;height:25px;" /></td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g2" value="3" name="rating[]" style="width:25px;height:25px;" /></td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g2" value="2" name="rating[]" style="width:25px;height:25px;" /></td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g2" value="1" name="rating[]" style="width:25px;height:25px;" /></td>
                                      </tr>
                                      <tr>
                                        <td class="tdTitle tdSpacing">Access & Facilities </td>
                                        <input type="hidden" value="Access & Facilities" name="sd[]" />

                                        <td class="tdSpacing" style="text-align:justify;">
                                          Facilities/resources/modes of technology were readily available for convenient transactions.
                                          May maayos at angkop na pasilidad at sistema para sa serbisyo.
                                        </td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g3" value="5" name="rating[]" style="width:25px;height:25px;" /> </td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g3" value="4" name="rating[]" style="width:25px;height:25px;" /></td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g3" value="3" name="rating[]" style="width:25px;height:25px;" /></td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g3" value="2" name="rating[]" style="width:25px;height:25px;" /></td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g3" value="1" name="rating[]" style="width:25px;height:25px;" /></td>
                                      </tr>
                                      <tr>
                                        <td class="tdTitle tdSpacing">Communication</td>
                                        <input type="hidden" value="Communication" name="sd[]" />
                                        <td class="tdSpacing" style="text-align:justify;">
                                          Materials associated with the service are easily understood and feedback mechanisms are present relevant to the client’s concern.
                                          May sapat na impormasyon na madaling maunawaan at may mekanismo para matugunan ang mga puna o mungkahi
                                        </td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g4" value="5" name="rating[]" style="width:25px;height:25px;" /> </td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g4" value="4" name="rating[]" style="width:25px;height:25px;" /></td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g4" value="3" name="rating[]" style="width:25px;height:25px;" /></td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g4" value="2" name="rating[]" style="width:25px;height:25px;" /></td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g4" value="1" name="rating[]" style="width:25px;height:25px;" /></td>
                                      </tr>
                                      <tr>
                                        <td class="tdTitle tdSpacing">Costs</td>
                                        <input type="hidden" value="Costs" name="sd[]" />
                                        <td class="tdSpacing" style="text-align:justify;">
                                          Value for money spent on services rendered.
                                          Tama ang kaukulang bayad para sa serbisyo o iba pang gastos para sa transaksyon.
                                        </td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g5" value="5" name="rating[]" style="width:25px;height:25px;" /> </td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g5" value="4" name="rating[]" style="width:25px;height:25px;" /></td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g5" value="3" name="rating[]" style="width:25px;height:25px;" /></td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g5" value="2" name="rating[]" style="width:25px;height:25px;" /></td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g5" value="1" name="rating[]" style="width:25px;height:25px;" /></td>
                                      </tr>
                                      <tr>
                                        <td colspan="4" class="tdSpacing" style="text-align:center;font-weight:bold;">
                                          <input type="radio" style="width:25px; height:25px;" /> is free of charge
                                        </td>
                                        <td colspan="3" class="tdSpacing" style="text-align:center;font-weight:bold;">
                                          <input type="radio" style="width:25px; height:25px;" /> not applicable
                                        </td>
                                      </tr>
                                      <tr>
                                        <td class="tdTitle tdSpacing">Integrity</td>
                                        <input type="hidden" value="Integrity" name="sd[]" />
                                        <td class="tdSpacing" style="text-align:justify;">
                                          Provided services with high morale and spirit of honesty.
                                          Naglingkod nang may katapatan at mataas na integridad.

                                        </td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g6" value="5" name="rating[]" style="width:25px;height:25px;" /> </td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g6" value="4" name="rating[]" style="width:25px;height:25px;" /></td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g6" value="3" name="rating[]" style="width:25px;height:25px;" /></td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g6" value="2" name="rating[]" style="width:25px;height:25px;" /></td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g6" value="1" name="rating[]" style="width:25px;height:25px;" /></td>
                                      </tr>
                                      <tr>
                                        <td class="tdTitle tdSpacing">Assurance</td>
                                        <input type="hidden" value="Assurance" name="sd[]" />
                                        <td class="tdSpacing" style="text-align:justify;">
                                          The service was provided by competent personnel.
                                          Naibigay ang serbisyo nang may sapat na kakayahan at kaalaman.

                                        </td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g7" value="5" name="rating[]" style="width:25px;height:25px;" /> </td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g7" value="4" name="rating[]" style="width:25px;height:25px;" /></td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g7" value="3" name="rating[]" style="width:25px;height:25px;" /></td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g7" value="2" name="rating[]" style="width:25px;height:25px;" /></td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g7" value="1" name="rating[]" style="width:25px;height:25px;" /></td>
                                      </tr>
                                      <tr>
                                        <td class="tdTitle tdSpacing">Outcome</td>
                                        <input type="hidden" value="Outcome" name="sd[]" />
                                        <td class="tdSpacing" style="text-align:justify;">
                                          The overall expectations of the client are met.
                                          Nakamit ang kabuuang serbisyong inaasahan.


                                        </td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g8" value="5" name="rating[]" style="width:25px;height:25px;" /> </td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g8" value="4" name="rating[]" style="width:25px;height:25px;" /></td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g8" value="3" name="rating[]" style="width:25px;height:25px;" /></td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g8" value="2" name="rating[]" style="width:25px;height:25px;" /></td>
                                        <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g8" value="1" name="rating[]" style="width:25px;height:25px;" /></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                                <div id="regis" class="container tab-pane fade">
                                  <span class="spanTitle" style="margin-left:15%;">Mga mungkahi at obserbasyon para sa pagpapabuti ng serbisyo </span>

                                  <textarea name="suggestion" id="suggestion" class="cssTA" cols=150 rows=5 style="resize:none;border:groove 6px skyblue;font-stretch: ultra-expanded;font-size:24px;font-family:Lucida Grande,Verdana;">
                                            </textarea>
                                  </form>
                                  <div class="spanTitle">
                                    <img src="images/Isko.gif" style="width:auto;height:500px;margin-left:-50px;margin-top:-245px;float:left;z-index:-10;position:static">

                                    Name of Client (Optional): <?php echo '<u>' . $_SESSION['complete_name'] . '</u>'; ?> Contact Number (Optional)_____________Date Accomplished: November 16, 2020
                                    <br<br>
                                      <br><br>
                                      <br<br>
                                        <br><br>
                                        <br<br>

                                          ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                                          Privacy Statement

                                          DILG is committed to protecting your privacy. Any information gathered using this tool will be treated with utmost confidentiality and shall be solely used to improve our services being provided to the public. Thank you very much.

                                          (Ang DILG ay nangangako na protektahan ang iyong privacy. Anumang impormasyong natipon gamit ang sarbeyl na ito ay ituturing na lubos na pagiging kompidensiyal at gagamitin lamang upang mapabuti ang aming mga serbisyo. Maraming salamat.)
                                  </div>
                                </div><br><br><br>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary sweet-14" style="float: right;" id="finalizeButton" type="button" >Save changes</button>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </div>

                        </div>
                      </div>

</form>


<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>



<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->

<script src="_includes/sweetalert.min.js"></script>
<link rel="stylesheet" href="_includes/sweetalert.css">
<script>
  $(document).ready(function(){
    $(document).on('click','.sweet-14',function(){
      var c_n = $('#control_no').val();

    var count = document.querySelectorAll("#cssTable :checked").length;
    if (count == 0) {
      // alert(count);

      alert('Kindly checked all checkboxes in the field.');

    } else if (count <= 7) {
      var r = $("#cssTable .g1").val();

      alert(r);

      alert('Kindly checked all checkboxes in the field.');

    } else {




      // =================================
      swal({
        title: "Are you sure you want to proceed?",
        text: "Control No:" + c_n,
        type: "info",
        showCancelButton: true,
        confirmButtonClass: 'btn-danger',
        confirmButtonText: 'Yes',
        closeOnConfirm: false,
        showLoaderOnConfirm: true
      }, function() {
        let tbl = $('#table_footer').find('#checklist');
        let fuck  = $('#checklist').serialize();

        
        $.get({
          url: 'rateServiceForm_save.php?flag=<?php echo $_GET['flag']?>&'+fuck,
          data: {
            timeliness:$('#timeliness').val(),
            quality:$('#quality').val(),
            suggestion:$('#suggestion').val(),
            cn:c_n,
           
          },
          success: function(data) {
            console.log(data);
            setTimeout(function() {
              swal("Record saved successfully!");
            }, 3000);
            <?php
            if ($username == 'ljbanalan' || $username == 'mmmonteiro' || $username == 'masacluti' || $username == 'seolivar' || $username == 'jsodsod' || $username == 'jecastillo') {
            ?>
             window.location = "processing.php?division=<?php //echo $_GET['division']; ?>&ticket_id=";

            <?php
            } else {
            ?>
             window.location = "techassistance.php?division=<?php // echo $_GET['division']; ?>&ticket_id=";

            <?php
            }
            ?>
          }
        })


        // $.ajax({
        //   url: "rateServiceForm_save.php",
        //   method: "POST",
        //   data: {
        //    data:  $("#  ").serialize(),
        //    cn:c_n
        //   },

        //   success: function(data) {
        //     console.log(data);
        //     setTimeout(function() {
        //       swal("Record saved successfully!");
        //     }, 3000);
        //     <?php
        //     if ($username == 'ljbanalan' || $username == 'mmmonteiro' || $username == 'masacluti' || $username == 'seolivar' || $username == 'jsodsod' || $username == 'jecastillo') {
        //     ?>
        //     //  window.location = "processing.php?division=<?php //echo $_GET['division']; ?>&ticket_id=";

        //     <?php
        //     } else {
        //     ?>
        //     //  window.location = "techassistance.php?division=<?php // echo $_GET['division']; ?>&ticket_id=";

        //     <?php
        //     }
        //     ?>
        //   }
        // });
      });
      // ================================
    }
    })
  });
</script>