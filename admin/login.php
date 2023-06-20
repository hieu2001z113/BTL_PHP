<!DOCTYPE html>
<html>
<head>
  <title>Trang đăng nhập</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    /* CSS cho phần form đăng nhập */
    .login-form {
      max-width: 300px;
      margin: 0 auto;
      margin-top: 100px;
    }

    .login-form form {
      padding: 20px;
      background: #f7f7f7;
      border: 1px solid #ddd;
      border-radius: 5px;
    }

    .login-form h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .login-form .form-group {
      margin-bottom: 20px;
    }

    .login-form label {
      font-weight: bold;
    }

    .login-form input[type="text"],
    .login-form input[type="password"] {
      width: 100%;
      padding: 12px 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }

    .login-form button {
      width: 100%;
      padding: 12px 20px;
      background-color: #555;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .login-form button:hover {
      background-color: #333;
    }
  </style>
  <?php
    include_once 'db.php';
    session_start();
    if(isset($_SESSION['user']))
    {
        header('Location: index.php');
        exit();
    }
    $text="";
    if(isset($_POST['login'])){
        $sql="SELECT* FROM nhanvien WHERE tenTaiKhoan='$_POST[username]' AND matKhau='$_POST[password]' AND maChucVu='01'";
        if(mysqli_query($conn,$sql)->num_rows>0){
            $_SESSION['user']=$_POST['username'];
            $conn->close();
            header("Location: index.php");
            $conn->close();
            exit;
        }
        else
            $text="login false";
    }
    $conn->close();
  ?>
</head>
<body>
  <div class="container">
    <div class="login-form">
      <h2>Đăng nhập</h2>
      <form action="" method="POST">
        <div class="form-group">
          <label for="username">Tên người dùng:</label>
          <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
          <label for="password">Mật khẩu:</label>
          <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" name="login">Đăng nhập</button>
      </form>
        <?php echo "<p style='color:red'> $text</p>"?>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
