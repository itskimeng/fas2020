<?php
date_default_timezone_set('Asia/Manila');
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");


if (isset($_POST['submit'])) {
    $po_no = $_POST['po_no'];
    $supplier = $_POST['supplier'];
    $purpose = $_POST['purpose'];
    $amount = $_POST['amount'];
    $address = $_POST['address'];
    $burs = $_POST['burs'];
    $pmo_id = 5;


    $office = "DILG IV-A";

    if ($burs == '2') {

        $sql = "INSERT INTO saroobburs (datereceived,datereprocessed,datereturned,datereleased,burs,ponum,payee,particular,saronumber,ppa,uacs,amount,remarks,sarogroup,status,IS_GSS) 
            VALUES (NULL,NULL,NULL,NULL,NULL,'$po_no','$supplier','$purpose]',NULL,NULL,NULL,'$amount',NULL,NULL,'Pending', 'FROM GSS')";
      
        if (!mysqli_query($conn, $sql)) {
            die('Error: ' . mysqli_error($conn));
            // Print "Error";
        }

        $insert = mysqli_query($conn, "INSERT INTO burs(po_no,supplier,purpose,amount,address,office,doc_type) VALUES('$po_no','$supplier','$purpose','$amount','$address','$pmo_id','$burs')");
        if ($insert) {

            echo ("<SCRIPT LANGUAGE='JavaScript'>   
                window.alert('Successfuly Saved!')
                window.location.href = '../ViewPO.php?rfq_id=$rfq_id&supplier_id=$supplier_id';
                </SCRIPT>");
        } else {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
              window.alert('Error Occured in Saving');
              </SCRIPT>");
        }
    } else if ($burs == '1') {
        $sql = "INSERT INTO saroob (datereceived,datereprocessed,datereturned,datereleased,ors,ponum,payee,particular,saronumber,ppa,uacs,amount,remarks,sarogroup,status,IS_GSS) 
        VALUES (NULL,NULL,NULL,NULL,NULL,'$po_no','$supplier','$purpose',NULL,NULL,NULL,'$amount',NULL,NULL,'Pending', 'FROM GSS')";
        if (!mysqli_query($conn, $sql)) {
            die('Error: ' . mysqli_error($conn));
        }

        $insert = mysqli_query($conn, "INSERT INTO burs(po_no,supplier,purpose,amount,address,office,doc_type) VALUES('$po_no','$supplier','$purpose','$amount','$address','$pmo_id','$burs')");
        if ($insert) {

            echo ("<SCRIPT LANGUAGE='JavaScript'>   
            window.alert('Successfuly Saved!')
            window.location.href = '../ViewPO.php?rfq_id=$rfq_id&supplier_id=$supplier_id';
            </SCRIPT>");
        } else {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Error Occured in Saving');
          </SCRIPT>");
        }
    }
}
