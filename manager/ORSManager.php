<?php

class ORSManager
{
    public $conn = '';
    function __construct()
    {
        $this->conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
    }
    
    public function getORSdata($limit)
    {
        $sql = "SELECT id,received_by,date,datereceived, 
                       datereprocessed,
                       datereturned, 
                       datereleased, 
                       ors, 
                       ponum, 
                       payee, 
                       particular, 
                       sum(amount) as amount, 
                       remarks, 
                       reason,
                       sarogroup, 
                       status, 
                       dvstatus  
                       FROM saroob 
                       group by ponum desc 
                       order by id desc
                       ".$limit."
                       ";
                   

        $query = mysqli_query($this->conn, $sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($query)) {
            $id = $row["id"];
            $datereceived = $row["datereceived"];
            if ($datereceived == '0000-00-00') {
                $datereceived11 = '';
            } else {
                $datereceived11 = date('F d, Y', strtotime($datereceived));
            }

            $datereprocessed = $row["datereprocessed"];
            if ($datereprocessed == '0000-00-00') {
                $datereprocessed11 = '';
            } else {
                $datereprocessed11 = date('F d, Y', strtotime($datereprocessed));
            }
            $datereturned = $row["datereturned"];
            if ($datereturned == '0000-00-00') {
                $datereturned11 = '';
            } else {
                $datereturned11 = date('F d, Y', strtotime($datereturned));
            }

            $datereleased = $row["datereleased"];
            if ($datereleased == '0000-00-00') {
                $datereleased11 = '';
            } else {
                $datereleased11 = date('F d, Y', strtotime($datereleased));
            }
            $ors = $row["ors"];
            $ponum = $row["ponum"];
            $payee = $row["payee"];
            $particular = $row["particular"];
            /* $saronumber = $row["saronumber"];
                $ppa = $row["ppa"];
                $uacs = $row["uacs"]; */
            $amount1 = $row["amount"];

            $amount = number_format($amount1, 2);
            $date = $row["date"];
            $remarks = $row["remarks"];
            $sarogroup = $row["sarogroup"];
            $status = $row["status"];
            $dvstatus = $row["dvstatus"];
            // ============RECEIVED ===============
            if ($datereceived == '0000-00-00' || $datereceived == '' || $datereceived == null) {
                $btn_received = '<a class="btn btn-primary btn-xs" href="entity/post_received_ors.php?id=' . $id . '&stat=1">Received</a> </a>';
            } else {
                $btn_received = '<i><b>' . $row['received_by'] . '</b></i><br>' . $datereceived11;
            }
            // ============PROCESSED ===========
            if ($datereceived != '0000-00-00') {

                if ($datereprocessed == '0000-00-00' || $datereprocessed == null) {
                    $btn_processed = '<a href="CreateObligation.php?id=' . $id . '&stat=1"   class="btn btn-success btn-xs" >Proccess</a>';
                } else {
                    $btn_processed = $datereprocessed11;
                }
            }
            // ===========RETURN ================

            if ($datereturned == '0000-00-00' || $datereturned == null) {
                // $btn_return = '<a class="btn btn-danger btn-xs" href="ViewBURScomments.php?id=' . $id . 'stat=2">Return</a>';
                $btn_return = '
                    
            <button  data-id = "' . $id . '" type="button" class="btn btn-xs btn-danger btn-return"  data-target="#exampleModal"> Return </button>';
            } else {
                $btn_return = '<b>' . $row['reason'] . '</b><br>' . date('F d, Y', strtotime($datereturned));
            }


            // ===========RELEASED ==============

            if ($btn_processed != '0000-00-00') {
                if ($datereleased == null || $datereleased == '0000-00-00') {
                    $btn_released = '<a class="btn btn-success btn-xs" href="release_burs.php?id=' . $id . '&stat=1">Release</a>';
                } else {
                    $btn_released = $datereleased11;
                }
            } else {
                $btn_released = $datereleased11;
            }


            if ($status == 'Pending') {
                $style = 'background-color:red;';
            } else if ($status == 'Obligated') {
                $style = 'color:black;';
            } else {
                $style = 'color:black;';

            }



            if ($datereleased != '0000-00-00' || $datereleased != null) {

                $ors = '<a  style = "font-weight:bold;color:black;" onclick="myFunction(this)" data-dvstatus="' . $dvstatus . '" data-ors="' . $ors . '" data-toggle="modal" data-target="#ors_data_Modal">' . $ors . '</a>';
            } else {
                $ors = 'DRAFT';
            }
            if ($status == 'FROM GSS') {
                $ors_gss = 'style="background-color:#F8BBD0"';
            } else {
                $ors_gss = '';
            }
            // ACTION BUTTONS
            if($row['ors'] == '')
            {
                $btn_actions = '
                <a  data-id = "' . $id . '" type="button"  data-toggle="modal" data-target="#viewPanel" class="btn btn-success btn-sm btn-view"  title = "View" > <i class="fa fa-eye"></i></a> 
                <a  data-id = "' . $id . '" type="button"  data-toggle="modal" data-target="#deletePaneld" class="btn btn-danger btn-sm btn-delete"  title = "Delete"> <i class="fa fa-trash"></i></a> ';

            }else{
                $btn_actions = '
                <a  data-id = "' . $id . '" type="button"  data-toggle="modal" data-target="#viewPanel" class="btn btn-success btn-sm btn-view"  title = "View" > <i class="fa fa-eye"></i></a> 
                <a  data-id = "' . $row['ors'] . '" type="button"  data-toggle="modal" data-target="#editPanel" class="btn btn-primary btn-sm btn-edit"  title = "Edit" > <i class="fa fa-edit"></i></a> 
                <a  data-id = "' . $id . '" type="button"  data-toggle="modal" data-target="#deletePaneld" class="btn btn-danger btn-sm btn-delete"  title = "Delete"> <i class="fa fa-trash"></i></a> ';


            }
        

            $data[] = [
                'id' => $row['id'],
                'date_received' => $btn_received,
                'date_obligated' => $btn_processed,
                'date_return' => $btn_return,
                'date_released' => $btn_released,
                'ors' => $ors,
                'ponum' => $ponum,
                'payee' => $payee,
                'particular' => $particular,
                'amount' => $amount,
                'remarks' => $remarks,
                'style' => $style,
                'ors_gss' => $ors_gss,
                'status' => $status,
                'action' => $btn_actions


            ];
        }
        return $data;
    }
    public function getBURSdata()
    {
        $sql = "SELECT id,received_by, date,datereceived, datereprocessed,datereturned, datereleased, burs, ponum, 
        payee, particular, sum(amount) as amount, remarks,reason, sarogroup, status,dvstatus  
        FROM saroobburs group by burs desc order by id desc ";

        $query = mysqli_query($this->conn, $sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($query)) {
            $id = $row["id"];
            $datereceived = $row["datereceived"];
            if ($datereceived == '0000-00-00') {
                $datereceived11 = '';
            } else {
                $datereceived11 = date('F d, Y', strtotime($datereceived));
            }

            $datereprocessed = $row["datereprocessed"];
            if ($datereprocessed == '0000-00-00') {
                $datereprocessed11 = '';
            } else {
                $datereprocessed11 = date('F d, Y', strtotime($datereprocessed));
            }
            $datereturned = $row["datereturned"];
            if ($datereturned == '0000-00-00') {
                $datereturned11 = '';
            } else {
                $datereturned11 = date('F d, Y', strtotime($datereturned));
            }

            $datereleased = $row["datereleased"];
            if ($datereleased == '0000-00-00') {
                $datereleased11 = '';
            } else {
                $datereleased11 = date('F d, Y', strtotime($datereleased));
            }
            $ors = $row["burs"];
            $ponum = $row["ponum"];
            $payee = $row["payee"];
            $particular = $row["particular"];
            /* $saronumber = $row["saronumber"];
                $ppa = $row["ppa"];
                $uacs = $row["uacs"]; */
            $amount1 = $row["amount"];

            $amount = number_format($amount1, 2);
            $date = $row["date"];
            $remarks = $row["remarks"];
            $sarogroup = $row["sarogroup"];
            $status = $row["status"];
            $dvstatus = $row["dvstatus"];
            // ============RECEIVED ===============
            if ($datereceived == '0000-00-00' || $datereceived == '' || $datereceived == null) {
                $btn_received = '<a class="btn btn-primary btn-xs" href="entity/post_received_burs.php?id=' . $id . '&stat=1">Received</a> </a>';
            } else {
                $btn_received = '<i><b>' . $row['received_by'] . '</b></i><br>' . $datereceived11;
            }
            // ============PROCESSED ===========
            if ($datereceived != '0000-00-00') {

                if ($datereprocessed == '0000-00-00' || $datereprocessed == null) {
                    $btn_processed = '<a href="CreateObligationBURS.php?id=' . $id . '&stat=1"   class="btn btn-success btn-xs" >Proccess</a>';
                } else {
                    $btn_processed = $datereprocessed11;
                }
            }
            // ===========RETURN ================

            if ($datereturned == '0000-00-00' || $datereturned == null) {
                // $btn_return = '<a class="btn btn-danger btn-xs" href="ViewBURScomments.php?id=' . $id . 'stat=2">Return</a>';
                $btn_return = '
                    
            <button  data-id = "' . $id . '" type="button" class="btn btn-xs btn-danger btn-return"  data-target="#exampleModal"> Return </button>';
            } else {
                $btn_return = '<b>' . $row['reason'] . '</b><br>' . date('F d, Y', strtotime($datereturned));
            }


            // ===========RELEASED ==============

            if ($btn_processed != '0000-00-00') {
                if ($datereleased == null || $datereleased == '1970-01-01') {
                    $btn_released = '<a class="btn btn-success btn-xs" href="entity/post_released_burs.php?id=' . $id . '&stat=1">Release</a>';
                } else {
                    $btn_released = $datereleased11;
                }
            }


            if ($status == 'Pending') {
                $style = 'background-color:red;';
            } else if ($status == 'Obligated') {
                $style = 'color:black;';
            } else {
            }
            if ($status == 'FROM GSS') {
                $ors = 'DRAFT';
            } else {
                $ors = '<a  onclick="myFunction(this)" data-dvstatus="' . $dvstatus . '" data-ors="' . $ors . '" data-toggle="modal" data-target="#ors_data_Modal">' . $ors . '</a>';
            }
            if ($status == 'FROM GSS') {
                $ors_gss = 'style="background-color:#F3E5F5"';
            } else {
                $ors_gss = '';
            }



            $data[] = [
                'id' => $row['id'],
                'date_received' => $btn_received,
                'date_obligated' => $btn_processed,
                'date_return' => $btn_return,
                'date_released' => $btn_released,
                'ors' => $ors,
                'ponum' => $ponum,
                'payee' => $payee,
                'particular' => $particular,
                'amount' => $amount,
                'remarks' => $remarks,
                'style' => $style,
                'ors_gss' => $ors_gss,
                'status' => $status


            ];
        }
        return $data;
    }
    public function getSelectedORS($ors)
    {



        $sql = 'SELECT *
        FROM saroob where id='.$ors.' group by ors ';
        $query = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_array($query);
        // if ($row = mysqli_fetch_array($query)) {
        //     $data[] = [
        //         'received_by' => $row['received_by']
        //     ];
        // }

        return json_encode($row);

    }
    public function getSelectedPO($ors)
    {
        
        $sql = 'SELECT ponum,status
        FROM saroob where ors='.$ors.'  ';

 
        $query = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_array($query);
        return json_encode($row);
    }
    public function setORS()
    {
        $sql = "SELECT id,ors, payee  from saroob group by ors";
        $query = mysqli_query($this->conn, $sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($query)) {

            $data[] = [
                'id' => $row['id'],
                'ors' => $row['ors'],
                'payee' => $row['payee'],
            ];
        }
        return $data;
    }
    public function setPayee()
    {
        $sql = "SELECT id,payee from saroob group by payee";
        $query = mysqli_query($this->conn, $sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($query)) {

            $data[] = [
                'id' => $row['id'],
                'payee' => $row['payee']
            ];
        }
        return $data;
    }
    public function setPO()
    {
        $sql = "SELECT id,ponum from saroob where ponum != '' ";
        $query = mysqli_query($this->conn, $sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($query)) {

            $data[] = [
                'id' => $row['id'],
                'ponum' => $row['ponum']
            ];
        }
        return $data;
    }

   
}

