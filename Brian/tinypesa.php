<?php
if(isset($_POST['pay'])){

    $amount = $_POST['amount']; //Amount to transact
$phonenuber = $_POST['phonenuber']; // Phone number paying start with 07
$Account_no = 'UMESKIA SOFTWARES'; // Enter account number optional
$url = 'https://tinypesa.com/api/v1/express/initialize';
$data = array(
    'amount' => $amount,
    'msisdn' => $phonenuber,
    'account_no' => $Account_no
);
$headers = array(
    'Content-Type: application/x-www-form-urlencoded',
    'ApiKey: nmwYS9WVtjD' // Replace with your api key
);
$info = http_build_query($data);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $info);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
$resp = curl_exec($curl);
if ($resp === false) {
    echo "CURL ERROR: " . curl_error($curl);
}
$msg_resp = json_decode($resp);

if ($msg_resp->success == 'true') {
    echo "<script>alert('WAIT FOR TINYPESA STK POP UP')</script>";
   
}
}
?>
