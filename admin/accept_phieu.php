<?php 
include_once 'check_log.php';
if(isset($_GET['maPhieuYeuCauMua']))
{
    include_once 'db.php';
    if($_GET['xacNhan']==0){
        $sql="UPDATE phieuyeucaumuatb SET xacNhan='1' WHERE maPhieuYeuCauMua = '{$_GET['maPhieuYeuCauMua']}'";
        if(mysqli_query($conn,$sql))
            echo "Xác nhận thành công...chuyển hướng sang trang quản lí sau 3s";
    }
    else{
        $sql="UPDATE phieuyeucaumuatb SET xacNhan='0' WHERE maPhieuYeuCauMua = '{$_GET['maPhieuYeuCauMua']}'";
        if(mysqli_query($conn,$sql))
            echo "Hủy xác nhận thành công...chuyển hướng sang trang quản lí sau 3s";
    }
    
    header("refresh:3; url=m_phieu.php");
    exit;
}
?>