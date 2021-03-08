<?php

class FlashMessage
{
    
    function generateNew($message="", $type="success") {
        $notification = [];

        $notification = [
            'message' => $message,
            'type' => $type,
            'icon' => $type == 'ban' ? 'ban' : 'check',
            'header' => $type == 'ban' ? 'Error' : 'Success'
        ];

        $_SESSION['alert'] = $notification;

        return 0;
    }   
}