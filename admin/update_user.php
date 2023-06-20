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
?>
<div class="form-container">
  <h2>Sửa Người Dùng</h2>
  <?php 
    $maNhanVien= $_GET['maNhanVien'];
    $hoTen= $_GET['hoTen'];
    $tuoi= $_GET['tuoi'];
    $soDienThoai= $_GET['soDienThoai'];
    $tenTaiKhoan= $_GET['tenTaiKhoan'];
    $matKhau= $_GET['matKhau'];
    $maChucVu= $_GET['maChucVu'];
    if(isset($_POST['save'])){
        $maNhanVien= $_POST['maNhanVien'];
        $hoTen= $_POST['hoTen'];
        $tuoi= $_POST['tuoi'];
        $soDienThoai= $_POST['soDienThoai'];
        $tenTaiKhoan= $_POST['tenTaiKhoan'];
        $matKhau= $_POST['matKhau'];
        $maChucVu= $_POST['maChucVu'];
        $sql = "UPDATE nhanvien SET hoTen='$hoTen', tuoi=$tuoi, soDienThoai='$soDienThoai', 
        tenTaiKhoan='$tenTaiKhoan', matKhau='$matKhau', maChucVu='$maChucVu' WHERE maNhanVien='$maNhanVien'";
        include_once 'db.php';
        if(mysqli_query($conn,$sql))
          $text="Sửa thành công";
        else
          $text="Sửa thất bại";
    }
  ?>
  <form method="POST" action="">
    <label for="maNhanVien">Mã người dùng:</label>
    <input type="text" name="maNhanVien" id="maNhanVien" value="<?php echo $maNhanVien; ?>" required readonly>

    <label for="hoTen">Họ và tên:</label>
    <input type="text" name="hoTen" id="hoTen" value="<?php echo $hoTen; ?>" required>

    <label for="tuoi">Tuổi:</label>
    <input type="text" name="tuoi" id="tuoi" value="<?php echo $tuoi; ?>" required>

    <label for="soDienThoai">Số điện thoại:</label>
    <input type="text" name="soDienThoai" id="soDienThoai" value="<?php echo $soDienThoai; ?>" required>

    <label for="tenTaiKhoan">Tên tài khoản:</label>
    <input type="text" name="tenTaiKhoan" id="tenTaiKhoan" value="<?php echo $tenTaiKhoan; ?>" required>
    <label for="matKhau">Mật khẩu:</label>
    <input  type="text" name="matKhau" id="matKhau" value="<?php echo $matKhau; ?>" required>

    <label for="maChucVu">Chức vụ:</label>
    <select name="maChucVu" id="maChucVu" required>
      <?php 
            include_once 'db.php';
            $res=mysqli_query($conn,"SELECT* FROM chucvu WHERE maChucVu <>'01'");
            while($x =mysqli_fetch_assoc($res)):
                echo "<option value='$x[maChucVu]'";
                if($x['maChucVu']==$maChucVu) echo 'selected'; 
                echo ">$x[tenChucVul]</option>";
            endwhile;
      ?>
      <!-- Thêm các option loại thiết bị khác -->
    </select>

    <button type="submit" name='save'>Sửa người dùng</button>
    <a href="http://localhost/BTL_PHP/admin/m_nguoidung.php">Quay lại</a>
    <p><?php echo isset($text)?$text:""; ?></p>
  </form>
</div>
