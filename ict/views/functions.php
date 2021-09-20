<?php
function splitName($name)
{
    $names = explode(' ', $name);
    $lastname = $names[count($names) - 1];
    unset($names[count($names) - 1]);
    $firstname = join(' ', $names);
    return $firstname . ' ' . $lastname;
}
function setSubRequest2($category)
{
    $arr_elements = 
    [
    "25"=> "req_type_subcategory25", //Wired
    "26"=> "req_type_subcategory26",//Wireless
    "28"=> "req_type_subcategory28",//Wired
    "29"=> "req_type_subcategory29"//Wireless
    ];
    if(array_key_exists($category,$arr_elements)){
        return $arr_elements[$category];
     }
}
function setSubRequest($category)
{
    $arr_elements = 
    [
        "1" => "req_type_subcategory1",
        "2" => "req_type_subcategory2",
        "3" => "req_type_subcategory3",
        "4" => "req_type_subcategory4",
        "5" => "req_type_subcategory5",

        "6" => "req_type_subcategory6",
        "7" => "req_type_subcategory7",
        "8" => "req_type_subcategory8",
        "9" => "req_type_subcategory9",

      
        "10" => "req_type_subcategory10",
        "11" => "req_type_subcategory11",
        "12" => "req_type_subcategory12",

        "13"=> "req_type_subcategory13",
        "15"=> "req_type_subcategory15",
        "16"=> "req_type_subcategory16",
        "17"=> "req_type_subcategory17",
        "18"=> "req_type_subcategory18",

        "20"=> "req_type_subcategory20",
        "21"=> "req_type_subcategory21",

        "22"=> "req_type_subcategory22",
        "23"=> "req_type_subcategory23",

        "24"=> "req_type_subcategory24",
        "26"=> "req_type_subcategory26",
        "27"=> "req_type_subcategory27",
        "30"=> "req_type_subcategory30"

    ];
    if(array_key_exists($category,$arr_elements)){
       return $arr_elements[$category];
    }
}

function setTypeRequest($type)
{
    $arr_elements = 
    [
        
        "DESKTOP/LAPTOP REPAIR" => "req_type_category1",
        "HARDWARE INSTALLATION" => "req_type_category2",
        "PRINTER/SCANNER/COPIER" => "req_type_category3",
        "APPLICATION/SOFTWARE/SYSTEM ASSISTANCE" => "req_type_category4",
        "GOVMAIL ASSISTANCE" => "req_type_category5",
        "IP TELEPHONY" => "req_type_category6",
        "INTERNET CONNECTIVITY" => "req_type_category7",
        "POSTING/UPDATING OF INFORMATION IN THE DILG WEBSITE" => "req_type_category8",
        "GOVMAIL_ASSISTANCE" => "req_type_category9",
        "OTHERS (please specify)" => "req_type_category10",
    ];
    if(array_key_exists($type,$arr_elements)){
       return $arr_elements[$type];
    }
}



?>