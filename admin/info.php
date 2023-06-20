<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    .user-info {
  text-align: center;
  max-width: 300px;
  margin: 0 auto;
}

.avatar {
  font-size: 48px;
  color: #333;
  margin-bottom: 10px;
}

.name {
  font-size: 24px;
  color: #333;
  margin-bottom: 5px;
}

.email,
.location {
  color: #666;
  margin-bottom: 5px;
}

.bio {
  font-size: 14px;
  line-height: 1.5;
  color: #777;
}
.change-password-link {
  color: blue;
  text-decoration: underline;
  text-decoration: none;
}

.change-password-link:hover {
  color: red;
  text-decoration: none;
}

  </style>
  <?php 
  include_once 'check_log.php';
  include_once 'db.php';
  $sql= "SELECT*FROM nhanvien WHERE tenTaiKhoan='$_SESSION[user]' AND maChucVu='01'";
  $res=mysqli_query($conn, $sql);
  $row=mysqli_fetch_assoc($res);
  ?>
</head>
<body>
  <div class="user-info">
    <i class="fas fa-user avatar"></i>
    <h2 class="name"><?php echo $row['hoTen'] ?></h2>
    <p class="email">Tài khoản đăng nhập: <?php echo $row['tenTaiKhoan'] ?></p>
    <p class="email">Số điện thoại: <?php echo $row['soDienThoai'] ?></p>
    <p class="location">Loại tài khoản: ADMIN</p>
    <p class="location">Tuổi: <?php echo $row['tuoi'] ?></p>
    <p class="bio">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vestibulum ante at justo rhoncus, eu feugiat tellus condimentum. Nulla facilisi.</p>
    <a href="chg_pass.php" class="change-password-link">Đổi mật khẩu</a>
    <a href="index.php" class="change-password-link">Quay lại</a>
</div>
</body>
</html>
