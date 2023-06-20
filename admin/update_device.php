<style>
  /* CSS cho form */
  .update-form {
    width: 300px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  /* CSS cho nhãn */
  .update-form label {
    display: block;
    margin-bottom: 5px;
  }

  /* CSS cho các trường nhập liệu */
  .update-form input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  /* CSS cho nút submit */
  .update-form input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  a{
    text-decoration: none;
    background-color: red;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 13.333px;
    margin-left: 10px;
    font-family: Arial, sans-serif;
  }
</style>
<?php 
    include_once 'check_log.php';
    $maThietBi= $_GET['maThietBi'];
    $tenThietBi= $_GET['tenThietBi'];
    $ngayMua= $_GET['ngayMua'];
    $soTienMua= $_GET['soTienMua'];
    $thongTinThietBi= $_GET['thongTinThietBi'];
    $loaiThietBi= $_GET['loaiThietBi'];
    $ngaySuDung= $_GET['ngaySuDung'];
    $tinhTrang= $_GET['tinhTrang'];
?>
  <?php
  include_once 'db.php';
  if(isset($_GET['save'])){
    $maThietBi= $_GET['maThietBi'];
    $tenThietBi= $_GET['tenThietBi'];
    $ngayMua= $_GET['ngayMua'];
    $soTienMua= $_GET['soTienMua'];
    $thongTinThietBi= $_GET['thongTinThietBi'];
    $loaiThietBi= $_GET['loaiThietBi'];
    $ngaySuDung= $_GET['ngaySuDung'];
    $tinhTrang= $_GET['tinhTrang'];
    $sql = "UPDATE thietbi SET
        tenThietBi = '$tenThietBi',
        ngayMua = '$ngayMua',
        soTienMua = '$soTienMua',
        thongTinThietBi = '$thongTinThietBi',
        loaiThietBi = '$loaiThietBi',
        ngaySuDung = '$ngaySuDung',
        tinhTrang = '$tinhTrang'
        WHERE maThietBi = '$maThietBi'";
    if(mysqli_query($conn,$sql)){
      $text="Sửa thành công";
    }
    else{
      $text="Sửa lỗi";
    }
  }
  ?>
<form class="update-form" action="" method="GET">
  <label for="maThietBi">Mã thiết bị:</label>
  <input type="text" id="maThietBi" name="maThietBi" value="<?php echo $maThietBi; ?>" readonly>

  <label for="tenThietBi">Tên thiết bị:</label>
  <input type="text" id="tenThietBi" name="tenThietBi" value="<?php echo $tenThietBi; ?>">

  <label for="ngayMua">Ngày mua:</label>
  <input type="datetime-local" id="ngayMua" name="ngayMua" value="<?php echo $ngayMua; ?>">

  <label for="soTienMua">Số tiền mua:</label>
  <input type="text" id="soTienMua" name="soTienMua" value="<?php echo $soTienMua; ?>">

  <label for="thongTinThietBi">Thông tin thiết bị:</label>
  <input type="text" id="thongTinThietBi" name="thongTinThietBi" value="<?php echo $thongTinThietBi; ?>">

  <label for="loaiThietBi">Loại thiết bị:</label>
  <select name="loaiThietBi" id="loaiThietBi"  required>
      <option value="loai1" <?php if ($loaiThietBi == 'loai1') echo 'selected';?>>Loại 1</option>
      <option value="loai2" <?php if ($loaiThietBi == 'loai2') echo 'selected';?>>Loại 2</option>
      <!-- Thêm các option loại thiết bị khác -->
    </select>

  <label for="ngaySuDung">Ngày sử dụng:</label>
  <input type="datetime-local" id="ngaySuDung" name="ngaySuDung" value="<?php echo $ngaySuDung; ?>">

  <label for="tinhTrang">Tình trạng:</label>
  <input type="text" id="tinhTrang" name="tinhTrang" value="<?php echo $tinhTrang; ?>">

  <input type="submit" name="save" value="Lưu">
  <a href="http://localhost/BTL_PHP/admin/m_thietbi.php">Quay lại</a>
  <p><?php echo isset($text)?$text:""?></p>

</form>
