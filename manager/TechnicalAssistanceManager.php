<?php

class TechnicalAssistanceManager
{
    public $conn = '';

    const STATUS_RATED  = "Rated";

    function __construct()
    {
        $this->conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
    }
    public function getReqType()
    {
        $sql = "SELECT * FROM `tbl_ta_typerequest`";

        $query = mysqli_query($this->conn, $sql);
        $data[] = '';
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = [
                'id' => $row['ID'],
                'title' => $row['TITLE']
            ];
        }
        return $data;
    }

    
    public function fetchdata()
    {
        $sql = "SELECT ur.REQ_ID as enable,tr.ID AS id, ur.ID AS tr_id ,tr.title as title, ur.TITLE as request_type, ur.REQUEST_ID as req_id, ur.class as req_class 
        FROM `tbl_ta_typerequest` tr 
        LEFT JOIN tbl_ta_subrequest ur on tr.ID = ur.REQUEST_ID
         ";

        $query = mysqli_query($this->conn, $sql);
        $data[] = '';
        while ($row = mysqli_fetch_assoc($query)) {
            if ($row['enable'] != '') {
                $id = $row['enable'];
            } else {
                $id = ' ';
            }
            $data[] = [
                'id' => $row['id'],
                'request_id' => $row['tr_id'],
                'title' => $row['title'],
                'request_type' => $row['request_type'],
                'req_id' => $row['req_id'],
                'req_class' => $row['req_class'],
                'enable' => $id
            ];
        }
        return $data;
    }

    public function viewRequest($cn)
    {
        $sql = "SELECT
        ta.ID as id,
        sd.`CONTROL_NO`, sd.`SERVICE_DIMENTION`, sd.`RATING_SCALE`,
        csv.`OFFICE`,  csv.`SERVICE_PROVIDED`, 
        csv.`ACTION_OFFICER`,
        csv.`SURVEY_MODE`, 
        csv.`SD_ID`, 
        csv.`SUGGESTION`, 
        csv.`CLIENT`,
        csv.`CONTACT_NO`, 
        csv.`DATE_ACCOMPLISHED`,
        ta.`CONTROL_NO`, `REQ_DATE`, 
        `REQ_TIME`, `REQ_BY`, ta.`OFFICE`, 
        `POSITION`, ta.`CONTACT_NO`, `EMAIL_ADD`,
         `EQUIPMENT_TYPE`, `BRAND_MODEL`, `PROPERTY_NO`,
          `SERIAL_NO`, `IP_ADDRESS`, `MAC_ADDRESS`, `TYPE_REQ`,
           `TYPE_REQ_DESC`, `TEXT1`, `TEXT2`, `TEXT3`, `TEXT4`, `TEXT9`, 
           `TEXT5`, `TEXT6`, `TEXT7`, `TEXT8`, `ISSUE_PROBLEM`, `ASSIGN_DATE`, 
           `START_DATE`, `START_TIME`, `STATUS_DESC`, `COMPLETED_DATE`, `COMPLETED_TIME`, `DATE_RATED`, `ASSIST_BY`, `PERSON_ASSISTED`, `TIMELINESS`, `QUALITY`, `STATUS`, `STATUS_REQUEST`
        FROM `tbltechnical_assistance` ta
        LEFT JOIN tblservice_dimension sd on ta.CONTROL_NO = sd.CONTROL_NO
        LEFT JOIN tblcustomer_satisfaction_survey csv on ta.CONTROL_NO = csv.SD_ID
        WHERE ta.`CONTROL_NO` ='$cn'";
       


        $query = mysqli_query($this->conn, $sql);
        $data[] = '';
        while ($row = mysqli_fetch_assoc($query)) {
            $request_date = date('M d, Y', strtotime($row['REQ_DATE']));
            $request_time = date('g:i A', strtotime($row['REQ_TIME']));

            if ($row['START_DATE'] == '' || $row['START_DATE'] == null) {
                $started_date = '';
            } else {
                $started_date = date('M d, Y', strtotime($row['START_DATE']));
            }
            if ($row['START_TIME'] == '' || $row['START_TIME'] == null) {
                $started_time = '';
            } else {
                $started_time = date('g:i A', strtotime($row['START_TIME']));
            }
            if ($row['COMPLETED_DATE'] == '' || $row['COMPLETED_DATE'] == null) {
                $completed_date = '';
            } else {
                $completed_date = date('M d, Y', strtotime($row['COMPLETED_DATE']));
            }
            if ($row['COMPLETED_TIME'] == '' || $row['COMPLETED_TIME'] == null) {
                $completed_time = '';
            } else {
                $completed_time = date('g:i A', strtotime($row['COMPLETED_TIME']));
            }

            $data[] = [
                'control_no' => $row['CONTROL_NO'],
                'request_date' => $request_date,
                'request_time' => $request_time,
                'started_date' => $started_date,
                'started_time' => $started_time,
                'completed_date' => $completed_date,
                'completed_time' => $completed_time,
                'request_by' => ucwords(strtolower($row['REQ_BY'])),
                'office' => $row['OFFICE'],
                'position' => $row['POSITION'],
                'contact_details' => $row['CONTACT_NO'],
                'email_address' => $row['EMAIL_ADD'],
                'type_of_request' => $row['TYPE_REQ'],
                'subtype_request' => $row['TYPE_REQ_DESC'],
                'txt1' => $row['TEXT1'],
                'txt2' => $row['TEXT2'],
                'txt3' => $row['TEXT3'],
                'txt4' => $row['TEXT4'],
                'txt5' => $row['TEXT5'],
                'txt6' => $row['TEXT6'],
                'txt7' => $row['TEXT7'],

                'issue' => $row['ISSUE_PROBLEM'],
                'status_desc' => $row['STATUS_DESC'],
                'timeliness' => $row['TIMELINESS'],
                'quality' => $row['QUALITY'],
                'assisted_by' => ucwords(strtolower($row['ASSIST_BY'])),
                'equipment_type' => $row['EQUIPMENT_TYPE'],
                'brand_model' => $row['BRAND_MODEL'],
                'property_no' => $row['PROPERTY_NO'],
                'serial_no' => $row['SERIAL_NO'],
                'ip_address' => $row['IP_ADDRESS'],
                'mac_address' => $row['MAC_ADDRESS'],
                'status' => $row['STATUS'],
                'ict_comments' => $row['STATUS_DESC'],
                'status_request' => $row['STATUS_REQUEST'],
                'rating_scale' => $row['RATING_SCALE'],
                'service_dimension' => $row['SERVICE_DIMENTION'],
                'suggestion' => $row['SUGGESTION'],
            ];
        }

        return $data;
    }
    public function getCSS($cn)
    {
        $sql = "SELECT sd.SERVICE_DIMENTION as service_dimension,
                    sd.RATING_SCALE as rating_scale,
                    ta.CONTROL_NO,
                    csv.SUGGESTION as suggestion FROM `tblservice_dimension` sd
                    service_dimension
                LEFT JOIN tbltechnical_assistance ta on sd.CONTROL_NO = ta.CONTROL_NO 
                LEFT JOIN tblcustomer_satisfaction_survey csv on ta.CONTROL_NO = csv.SD_ID
                WHERE ta.`CONTROL_NO` = '$cn'";



        $query = mysqli_query($this->conn, $sql);
        $data[] = '';
        while ($row = mysqli_fetch_assoc($query)) {


            $data[] = [
                'service_dimension' => $row['service_dimension'],
                'rating_scale' => $row['rating_scale'],
                'suggestion' => $row['suggestion'],
                'control_no' => $row['CONTROL_NO']
            ];
        }
        return $data;
    }

    public function getSubRequest()
    {
        $sql = "SELECT ID,`TITLE` FROM `tbl_ta_subrequest` WHERE CLASS != ''";

        $query = mysqli_query($this->conn, $sql);
        $data[] = '';
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = [
                'type' =>  $row['TITLE'] . ","
            ];
        }
        return $data;
    }

    // RATE SERVICE
    public function showRateForm($control_no)
    {
        $sql = "SELECT ur.REQ_ID as enable,tr.ID AS id, ur.ID AS tr_id ,tr.title as title, ur.TITLE as request_type, ur.REQUEST_ID as req_id, ur.class as req_class 
        FROM `tbl_ta_typerequest` tr 
        LEFT JOIN tbl_ta_subrequest ur on tr.ID = ur.REQUEST_ID
        LEFT JOIN tbltechnical_assistance as ta on tr.TITLE = ta.TYPE_REQ
        where ta.CONTROL_NO = '$control_no'";

        $query = mysqli_query($this->conn, $sql);
        $data[] = '';
        if ($row = mysqli_fetch_assoc($query)) {
            if ($row['enable'] != '') {
                $id = $row['enable'];
            } else {
                $id = ' ';
            }


            $data[] = [
                'id' => $row['id'],
                'request_id' => $row['tr_id'],
                'title' => $row['title'],
                'request_type' => $row['request_type'],
                'req_id' => $row['req_id'],
                'req_class' => $row['req_class'],
                'enable' => $id,
                'is_check' => 'checked',
            ];
        }
        return $data;
    }

    public function countCN()
    {
        $sql = "SELECT count(*) as 'count' from tbltechnical_assistance  where REQ_DATE > '2021-06-15'";
        $query = mysqli_query($this->conn, $sql);
        $data= '';
        if ($row = mysqli_fetch_assoc($query)) {

            $count = $row['count'] + 1;
            $count_format = str_pad($count, 4, "0", STR_PAD_LEFT);
            $month = date('m');
            if ($count > 100) {
                $control_no = 'R4A-2021-' . $month . '-' . $count_format . '';
            }
            $data = $control_no;
            
        }
        return $data;
    }
    public function fetchTAinfo($control_no)
    {
        $sql = "SELECT * from tbltechnical_assistance where CONTROL_NO = '$control_no'";

        $query = mysqli_query($this->conn, $sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($query)) {
            $request_date = date('M d, Y', strtotime($row['REQ_DATE']));
            $request_time = date('g:i A', strtotime($row['REQ_TIME']));

            if ($row['START_DATE'] == '' || $row['START_DATE'] == null) {
                $started_date = '';
            } else {
                $started_date = date('M d, Y', strtotime($row['START_DATE']));
            }
            if ($row['START_TIME'] == '' || $row['START_TIME'] == null) {
                $started_time = '';
            } else {
                $started_time = date('g:i A', strtotime($row['START_TIME']));
            }
            if ($row['COMPLETED_DATE'] == '' || $row['COMPLETED_DATE'] == null) {
                $completed_date = '';
            } else {
                $completed_date = date('M d, Y', strtotime($row['COMPLETED_DATE']));
            }
            if ($row['COMPLETED_TIME'] == '' || $row['COMPLETED_TIME'] == null) {
                $completed_time = '';
            } else {
                $completed_time = date('g:i A', strtotime($row['COMPLETED_TIME']));
            }
            $type_of_service = $row['TYPE_REQ'].' ('.$row['TYPE_REQ_DESC'].')';
            $data = [
                'control_no' => $row['CONTROL_NO'],
                'request_date' => $request_date,
                'request_time' => $request_time,
                'started_date' => $started_date,
                'started_time' => $started_time,
                'completed_date' => $completed_date,
                'completed_time' => $completed_time,
                'request_by' => ucwords(strtolower($row['REQ_BY'])),
                'office' => $row['OFFICE'],
                'position' => $row['POSITION'],
                'contact_details' => $row['CONTACT_NO'],
                'email_address' => $row['EMAIL_ADD'],
                'type_of_request' => $row['TYPE_REQ'],
                'subtype_request' => $row['TYPE_REQ_DESC'],
                'txt1' => $row['TEXT1'],
                'txt2' => $row['TEXT2'],
                'txt3' => $row['TEXT3'],
                'txt4' => $row['TEXT4'],
                'txt5' => $row['TEXT5'],
                'txt6' => $row['TEXT6'],
                'txt7' => $row['TEXT7'],
                'service'=> $type_of_service,
                'issue' => $row['ISSUE_PROBLEM'],
                'status_desc' => $row['STATUS_DESC'],
                'timeliness' => $row['TIMELINESS'],
                'quality' => $row['QUALITY'],
                'assisted_by' => ucwords(strtolower($row['ASSIST_BY'])),
                'equipment_type' => $row['EQUIPMENT_TYPE'],
                'brand_model' => $row['BRAND_MODEL'],
                'property_no' => $row['PROPERTY_NO'],
                'serial_no' => $row['SERIAL_NO'],
                'ip_address' => $row['IP_ADDRESS'],
                'mac_address' => $row['MAC_ADDRESS'],
                'status' => $row['STATUS'],
                'ict_comments' => $row['STATUS_DESC'],
                'status_request' => $row['STATUS_REQUEST']
                // 'rating_scale' => $row['RATING_SCALE'],
                // 'service_dimension' => $row['SERVICE_DIMENTION'],
                // 'suggestion' => $row['SUGGESTION'],
            ];
        }

        return $data;
    }
    public function countRated()
    {
        $sql = "SELECT * FROM `ta_monitoring` WHERE `STATUS_REQUEST` LIKE '%RATED%' ";

        $query = mysqli_query($this->conn, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $data = [
                'count' => $row['COUNT']+1
            ];
        }
        return $data;
    }

    public function rateService($control_no, $service_dimension, $rating)
    {
        $sql = "INSERT INTO `tblservice_dimension`(`ID`,`CONTROL_NO`, `SERVICE_DIMENTION`, `RATING_SCALE`) VALUES (null,'$control_no','$service_dimension','$rating')";
        $result = mysqli_query($this->conn, $sql);

        return $result;
    }
    public function insertCSSDetails($control_no,$service,$office,$action_officer,$suggestion,$client,$contact_details,$completed_date)
    {
        $sql = "INSERT INTO `tblcustomer_satisfaction_survey` (`ID`, `OFFICE`, `SERVICE_PROVIDED`, `ACTION_OFFICER`, `SURVEY_MODE`,`SD_ID`, `SUGGESTION`, `CLIENT`, `CONTACT_NO`, `DATE_ACCOMPLISHED`) VALUES (null,'$office','$service','$action_officer','Electronics','$control_no','$suggestion','$client','$contact_details','$completed_date')";
        $result = mysqli_query($this->conn, $sql);

        return $result;
    }
    public function updateRequest($rated_date,$control_no)
    {
        $sql ="UPDATE `tbltechnical_assistance` SET `STATUS_REQUEST` = 'Rated', `DATE_RATED` = '$rated_date', `TIMELINESS` = 'YES', `QUALITY` = '5' WHERE `CONTROL_NO` = '$control_no'";
        $result = mysqli_query($this->conn, $sql);

        return $result;
    }
    public function updateMonitoring($count_rated)
    {

        $sql ="UPDATE `ta_monitoring` SET `COUNT` = '$count_rated' WHERE `ta_monitoring`.`ID` = 4";        
        $result = mysqli_query($this->conn, $sql);

        return $result;
    }

}
