<?php
$pr = $_POST['id'];
$pr_no = $_POST['pr_no'];

$result = fetchStatusHistory($pr, $pr_no);
echo $result;
// echo fetchActionDate($pr);
    function fetchStatusHistory($pr, $pr_no)
    {
        $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
        $data = [];

        $sql = "SELECT
                        ph.id AS 'id',
                        stat.REMARKS as 'remarks',
                        ph.ACTION_DATE as 'action_date',
                        ph.ACTION_TAKEN as 'stat',
                        ph.PR_NO as 'pr_no',
                        ph.PR_ID,
                        emp.LAST_M as 'lastname',
                        emp.FIRST_M as 'firstname',
                        emp.MIDDLE_M as 'middlename',
                        pr.purpose as 'purpose',
                        pr.pmo as 'office',
                        pr.availability_code,
                        emp.UNAME as 'username'

                        from tbl_pr_history as ph 
                        LEFT JOIN pr as pr ON pr.id = ph.PR_ID
                        LEFT JOIN tblemployeeinfo as emp ON emp.EMP_N = ph.ASSIGN_EMP
                        LEFT JOIN tbl_pr_status as stat ON stat.ID = ph.ACTION_TAKEN
                        WHERE pr.id = '$pr' and pr.pr_no = '$pr_no'
                        ORDER BY stat asc";
                        
        $query = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($query)) {
            $office = $row['office'];
            $fad = ['10', '11', '12', '13', '14', '15', '16'];
            $ord = ['1', '2', '3', '5'];
            $lgmed = ['7', '18', '7',];
            $lgcdd = ['8', '9', '17', '9'];
            $cavite = ['20', '34', '35', '36', '45'];
            $laguna = ['21', '40', '41', '42', '47', '51', '52'];
            $batangas = ['19', '28', '29', '30', '44'];
            $rizal = ['23', '37', '38', '39', '46', '50'];
            $quezon = ['22', '31', '32', '33', '48', '49', '53'];
            $lucena_city = ['24'];
            if (in_array($office, $fad)) {
                $office = 'FINANCE AND ADMINISTRATIVE DIVISION - FAD';
            } else if (in_array($office, $lgmed)) {
                $office = 'LOCAL GOVERNMENT MONITORING AND EVALUATION DIVISION - LGMED';
            } else if (in_array($office, $lgcdd)) {
                $office = 'LOCAL GOVERNMENT CAPABILITY DEVELOPMENT DIVISION - LGCDD';
            } else if (in_array($office, $cavite)) {
                $office = 'CAVITE';
            } else if (in_array($office, $laguna)) {
                $office = 'LAGUNA';
            } else if (in_array($office, $batangas)) {
                $office = 'BATANGAS';
            } else if (in_array($office, $rizal)) {
                $office = 'RIZAL';
            } else if (in_array($office, $quezon)) {
                $office = 'QUEZON';
            } else if (in_array($office, $lucena_city)) {
                $office = 'LUCENA CITY';
            } else if (in_array($office, $ord)) {
                $office = 'OFFICE OF THE REGIONAL DIRECTOR - ORD';
            }
         
            // $time_e = '';
            
            // $diff = abs(strtotime($status_to_budget) - strtotime($status_draft));
            // $years = floor($diff / (365 * 60 * 60 * 24));
            // $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            // $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
            // $hours = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24) / (60 * 60));
            // $minutes = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60) / 60);

            // $time_period = ($row['stat'] == 1) ? $days.'days  and'.$hours.'hours': '0';





            $data[] = [
                'id' => $row['id'],
                'status' => $row['remarks'],
                'action_date' => date('F d, Y', strtotime($row['action_date'])),
                'time_e'=>$row['action_date'],
                'action_time' => date('h:i:a', strtotime($row['action_date'])),
                'assign_employee' => $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'],
                'username' => $row['username'],
                'pr_no' => $row['pr_no'],
                'purpose' => $row['purpose'],
                'stat' => $row['stat'],
                'office' => $office,
                'code' => $row['availability_code']
                // 'time_e' => $time_period
                
            ];
        }
        return json_encode($data);
    }
    // function fetchActionDate($pr, $status = ['0', '1', '2', '3', '4', '5'])
    // {
    //     $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
    //     $options = [];
    //     $time_e = '';
    //     foreach ($status as $stat) {
    //         $sql = "SELECT ACTION_DATE FROM tbl_pr_history where ACTION_TAKEN = '" . $stat . "' and PR_ID ='" . $pr . "' ";
    //         $query = mysqli_query($conn, $sql);

    //         $row = mysqli_fetch_assoc($query);
    //         $options[$stat] = $row['ACTION_DATE'];
    //         $date1 = '';
    //         $date2 = '';
    //         $date3 = '';
    //         $date4 = '';


    //         if (isset($options[0])) {
    //             $date1 = $options[0];
    //         }if (isset($options[1])) {
    //             $date2 = $options[1];
    //         }if (isset($options[2])) {
    //             $date3 = $options[2];
    //         }if (isset($options[3])) {
    //             $date4 = $options[3];
    //         }

    //         $diff = abs(strtotime($date2) - strtotime($date1));

    //         $years = floor($diff / (365 * 60 * 60 * 24));
    //         $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
    //         $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
    //         $hours = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24) / (60 * 60));
    //         $minutes = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60) / 60);

    //         if ($months == 0) {
    //             if ($days == 1) {
    //                 $time_e = $days . ' day ' . $hours . '';
    //             } else if ($days == 0) {
    //                 $time_e = $hours . ' hours and ' . $minutes . ' minutes';
    //             } else {
    //                 $time_e = $days . ' days';
    //             }
    //         } else {
    //             if ($months == 1) {
    //                 $time_e = $months . ' month';
    //             } else {
    //                 $time_e = $months . ' months';
    //             }
    //         }
    //     }
    //     // Array ( 
    //     return $time_e;
    // }

