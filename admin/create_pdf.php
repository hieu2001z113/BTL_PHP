<?php
include_once 'check_log.php';
include_once 'db.php';
$sql= "SELECT*FROM nhanvien WHERE tenTaiKhoan='$_SESSION[user]' AND maChucVu='01'";
$res=mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($res);  
function removeAccents($string) {
    return Normalizer::normalize($string, Normalizer::FORM_D);
}
$patch = __DIR__;
require_once($patch.'\lb\TCPDF-main\tcpdf.php');
// Tạo một đối tượng TCPDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

// Thiết lập thông tin tài liệu
$pdf->SetCreator('Your Company');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Sample Report using TCPDF');
$pdf->SetSubject('Sample Report');
$pdf->SetKeywords('TCPDF, sample, report');

// Thiết lập các thông số về phông chữ và kích thước
$pdf->SetFont('helvetica', '', 12);
$pdf->SetMargins(15, 15, 15);
$pdf->SetAutoPageBreak(true, 15);
// Tạo một trang mới
$pdf->AddPage();

// Thêm nội dung vào trang
$pdf->SetFont('helvetica', 'B', 14);
$pdf->Cell(0, 20, 'Sample Form', 0, 1, 'C');

$pdf->SetFont('helvetica', '', 12);
$pdf->SetXY(20, 40);
$pdf->Cell(40, 10, 'Họ và tên:', 0, 0, 'L');
$pdf->Cell(80, 10, '', 1, 0, 'L');

$pdf->SetXY(20, 55);
$pdf->Cell(40, 10, 'Phone:', 0, 0, 'L');
$pdf->Cell(80, 10, $row['soDienThoai'], 1, 0, 'L');

$pdf->SetXY(20, 70);
$pdf->Cell(40, 10, 'Address:', 0, 0, 'L');
$pdf->MultiCell(80, 10, '123 Main Street', 1, 'L');


// Lưu tệp PDF
$pdf->Output('sample_report.pdf', 'I');
?>
