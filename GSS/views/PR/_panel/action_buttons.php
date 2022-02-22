<?php
                if (in_array($username, $admin)) {
                  
                  echo proc_action_btn('View/Edit', '', '', 'btn btn-flat btn-success', '', "?division=" . $_GET['division'], "&id=" . $data['pr_no'], 'fa fa-eye', 'procurement_purchase_request_view.php');
                  if ($data['is_gss'] != NULL) {
                    echo proc_action_btn('Submit to GSS', 'disabled readonly', 'btn_submit_to_gss', 'btn btn-flat bg-blue', $data['pr_no'], '', '', 'fa fa-send', '#');
                  } else if($data['stat'] == 0){
                    echo proc_action_btn('Submit to GSS', '', 'btn_submit_to_gss', 'btn btn-flat bg-blue', $data['pr_no'], '', '', 'fa fa-send', '#');

                  }else {
                    echo proc_action_btn('Submit to GSS', '', 'btn_submit_to_gss', 'btn btn-flat bg-blue', $data['pr_no'], '', '', 'fa fa-send', '#');
                  }
                  // if ($data['is_budget'] != NULL) {
                  //   echo proc_action_btn('Submit to Budget', 'disabled readonly', '', 'btn btn-flat bg-blue', '', "&id=" . $data['pr_no'], "&username=" . $_SESSION['currentuser'], 'fa fa-send', $route . 'post_to_budget.php?division=' . $_GET['division'] . '&');
                  // } else {
                  //   echo proc_action_btn('Submit to Budget', '', '', 'btn btn-flat bg-blue', '', "&id=" . $data['pr_no'], "&username=" . $_SESSION['currentuser'], 'fa fa-send', $route . 'post_to_budget.php?division=' . $_GET['division'] . '&');
                  // }
                  if($data['stat'] == 1)
                  {
                    echo proc_action_btn('Receive by GSS', '', 'btn_received_by_gss', 'btn btn-flat bg-purple', $data['pr_no'], '', '', 'fa fa-check-square', '#');
                  }else if ($data['stat'] >= 4 )
                  {
                    echo proc_action_btn('Receive by GSS', 'disabled readonly', 'btn_received_by_gss', 'btn btn-flat bg-purple', $data['pr_no'], '', '', 'fa fa-check-square', '#');
                  }else{
                    echo proc_action_btn('Receive by GSS', '', 'btn_received_by_gss', 'btn btn-flat bg-purple', $data['pr_no'], '', '', 'fa fa-check-square', '#');

                  }
                  
                } else if ($_GET['division'] == $data['pmo_id'] || $_SESSION['username'] == $data['submitted_by']) {
                  if ($data['is_gss'] != NULL ) {
                    echo proc_action_btn('Submit to GSS', 'disabled readonly', 'btn_submit_to_gss', 'btn btn-flat bg-purple', $data['pr_no'], '', '', 'fa fa-send', '#');
                  } else {
                    echo proc_action_btn('Submit to GSS', '', 'btn_submit_to_gss', 'btn btn-flat bg-purple', $data['pr_no'], '', '', 'fa fa-send', '#');
                  }
                  // if ($data['is_budget'] != NULL) {
                  //   echo proc_action_btn('Submit to Budget', 'disabled readonly', '', 'btn btn-flat bg-blue', '', "&id=" . $data['pr_no'], "&username=" . $_SESSION['currentuser'], 'fa fa-send', $route . 'post_to_budget.php?division=' . $_GET['division'] . '&');
                  // } else {
                  //   echo proc_action_btn('Submit to Budget', '', '', 'btn btn-flat bg-blue', '', "&id=" . $data['pr_no'], "&username=" . $_SESSION['currentuser'], 'fa fa-send', $route . 'post_to_budget.php?division=' . $_GET['division'] . '&');
                  // }
                  echo proc_action_btn('View/Edit', '', '', 'btn btn-flat btn-success', '', "?division=" . $_GET['division'], "&id=" . $data['pr_no'], 'fa fa-eye', 'procurement_purchase_request_view.php');
                } else if ($_SESSION['username'] == $data['submitted_by']) {
                  echo proc_action_btn('View/Edit', '', '', 'btn btn-flat btn-success', '', "?division=" . $_GET['division'], "&id=" . $data['pr_no'], 'fa fa-eye', 'procurement_purchase_request_view.php');
                } else {
                }

                ?>