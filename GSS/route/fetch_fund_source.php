
    <?php


    $pmo = $_POST['pmo'];
    $result = fetchFundSource($pmo);
echo $result;
    function fetchFundSource($pmo)
    {
        $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
        $data = [];

        $cavite = ['20', '34', '35', '36', '45'];
        $laguna = ['21', '40', '41', '42', '47', '51', '52'];
        $batangas = ['19', '28', '29', '30', '44'];
        $rizal = ['23', '37', '38', '39', '46', '50'];
        $quezon = ['22', '31', '32', '33', '48', '49', '53'];
        $lucena_city = ['24'];

        if (in_array($pmo, $cavite)) {
            $pmo = '1';
        } else if (in_array($pmo, $laguna)) {
            $pmo = '2';
        } else if (in_array($pmo, $batangas)) {
            $pmo = '3';
        } else if (in_array($pmo, $rizal)) {
            $pmo = '4';
        } else if (in_array($pmo, $quezon)) {
            $pmo = '5';
        } else if (in_array($pmo, $lucena_city)) {
            $pmo = '6';
        }

        $sql = "SELECT
                `id`,
                `status`,
                `remarks`,
                `lddap`,
                `disbursed_amount`,
                `balance`,
                `fundsource_amount`,
                `province`
            FROM
                `tbl_payment`
            where province = '$pmo'";
        $query = mysqli_query($conn, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $data[]= [
                'status'       => $row['status'],
                'lddap'       => $row['lddap'],
                'fundsource_amount'       => $row['fundsource_amount'],
            ];
        }
        return json_encode($data);
    }
