<?php
if (in_array($username, $admin)) {
    echo '<a href="procurement_purchase_request_view.php?division='.$_GET['division'].'&id='.$data['pr_no'].'" class="btn btn-success btn-sm btn-view" title="View"> <i class="fa fa-eye"></i></a>  ';
    if($data['stat'] == 1 || $data['stat'] == 3 || $data['stat'] == 4)
    {
      echo '<a href="#" class="btn btn-danger btn-sm btn-view" disabled readonly title="Submit to Budget"><i class="fa fa-share-square"></i></a>  ';
    }else{
      echo '<a href="GSS/route/post_to_budget.php?pr_no='.$data['pr_no'].'" class="btn btn-danger btn-sm btn-view" title="Submit to Budget"> <i class="fa fa-share-square"></i></a>  ';
    }
  if ($data['is_gss'] != NULL || $data['stat'] == 0 || $data['1'] == 1) {
    echo '<button id="btn_submit_to_gss" disabled readonly class="btn btn-primary btn-sm btn-view" title="Submit to GSS"> <i class="fa fa-send"></i></button>  ';

  } else if ($data['stat'] == 0) {
    echo '<button id="btn_submit_to_gss"  class="btn btn-primary btn-sm btn-view" title="Submit to GSS" value="'.$data['pr_no'].'"> <i class="fa fa-send"></i></button>  ';

  } else {
    echo '<button id="btn_submit_to_gss"  class="btn btn-primary btn-sm btn-view" title="Submit to GSS" value="'.$data['pr_no'].'"> <i class="fa fa-send"></i></button>  ';

  }
  if ($data['stat'] == 1 || $data['stat'] == 0) {
    echo '<button id="btn_received_by_gss"  disabled readonly class="btn bg-purple btn-sm" title="Received by GSS" value="'.$data['pr_no'].'"> <i class="fa fa-rocket"></i></button>  ';
  } else if ($data['stat'] >= 4) {
    echo '<button id="btn_received_by_gss" disabled readonly class="btn bg-purple btn-sm" title="Received by GSS" value="'.$data['pr_no'].'"> <i class="fa fa-rocket"></i></button>  ';
  } else {
    echo '<button id="btn_received_by_gss"  class="btn bg-purple btn-sm" title="Received by GSS" value="'.$data['pr_no'].'"> <i class="fa fa-rocket"></i></button>  ';
  }
} else if ($_GET['division'] == $data['pmo_id'] || $_SESSION['username'] == $data['submitted_by']) {
  if ($data['is_gss'] != NULL) {
    echo '<button id="btn_submit_to_gss"  disabled readonly class="btn btn-primary btn-sm btn-view" title="Submit to GSS" value="'.$data['pr_no'].'"> <i class="fa fa-send"></i></button>  ';
    
 } else {
    echo '<button id="btn_submit_to_gss"  class="btn btn-primary btn-sm btn-view" title="Submit to GSS" value="'.$data['pr_no'].'"> <i class="fa fa-send"></i></button>  ';
  }
  echo proc_action_btn('View/Edit', '', '', 'btn btn-flat btn-success', '', "?division=" . $_GET['division'], "&id=" . $data['pr_no'], 'fa fa-eye', 'procurement_purchase_request_view.php');
} else if ($_SESSION['username'] == $data['submitted_by']) {
  echo proc_action_btn('View/Edit', '', '', 'btn btn-flat btn-success', '', "?division=" . $_GET['division'], "&id=" . $data['pr_no'], 'fa fa-eye', 'procurement_purchase_request_view.php');
} else {
}
