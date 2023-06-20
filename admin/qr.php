<?php
// Số tiền cần thanh toán
$amount = 100.50;

// Chuỗi dữ liệu chứa số tiền
$data = "Amount: " . $amount;

// Tạo URL mã QR dựa trên chuỗi dữ liệu
$qrUrl = "https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=" . urlencode($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Thanh toán QR</title>
</head>
<body>
    <h1>Thanh toán QR</h1>
    <p>Số tiền: <?php echo $amount; ?></p>
    <img src="<?php echo $qrUrl; ?>" alt="Mã QR">
</body>
</html>
