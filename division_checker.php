<?php
function setDivision($office)
{
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
     if (in_array($office, $cavite)) {
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
    }else{
        $office = 'Procurement';
    }
    
    return $office;
}
  
?>