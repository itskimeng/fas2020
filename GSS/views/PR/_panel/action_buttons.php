<?php
if (in_array($username, $admin)) {
    echo '<a href="procurement_purchase_request_view.php?division='.$_GET['division'].'&pr_no='.$data['pr_no'].'" class="btn btn-success btn-sm btn-view" title="View"> <i class="fa fa-eye"></i></a>  ';
    if($data['stat'] == 0 || $data['stat'] == 16)
    {
      echo '<a href="GSS/route/post_to_budget.php?pr_no='.$data['pr_no'].'" class="btn btn-danger btn-sm btn-view" title="Submit to Budget"><i class="fa fa-share-square"></i></a>  ';

    }else{
      echo '<a href="#" class="btn btn-danger btn-sm btn-view" disabled readonly title="Submit to Budget"><i class="fa fa-share-square"></i></a>  ';

    }
  if ($data['is_gss'] != NULL) {
    echo '<button id="btn_submit_to_gss" value="'.$data['pr_no'].'" disabled readonly class="btn btn-primary btn-sm btn-view" title="Submit to GSS"> <i class="fa fa-send"></i></button>  ';

  } else if ($data['stat'] == 0) {
    echo '<button id="btn_submit_to_gss"  disabled class="btn btn-primary btn-sm btn-view" title="Submit to GSS" value="'.$data['pr_no'].'"> <i class="fa fa-send"></i></button>  ';

  } else {
    if($data['code'] == '' || $data['stat'] != 3 )
    {
    echo '<button id="btn_submit_to_gss" value="'.$data['pr_no'].'" readonly class="btn btn-primary btn-sm btn-view" title="Submit to GSS"> <i class="fa fa-send"></i></button>  ';

    }else{
    echo '<button id="btn_submit_to_gss"  disabled class="btn btn-primary btn-sm btn-view" title="Submit to GSS" value="'.$data['pr_no'].'"> <i class="fa fa-send"></i></button>  ';
    }
  }
  // if ($data['stat'] == 0 || $data['stat'] == 8 || $data['stat'] == 4 || $data['stat'] == 1 || $data['stat'] == 7 || $data['stat'] == 16) {
  //   echo '<button id="btn_received_by_gss" disabled readonly class="btn bg-purple btn-sm" title="Received by GSS" value="'.$data['pr_no'].'"> <i class="fa fa-rocket"></i></button>  ';

  // } else {
  //   echo '<button id="btn_received_by_gss"  class="btn bg-purple btn-sm" title="Received by GSS" value="'.$data['pr_no'].'"> <i class="fa fa-rocket"></i></button>  ';
  // }
} else if ($_GET['division'] == $data['pmo_id'] || $_SESSION['username'] == $data['submitted_by']) {
  if ($data['is_gss'] != NULL) {
    echo '<a href="procurement_purchase_request_view.php?division='.$_GET['division'].'&pr_no='.$data['pr_no'].'" class="btn btn-success btn-sm btn-view" title="View"> <i class="fa fa-eye"></i></a>  ';
    echo '<a disabled class="btn btn-danger btn-sm btn-view" title="Submit to Budget"><i class="fa fa-share-square"></i></a>  ';
    echo '<button id="btn_submit_to_gss"  disabled readonly class="btn btn-primary btn-sm btn-view" title="Submit to GSS" value="'.$data['pr_no'].'"> <i class="fa fa-send"></i></button>  ';
   
 } else {
  if($data['stat'] == 0){

  echo '<a href="procurement_purchase_request_view.php?division='.$_GET['division'].'&pr_no='.$data['pr_no'].'" class="btn btn-success btn-sm btn-view" title="View"> <i class="fa fa-eye"></i></a>  ';
  echo '<a href="GSS/route/post_to_budget.php?pr_no='.$data['pr_no'].'" class="btn btn-danger btn-sm btn-view" title="Submit to Budget"><i class="fa fa-share-square"></i></a>  ';
  echo '<button id="btn_submit_to_gss"  disabled class="btn btn-primary btn-sm btn-view" title="Submit to GSS" value="'.$data['pr_no'].'"> <i class="fa fa-send"></i></button>  ';
 }else if($data['stat'] == 2){
  echo '<a href="procurement_purchase_request_view.php?division='.$_GET['division'].'&pr_no='.$data['pr_no'].'" class="btn btn-success btn-sm btn-view" title="View"> <i class="fa fa-eye"></i></a>  ';
  echo '<a disabled class="btn btn-danger btn-sm btn-view" title="Submit to Budget"><i class="fa fa-share-square"></i></a>  ';
  echo '<button  id="btn_submit_to_gss"    class="btn btn-primary btn-sm btn-view" title="Submit to GSS" value="'.$data['pr_no'].'"> <i class="fa fa-send"></i></button>  ';
 }else{
  echo '<a href="procurement_purchase_request_view.php?division='.$_GET['division'].'&pr_no='.$data['pr_no'].'" class="btn btn-success btn-sm btn-view" title="View"> <i class="fa fa-eye"></i></a>  ';
  echo '<a disabled class="btn btn-danger btn-sm btn-view" title="Submit to Budget"><i class="fa fa-share-square"></i></a>  ';
  echo '<button disabled id="btn_submit_to_gss"    class="btn btn-primary btn-sm btn-view" title="Submit to GSS" value="'.$data['pr_no'].'"> <i class="fa fa-send"></i></button>  ';
 }


}
} else if ($_SESSION['username'] == $data['submitted_by']) {
  echo '<a href="procurement_purchase_request_view.php?division='.$_GET['division'].'&pr_no='.$data['pr_no'].'" class="btn btn-success btn-sm btn-view" title="View"> <i class="fa fa-eye"></i></a>  ';
} else {
  echo '<a disabled class="btn btn-success btn-sm btn-view" title="View"> <i class="fa fa-eye"></i></a>  ';

  echo '<a disabled class="btn btn-danger btn-sm btn-view"  readonly title="Submit to Budget"><i class="fa fa-share-square"></i></a>  ';

}

