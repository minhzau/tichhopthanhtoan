<?php
require_once("./config.php");
$inputData = array();

foreach ($_GET as $key => $value) {
    if (substr($key, 0, 4) == "vnp_") {
        $inputData[$key] = $value;
    }
}

// Xây dựng mảng JSON chứa thông tin cần trả về
$responseData = array(
    'vnp_TxnRef' => $inputData['vnp_TxnRef'],
    'vnp_Amount' => $inputData['vnp_Amount'],
    'vnp_OrderInfo' => $inputData['vnp_OrderInfo'],
    'vnp_ResponseCode' => $inputData['vnp_ResponseCode'],
    'vnp_TransactionNo' => $inputData['vnp_TransactionNo'],
    'vnp_BankCode' => $inputData['vnp_BankCode'],
    'vnp_PayDate' => $inputData['vnp_PayDate']
);

// Chuyển mảng JSON thành chuỗi JSON
$responseJson = json_encode($responseData);

// Lưu chuỗi JSON vào tệp
file_put_contents('C:\xampp\htdocs\vnpay_php\response.json', $responseJson);


// In JSON trả về (không cần in nếu bạn muốn chỉ ghi vào tệp)
echo $responseJson;
