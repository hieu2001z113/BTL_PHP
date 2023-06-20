<?php 
include_once 'check_log.php';
include_once 'db.php';
$maNhanVien = $_GET['maNhanVien'];
$sql="DELETE FROM nhanvien WHERE maNhanVien='$maNhanVien'";
if(mysqli_query($conn,$sql))
    echo "Xóa thành công. Trở lại trang quản lí sau 3s...";
else
    echo "Xóa thất bại. Trở lại trang quản lí sau 3s...";
header("refresh:3; url=m_nguoidung.php");
$conn->close();
exit;
?>