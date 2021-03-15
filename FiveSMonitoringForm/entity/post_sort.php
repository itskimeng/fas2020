<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../../ActivityPlanner/manager/FlashMessage.php';
require_once '../manager/FiveSEmployee.php';
require_once "../../connection.php";

if (isset($_POST['submit'])) {

    $username = $_SESSION['username'];
    $userid = $_SESSION['currentuser'];
    $hidden_type = $_POST['hidden_type'];
    $hidden_ids = $_POST['hidden_id'];
    $scores = $_POST['scores'];
    $comments = $_POST['comments'];
    $subtotal = $_POST['seiri_subtotal'];
    $pid = isset($_POST['pid']) ? $_POST['pid'] : '';
    $entids = isset($_POST['hidden_entid']) ? $_POST['hidden_entid'] : '';
    
    $is_new = true;

    $flash = new FlashMessage();
    $fives = new FiveSEmployee();
    $today = new DateTime();

    if (empty($pid)) {
        $parent = $fives->insert($conn, ['emp_id'=>$userid, 'status'=>'Draft', 'date_created'=>$today->format('Y-m-d H::i:s'), 'subtotal'=>$subtotal]); 
    } else {
        $is_new = false;
        $fives->update($conn, ['id'=>$pid, 'seiri'=>$subtotal]); 
        $parent = $pid;
    }

    foreach ($hidden_ids as $key => $id) {
        $data = [
            'parent_id' => $parent,
            'entid' => !empty($entids) ? $entids[$id] : '',
            'fsid' => $id,
            'score' => getScores($scores[$id][0]),
            'comments' => $comments[$id],
            'date_created' => $today->format('Y-m-d H::i:s') 
        ];
        if ($is_new) {
            $fives->insertEntry($conn, $data);
        } else {
            $fives->updateEntry($conn, $data);
        }
    }
    
    $flash->generateNew("Data has been updated successfully", "success", "check");
} 

    header('location:../../base_fives_edit_form.html.php?username='.$_SESSION["username"].'&division='.$_SESSION["division"].''.'&parent='.$parent.'');


    function getScores($text) {
        $score = 0;
        switch ($text) {
            case 'one':
                $score = 1;
                break;
            case 'two':
                $score = 2;
                break;
            case 'three':
                $score = 3;
                break;
            case 'four':
                $score = 4;
                break;    
            case 'five':
                $score = 5;
                break;
        }

        return $score;
    }

    

