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
<h1>Quản lí thiết bị</h1>
<div class="mg">
    <form action="" method="GET">
    <input type="text" name="keyword" placeholder="Nhập từ khóa tìm kiếm"  value="<?php echo isset($_GET['keyword'])?$_GET['keyword']:''?>">
    <button type="submit" name="search" >Tìm kiếm</button>
    </form>
</div>
<table class="device-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên thiết bị</th>
            <th>Ngày mua</th>
            <th>Số tiền mua</th>
            <th>Thông tin thiết bị</th>
            <th>Loại thiết bị</th>
            <th>Ngày sử dụng</th>
            <th>Tình trạng</th>
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
        $sql="SELECT * FROM thietbi WHERE maThietBi LIKE '%$keyword%' OR tenThietBi LIKE '%$keyword%' OR
        ngayMua LIKE '%$keyword%' OR soTienMua LIKE '%$keyword%' OR thongTinThietBi LIKE '%$keyword%'
        OR loaiThietBi LIKE '%$keyword%' OR ngaySuDung LIKE '%$keyword%' OR tinhTrang LIKE '%$keyword%'
        LIMIT $start,$limit";
        else
        $sql="SELECT * FROM thietbi LIMIT $start,$limit"; 
        //$sql="SELECT * FROM thietbi LIMIT $start,$limit";
        $res=mysqli_query($conn,$sql);
        while($x = mysqli_fetch_assoc($res)):?>
            <tr>
            <td><?php echo $x['maThietBi']?></td>
            <td><?php echo $x['tenThietBi']?></td>
            <td><?php echo $x['ngayMua']?></td>
            <td><?php echo $x['soTienMua']?></td>
            <td><?php echo $x['thongTinThietBi']?></td>
            <td><?php echo $x['loaiThietBi']?></td>
            <td><?php echo $x['ngaySuDung']?></td>
            <td><?php echo $x['tinhTrang']?></td>
            <td><a class="update-button" href="update_device.php?maThietBi=<?php echo $x['maThietBi']?>&tenThietBi=<?php echo $x['tenThietBi']?>&ngayMua=<?php echo $x['ngayMua']?>&soTienMua=<?php echo $x['soTienMua']?>&thongTinThietBi=<?php echo $x['thongTinThietBi']?>&loaiThietBi=<?php echo $x['loaiThietBi']?>&ngaySuDung=<?php echo $x['ngaySuDung']?>&tinhTrang=<?php echo $x['tinhTrang']?>
">Sửa</a>
            <a class="delete-button" href="delete_device.php?maThietBi=<?php echo $x['maThietBi']; ?>" onclick=" return confirmDelete(<?php echo $x['maThietBi'];?>)" >Xóa</a>
            </td>
            </tr>
        <?php endwhile;?> 
    </tbody>
</table>
<?php 
        if(isset($_GET['search']) && $keyword!='')
        $sql="SELECT COUNT(*) AS sum FROM thietbi WHERE maThietBi LIKE '%$keyword%' OR tenThietBi LIKE '%$keyword%' OR
        ngayMua LIKE '%$keyword%' OR soTienMua LIKE '%$keyword%' OR thongTinThietBi LIKE '%$keyword%'
        OR loaiThietBi LIKE '%$keyword%' OR ngaySuDung LIKE '%$keyword%' OR tinhTrang LIKE '%$keyword%'";
        else
        $sql="SELECT COUNT(*) AS sum FROM thietbi"; 
        $tb=mysqli_query($conn, $sql);
        $sum= ceil(mysqli_fetch_assoc($tb)['sum']/$limit);
        for($i=1; $i<=$sum;$i++){
            echo "<a href='http://localhost/BTL_PHP/admin/m_thietbi.php?page=$i'>$i</a>";
        }
        ?>
<div class="action-buttons">
    <a href="add_device.php">Thêm thiết bị</a>
    <a href="index.php">Quay lại</a>
</div>
<script>
        // Hàm xác nhận xóa
        function confirmDelete(id) {
            var result = window.confirm("Bạn có chắc chắn muốn xóa thiết bị này?");
    if (result) {
        window.location.href = "delete_device.php?maThietBi=" + id;
    }
    return false;
        }
</script>
</body>
</html>