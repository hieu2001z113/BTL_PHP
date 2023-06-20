<style>
  .form-container {
    max-width: 300px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  .form-container h2 {
    text-align: center;
    margin-bottom: 20px;
  }

  .form-container label {
    display: block;
    margin-bottom: 10px;
  }

  .form-container input[type="text"],
  .form-container textarea,
  .form-container select {
    width: 100%;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 10px;
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
  .form-container button[type="submit"]{
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  .bgr{
    background-color: red;
  }
</style>
<?php
include_once 'check_log.php';
if(isset($_POST['add'])){
    $maThietBi= $_POST['maThietBi'];
    $tenThietBi= $_POST['tenThietBi'];
    $ngayMua= $_POST['ngayMua'];
    $soTienMua= $_POST['soTienMua'];
    $thongTinThietBi= $_POST['thongTinThietBi'];
    $loaiThietBi= $_POST['loaiThietBi'];
    $ngaySuDung= $_POST['ngaySuDung'];
    $tinhTrang= $_POST['tinhTrang'];
    $sql = "INSERT INTO thietbi (maThietBi, tenThietBi, ngayMua, soTienMua, thongTinThietBi, loaiThietBi, ngaySuDung, tinhTrang)
        VALUES ('$maThietBi', '$tenThietBi', '$ngayMua', '$soTienMua', '$thongTinThietBi', '$loaiThietBi', '$ngaySuDung', '$tinhTrang')";
    include_once 'db.php';
    if(mysqli_query($conn,$sql))
      $text="Thêm thành công";
    else
      $text="Thêm thất bại";
    header("refresh:2; url=add_device.php");
    $conn->close();
}
?>
<div class="form-container">
  <h2>Thêm thiết bị</h2>
  
  <form method="POST" action="">
    <label for="maThietBi">Mã thiết bị:</label>
    <input type="text" name="maThietBi" id="maThietBi" required>

    <label for="tenThietBi">Tên thiết bị:</label>
    <input type="text" name="tenThietBi" id="tenThietBi" required>

    <label for="ngayMua">Ngày mua:</label>
    <input type="datetime-local" name="ngayMua" id="ngayMua" required>

    <label for="soTienMua">Số tiền mua:</label>
    <input type="text" name="soTienMua" id="soTienMua" required>

    <label for="thongTinThietBi">Thông tin thiết bị:</label>
    <textarea name="thongTinThietBi" id="thongTinThietBi" required></textarea>

    <label for="loaiThietBi">Loại thiết bị:</label>
    <select name="loaiThietBi" id="loaiThietBi" required>
      <option value="loai1">Loại 1</option>
      <option value="loai2">Loại 2</option>
      <!-- Thêm các option loại thiết bị khác -->
    </select>

    <label for="ngaySuDung">Ngày sử dụng:</label>
    <input type="datetime-local" name="ngaySuDung" id="ngaySuDung" required>

    <label for="tinhTrang">Tình trạng:</label>
    <input type="text" name="tinhTrang" id="tinhTrang" required>

    <button type="submit" name='add'>Thêm thiết bị</button>
    <a href="http://localhost/BTL_PHP/admin/m_thietbi.php">Quay lại</a>
    <p><?php echo isset($text)?$text:""; ?></p>
  </form>
</div>
