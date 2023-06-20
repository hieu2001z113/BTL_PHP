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
    $maNhanVien= $_POST['maNhanVien'];
    $hoTen= $_POST['hoTen'];
    $tuoi= $_POST['tuoi'];
    $soDienThoai= $_POST['soDienThoai'];
    $tenTaiKhoan= $_POST['tenTaiKhoan'];
    $matKhau= $_POST['matKhau'];
    $maChucVu= $_POST['maChucVu'];
    $sql = "INSERT INTO nhanvien (maNhanVien, hoTen, tuoi, soDienThoai, tenTaiKhoan, matKhau, maChucVu)
        VALUES ('$maNhanVien', '$hoTen', '$tuoi', '$soDienThoai', '$tenTaiKhoan', '$matKhau', '$maChucVu')";
    include_once 'db.php';
    if(mysqli_query($conn,$sql)){
        $text="Thêm thành công";
        header("refresh:2; url=add_user.php");
    }
    else
      $text="Thêm thất bại";
}
?>
<div class="form-container">
  <h2>Thêm Người Dùng</h2>
  
  <form method="POST" action="">
    <label for="maNhanVien">Mã người dùng:</label>
    <input type="text" name="maNhanVien" id="maNhanVien" required>

    <label for="hoTen">Họ và tên:</label>
    <input type="text" name="hoTen" id="hoTen" required>

    <label for="tuoi">Tuổi:</label>
    <input type="text" name="tuoi" id="tuoi" required>

    <label for="soDienThoai">Số điện thoại:</label>
    <input type="text" name="soDienThoai" id="soDienThoai" required>

    <label for="tenTaiKhoan">Tên tài khoản:</label>
    <input type="text" name="tenTaiKhoan" id="tenTaiKhoan" required>
    <label for="matKhau">Mật khẩu:</label>
    <input  type="text" name="matKhau" id="matKhau" required>

    <label for="maChucVu">Chức vụ:</label>
    <select name="maChucVu" id="maChucVu" required>
      <?php 
            include_once 'db.php';
            $res=mysqli_query($conn,"SELECT* FROM chucvu WHERE maChucVu <>'01'");
            while($x =mysqli_fetch_assoc($res)):
                echo "<option value='$x[maChucVu]'>$x[tenChucVul]</option>";
            endwhile;
      ?>
      <!-- Thêm các option loại thiết bị khác -->
    </select>

    <button type="submit" name='add'>Thêm người dùng</button>
    <a href="http://localhost/BTL_PHP/admin/m_nguoidung.php">Quay lại</a>
    <p><?php echo isset($text)?$text:""; ?></p>
  </form>
</div>
