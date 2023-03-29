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

    public function getDateCompleted($id)
    {
        $sql = "SELECT  COMPLETED_DATE, COMPLETED_TIME from tbltechnical_assistance where ID = '$id'";
        $query = $this->conn->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $data = [
                'date_released' => date('y-m-d h:i:s', strtotime($row['COMPLETED_DATE'] . '' . $row['COMPLETED_TIME'])),
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
        ta.ID AS id,
           CONTROL_NO,
        emp.LAST_M,
        emp.FIRST_M,
        emp.MIDDLE_M,
        `REQ_DATE`,
        `REQ_TIME`,
        `REQ_BY`,
        ta.`OFFICE`,
        `POSITION`,
        ta.`CONTACT_NO`,
        `EMAIL_ADD`,
        `EQUIPMENT_TYPE`,
        `BRAND_MODEL`,
        `PROPERTY_NO`,
        `SERIAL_NO`,
        `IP_ADDRESS`,
        `MAC_ADDRESS`,
        `TYPE_REQ`,
        `TYPE_REQ_DESC`,
        `TEXT1`,
        `TEXT2`,
        `TEXT3`,
        `TEXT4`,
        `TEXT9`,
        `TEXT5`,
        `TEXT6`,
        `TEXT7`,
        `TEXT8`,
        `ISSUE_PROBLEM`,
        `ASSIGN_DATE`,
        `START_DATE`,
        `START_TIME`,
        `STATUS_DESC`,
        `COMPLETED_DATE`,
        `COMPLETED_TIME`,
        `DATE_RATED`,
        `ASSIST_BY`,
        `PERSON_ASSISTED`,
        `TIMELINESS`,
        `QUALITY`,
        ta.`STATUS`,
        `STATUS_REQUEST`
    FROM
        `tbltechnical_assistance` ta
    LEFT JOIN tblemployeeinfo emp ON
        ta.REQ_BY = emp.EMP_N
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
                'request_by' => ucwords(strtolower($row['FIRST_M'].' '.$row['LAST_M'])),
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
                // 'suggestion' => $row['SUGGESTION'],
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
        $sql = "SELECT count(*) as 'count' from tbltechnical_assistance  where REQ_DATE > '2022-12-25'";
        $query = mysqli_query($this->conn, $sql);
        $data = [];
        if ($row = mysqli_fetch_assoc($query)) {

            $count = $row['count'] + 1;
            $count_format = str_pad($count, 4, "0", STR_PAD_LEFT);
            $month = date('m');
            if ($count > 100) {
                $control_no = 'R4A-2023-' . $month . '-' . $count_format . '';
            } else {
                $control_no = 'R4A-2023-' . $month . '-' . $count_format . '';
            }
            $data = [
                'control_no' => $control_no
            ];
        }
   
        return $data;
    }

    public function addFlash($type, $message, $title)
    {
        $data = [
            'type'        => $type, // or 'success' or 'info' or 'warning'
            'title'     => $title,
            'message'    => $message
        ];

        return $data;
    }
    public function fetchTAinfo($control_no)
    {
        $sql = "SELECT * from tbltechnical_assistance ta LEFT JOIN tblemployeeinfo emp on emp.EMP_N = ta.REQ_BY where CONTROL_NO = '$control_no'";

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
            $type_of_service = $row['TYPE_REQ'] . ' (' . $row['TYPE_REQ_DESC'] . ')';
            $data = [
                'control_no' => $row['CONTROL_NO'],
                'request_date' => $request_date,
                'request_time' => $request_time,
                'started_date' => $started_date,
                'started_time' => $started_time,
                'completed_date' => $completed_date,
                'completed_time' => $completed_time,
                'request_by' => ucwords(strtolower($row['FIRST_M'].' '.$row['LAST_M'])),
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
                'service' => $type_of_service,
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
    public function fetchCSSQuestionaire()
    {
        $sql = "SELECT * from tblcss_questionaire";

        $query = mysqli_query($this->conn, $sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = [
                'id' => $row['ID'],
                'checklist' => $row['QUESTIONAIRE']
            ];
        }
        return $data;
    }
    public function fetchRespondentPerClientType($covered_period)
    {
        $sql = "SELECT ID,CLIENT_TYPE, count(`CLIENT_TYPE`) as 'count_per_clientType'
        from tbl_css_client_info
        WHERE month(DATE_CREATED) = '$covered_period'
        GROUP by CLIENT_TYPE;
        ";
        // ECHO $sql;
        $query = mysqli_query($this->conn, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $data[$row['ID']] = [
                'client_type' => $row['count_per_clientType']
            ];
        }
        return $data;
    }
    public function fetchRespondentPerGender($covered_period)
    {
        $sql = "SELECT ID,GENDER, count(`GENDER`) as 'count_gender'
        from tbl_css_client_info
        WHERE month(DATE_CREATED) = '$covered_period'
        GROUP by GENDER
        ORDER BY ID
        ";

        $query = mysqli_query($this->conn, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = [
                'client_gender' => $row['count_gender']
            ];
        }

        return $data;
    }
    public function fetchRespondentPerAge($covered_period)
    {
        $sql = "SELECT ID,AGE, count(`AGE`) as 'count_age'
        from tbl_css_client_info
        WHERE month(DATE_CREATED) = '$covered_period'
        GROUP by AGE
        ORDER BY ID
        ";

        $query = mysqli_query($this->conn, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = [
                'client_age' => $row['count_age']
            ];
        }
        return $data;
    }
    public function fetchClientInfo($control_no)
    {
        $sql = "SELECT emp.EMP_N,emp.MOBILEPHONE,emp.EMAIL,emp.LAST_M, emp.FIRST_M,emp.MIDDLE_M from tblemployeeinfo emp
                LEFT JOIN tbltechnical_assistance ta on emp.EMP_N = ta.REQ_BY
                WHERE ta.ID = '$control_no'";
       

        $query = mysqli_query($this->conn, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $data = [
                'emp_n' => $row['EMP_N'],
                'email' => $row['EMAIL'],
                'mobile' => $row['MOBILEPHONE'],
                'client' => $row['FIRST_M'].' '.$row['LAST_M']
            ];
        }
        return $data;
    }
    public function fetchCitizenClientQuestion($covered_period)
    {
        $cc = ['CC1', 'CC2', 'CC3'];
        $data = [];
        foreach ($cc as $item) {
            $sql = "SELECT EMP_ID, $item, COUNT('$item') AS '$item' FROM tbl_css_cliententry WHERE MONTH(DATE_RELEASED) = '$covered_period' GROUP BY $item";
            $query = mysqli_query($this->conn, $sql);
            while ($row = mysqli_fetch_assoc($query)) {
                $data[] = [
                    'count_cc_entry' => $row[$item]
                ];
            }
        }

        return $data;
    }
    public function fetchServiceDimensionReport($covered_period)
    {
        $sd = ['SQD0', 'SQD1', 'SQD3','SQD4','SQD5','SQD6','SQD7','SQD8'];
        $data = [];
        foreach ($sd as $item) {
            $sql = "SELECT $item, count($item) as 'count' FROM `tbl_css_cliententry` where $item IN (5,4,3,2,1) GROUP BY $item";
        
            $query = mysqli_query($this->conn, $sql);
            while ($row = mysqli_fetch_assoc($query)) {
                $data[] = [
                    'count_sd_entry' => $row['count']
                ];
            }
        }
        return $data; 
    }
    public function fetchTotalRespondents($covered_period)
    {
            $sql = "SELECT count(*) as 'total_respondents' from tbl_css_cliententry where MONTH(`DATE_RELEASED`)  = '$covered_period'";
            $query = mysqli_query($this->conn, $sql);
            $data = [];
            while ($row = mysqli_fetch_assoc($query)) {
                $data = [
                    'total_respondents' => $row['total_respondents']
                ];
            }
        
        return $data; 
    }

    public function fetchNoOfDesireRespondents($covered_period)
    {
        $sql = "SELECT
        COUNT(*) as 'total_desire_repondent'
        FROM
            `tbl_css_cliententry`
        where
        MONTH(`DATE_RELEASED`)  = '$covered_period' AND 
            (`SQD0`, `SQD1`, `SQD2`, `SQD3`,`SQD4`,`SQD5`,`SQD6`,`SQD7`,`SQD8`) = (5, 5, 5, 5,5, 5, 5,5,5)";
            $query = mysqli_query($this->conn, $sql);
            $data = [];
            while ($row = mysqli_fetch_assoc($query)) {
                $data = [
                    'total_desire_repondent' => $row['total_desire_repondent']
                ];
            }
        
        return $data; 
    }
   
    public function fetchClientChecklist($month)
    {
        $sql = "SELECT
        ce.ID AS 'id',
        emp.FIRST_M as 'first_name',
        emp.LAST_M as 'last_name',
        emp.EMAIL as 'email',
        emp.MOBILEPHONE as 'contact_details',
        ci.AGE as 'age',
        ci.GENDER as 'gender',
        ci.CLIENT_TYPE as 'client_type',
        ce.CC1 as 'cc1',
        ce.CC2 as 'cc2',
        ce.CC3 as 'cc3',
        ce.SQD0 as 'sqd0',
        ce.SQD1 as 'sqd1',
        ce.SQD2 as 'sqd2',
        ce.SQD3 as 'sqd3',
        ce.SQD4 as 'sqd4',
        ce.SQD5 as 'sqd5',
        ce.SQD6 as 'sqd6',
        ce.SQD7 as 'sqd7',
        ce.SQD8 as 'sqd8',
        ce.DATE_RELEASED as 'date_release',
        ce.DATE_RECEIVED as 'date_received'
    FROM
        `tbl_css_cliententry`ce
    LEFT JOIN tblemployeeinfo emp on ce.EMP_ID = emp.EMP_N 
    LEFT JOIN tbl_css_client_info ci on ci.EMP_ID = ce.EMP_ID
    where MONTH(ce.DATE_RELEASED) = '$month'
    GROUP BY ce.ID";

        $query = mysqli_query($this->conn, $sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($query)) {
            $client_type = ['Citizen', 'Business', 'Government (Employee or from other agency)'];

            // print_r($client_type[$row['client_type']]);
            // if(in_array($row['client_type'],$client_type))
            $data[$row['id']] = [
                'client_name'          => $row['first_name'] . " " . $row['last_name'],
                'email_address' => $row['email'],
                'age'           => $row['age'],
                'gender'        => $row['gender'],
                'contact_details' => $row['contact_details'],
                'client_type'   => $row['client_type'],
                'cc1'           => $row['cc1'],
                'cc2'           => $row['cc2'],
                'cc3'           => $row['cc3'],
                'sqd0'          => $row['sqd0'],
                'sqd1'          => $row['sqd1'],
                'sqd2'          => $row['sqd2'],
                'sqd3'          => $row['sqd3'],
                'sqd4'          => $row['sqd4'],
                'sqd5'          => $row['sqd5'],
                'sqd6'          => $row['sqd6'],
                'sqd7'          => $row['sqd7'],
                'sqd8'          => $row['sqd8'],
                'date_released' => date('Y/md', strtotime($row['date_release'])),
                'date_received' => date('Y/m/d', strtotime($row['date_received'])),
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
                'count' => $row['COUNT'] + 1
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
    public function insertCSSDetails($control_no, $service, $office, $action_officer, $suggestion, $client, $contact_details, $completed_date)
    {
        $sql = "INSERT INTO `tblcustomer_satisfaction_survey` (`ID`, `OFFICE`, `SERVICE_PROVIDED`, `ACTION_OFFICER`, `SURVEY_MODE`,`SD_ID`, `SUGGESTION`, `CLIENT`, `CONTACT_NO`, `DATE_ACCOMPLISHED`) VALUES (null,'$office','$service','$action_officer','Electronics','$control_no','$suggestion','$client','$contact_details','$completed_date')";
        $result = mysqli_query($this->conn, $sql);

        return $result;
    }
    public function updateRequest($rated_date, $control_no)
    {
        $sql = "UPDATE `tbltechnical_assistance` SET `STATUS` = 'Rated', `DATE_RATED` = '$rated_date', `TIMELINESS` = 'YES', `QUALITY` = '5' WHERE `CONTROL_NO` = '$control_no'";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
    public function updateMonitoring($count_rated)
    {

        $sql = "UPDATE `ta_monitoring` SET `COUNT` = '$count_rated' WHERE `ta_monitoring`.`ID` = 4";
        $result = mysqli_query($this->conn, $sql);

        return $result;
    }


    //CRUD
    public function select($table, $rows = "*", $where = null)
    {

        if ($where != null) {
            $sql = "SELECT $rows FROM $table WHERE $where";
        } else {
            $sql = "SELECT $rows FROM $table";
        }
        // echo $sql;
        $this->sql = $result = $this->conn->query($sql);
    }

    public function update($table, $para = array(), $id)
    {
        $args = array();

        foreach ($para as $key => $value) {
            $args[] = "$key = '$value'";
        }

        $sql = "UPDATE  $table SET " . implode(',', $args);

        $sql .= " WHERE $id";
        // echo $sql;
        $this->conn->query($sql);
    }
    public function delete($table, $id)
    {
        $sql = "DELETE FROM $table";
        $sql .= " WHERE $id ";
        $this->conn->query($sql);
    }

    public function insert($table, $para = array())
    {
        $table_columns = implode(',', array_keys($para));
        $table_value = implode("','", $para);

        $sql = "INSERT INTO $table($table_columns) VALUES('$table_value')";
        // echo $sql;

        $this->conn->query($sql);
    }
}
