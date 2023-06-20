<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    /* CSS cho phần bảng */
    .device-table {
        width: 100%;
        border-collapse: collapse;
    }

    .device-table th,
    .device-table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .device-table th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .device-table tr:hover {
        background-color: #f9f9f9;
    }

    /* CSS cho các nút chức năng */
    .action-buttons {
        margin-top: 20px;
        justify-content: space-between;
        align-items: center;
    }

    .action-buttons a {
        color: #fff;
        background-color: #007bff;
        border: none;
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
        cursor: pointer;
    }

    .action-buttons a:hover {
        background-color: #0056b3;
    }

    .action-buttons a.delete-button {
        background-color: #dc3545;
    }

    .action-buttons a.delete-button:hover {
        background-color: #a71d2a;
    }
    .custom-button {
        display: inline-block;
        padding: 8px 16px;
        font-size: 14px;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        color: #fff;
        background-color: #007bff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .delete-button {
        display: inline-block;
        padding: 8px 16px;
        font-size: 14px;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        color: #fff;
        background-color: #cc3333;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }    
    .update-button {
        display: inline-block;
        padding: 8px 16px;
        font-size: 14px;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        color: #fff;
        background-color: green;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .custom-button:hover {
        background-color: #0056b3;
    }
    .update-button:hover{
        background-color: #336633;
        
    }
    .delete-button:hover{
        background-color: #802d2d;
    }
    a {
  display: inline-block;
  padding: 5px 5px;
  text-decoration: none;
  background-color: #4CAF50;
  color: #fff;
  border-radius: 5px;
  margin-top: 2px;
}

a:hover {
  background-color: #45a049;
}
form {
  display: flex;
  align-items: center;
}

input[type="text"] {
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin-right: 5px;
}

button[type="submit"] {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #45a049;
}
.mg{
    margin-bottom: 10px;
}
</style>
<?php
include_once 'check_log.php';
include_once 'db.php';
?>
</head>
<body>
<h1>Quản lí phiếu yêu cầu mua mới thiết bị</h1>
<div class="mg">
    <form action="" method="GET">
    <input type="text" name="keyword" placeholder="Nhập từ khóa tìm kiếm" value="<?php echo isset($_GET['keyword'])?$_GET['keyword']:''?>">
    <button type="submit" name="search" >Tìm kiếm</button>
    </form>
</div>
<table class="device-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Người viết</th>
            <th>Phòng ban</th>
            <th>Yêu cầu</th>
            <th>Lý do</th>
            <th>Thời điểm tạo phiếu</th>
            <th>Xác nhận</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $limit=3;
        $page=isset($_GET['page'])?$_GET['page']:1;
        $start= ($page-1)*$limit;
        $keyword= isset($_GET['search'])?$_GET['keyword']:"";
        if(isset($_GET['search']) && $keyword!='')
        $sql="SELECT * FROM phieuyeucaumuatb JOIN nhanvien ON phieuyeucaumuatb.nguoiViet =nhanvien.maNhanVien JOIN phongban
        ON phongban.maTruongPhong = nhanvien.maNhanVien AND (maPhieuYeuCauMua LIKE '%$keyword%' OR hoTen LIKE '%$keyword%')
        LIMIT $start,$limit";
        else
        $sql="SELECT * FROM phieuyeucaumuatb JOIN nhanvien ON phieuyeucaumuatb.nguoiViet =nhanvien.maNhanVien JOIN phongban
        ON phongban.maTruongPhong = nhanvien.maNhanVien
        LIMIT $start,$limit";
        $res=mysqli_query($conn,$sql);
        while($x = mysqli_fetch_assoc($res)):?>
            <tr>
            <td><?php echo $x['maPhieuYeuCauMua']?></td>
            <td><?php echo $x['hoTen']?></td>
            <td><?php echo $x['tenPhongBan']?></td>
            <td><?php echo $x['yeuCau']?></td>
            <td><?php echo $x['lyDo']?></td>
            <td><?php echo $x['thoiDiemTaoPhieu']?></td>
            <td><?php echo $x['xacNhan']==1?"Đã xác nhận":"Chưa xác nhận"?></td>
            <td>
            <?php echo $x['xacNhan']==0?"<a class='update-button' href='accept_phieu.php?maPhieuYeuCauMua=$x[maPhieuYeuCauMua]&xacNhan=0'>Xác nhận</a>":"<a class='delete-button' href='accept_phieu.php?maPhieuYeuCauMua=$x[maPhieuYeuCauMua]&xacNhan=1'>Hủy xác nhận</a>"?>
            </td>
            </tr>
        <?php endwhile;?> 
    </tbody>
</table>
<?php 
        if(isset($_GET['search']) && $keyword!='')
        $sql="SELECT COUNT(*) AS sum  FROM phieuyeucaumuatb JOIN nhanvien ON phieuyeucaumuatb.nguoiViet =nhanvien.maNhanVien JOIN phongban
        ON phongban.maTruongPhong = nhanvien.maNhanVien AND (maPhieuYeuCauMua LIKE '%$keyword%' OR hoTen LIKE '%$keyword%')";
        else
        $sql="SELECT COUNT(*) AS sum  FROM phieuyeucaumuatb JOIN nhanvien ON phieuyeucaumuatb.nguoiViet =nhanvien.maNhanVien JOIN phongban";
        $tb=mysqli_query($conn, $sql);
        $sum= ceil(mysqli_fetch_assoc($tb)['sum']/$limit);
        for($i=1; $i<=$sum;$i++){
            echo "<a href='http://localhost/BTL_PHP/admin/m_phieu.php?search=&keyword=$keyword&page=$i'>$i</a>";
        }
        ?>
<div class="action-buttons">
    <a href="add_phieu.php">Thêm phiếu mua mới</a>
    <a href="index.php">Quay lại</a>
</div>
</body>
</html>