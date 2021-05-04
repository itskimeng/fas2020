<?php
session_start();
date_default_timezone_set('Asia/Manila');
    
    $certificate_type = $_POST['certificate_type'];
    $attendees[] = $_POST['attendee'];
    $activity_title = $_POST['activity_title'];
    $activity_date = $_POST['activity_date'];
    $activity_venue = $_POST['activity_venue'];
    $date_given = $_POST['date_given'];

    // if ($_FILES['uploadfile']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['uploadfile']['tmp_name'])) { 
    //     $attendee = file_get_contents($_FILES['uploadfile']['tmp_name']); 
    //     $attendees = explode(',', $attendee);
    // }

    $activity_date = explode('-', $activity_date);
    $date_from = $activity_date[0];
    $date_to = $activity_date[1];

    $date_from = new DateTime($activity_date[0]);
    $date_to = new DateTime($activity_date[1]);
    $date_given = new DateTime($date_given);

    if ($date_from->format('Y-m') === $date_to->format('Y-m')) {
        $dates = $date_from->format('F d ') .' and '. $date_to->format('d, Y'); 
    } else {
        $dates = $date_from->format('F d, Y') .' and '. $date_to->format('F d, Y');
    }


    $date_from = $date_from->format('F d, Y');
    $date_to = $date_to->format('F d, Y');
    $date_given_day = $date_given->format('jS');
    $date_given_my = $date_given->format('F Y');


    $cert_type = 'CERTIFICATE OF PARTICIPATION';

    $_SESSION['certificate'] = [
        'certificate_type' => 'CERTIFICATE OF PARTICIPATION',
        'activity_title' => $activity_title,
        'attendees' => $attendees,
        'given_date_day' => $date_given_day,
        'given_date_my' => $date_given_my,
        'activity_venue' => $activity_venue,
        'dates' => $dates
    ]; 
