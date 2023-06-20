<head>
    <style>
        form {
  width: 300px;
  margin: 0 auto;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="password"] {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}
a {
  color: blue;
  text-decoration: underline;
  text-decoration: none;
}

a:hover {
  color: red;
  text-decoration: none;
}

    </style>
    <?php 
    include_once 'check_log.php';
    include_once 'db.php';
    if(isset($_POST['ch'])){
        $pass_old= $_POST['current_password'];
        $pass_new= $_POST['new_password'];
        $pass_newr= $_POST['confirm_password'];
        $sql="SELECT* FROM nhanvien WHERE tenTaiKhoan='$_SESSION[user]' AND matKhau='$pass_old'";
        $res=mysqli_query($conn,$sql);
        $rowcount=mysqli_num_rows($res);
        if($rowcount<=0)
            $text="Mật khẩu cũ không đúng";
        else{
            if($pass_new == $pass_newr && $pass_new!=$pass_old){
                $sql="UPDATE nhanvien SET matKhau='$pass_new' WHERE tenTaiKhoan='{$_SESSION['user']}' AND matKhau='$pass_old'";
                if(mysqli_query($conn,$sql))
                    echo "Đổi mật khẩu thành công....Trở lại trang cá nhân sau 3s";
                else
                    echo "Đổi mật khẩu thất bại....Trở lại trang cá nhân sau 3s";
                header("refresh:3; url=info.php");
                $conn->close();
                exit;
            }
            else
                $text="Mật khẩu mới không khớp hoặc mật khẩu mới trùng mật khẩu cũ!";
        }
    }
    else{
        $text="";
    }
    ?>
</head>
<form action="" method="POST">
  <label for="current_password">Mật khẩu hiện tại:</label>
  <input type="password" id="current_password" name="current_password" required>

  <label for="new_password">Mật khẩu mới:</label>
  <input type="password" id="new_password" name="new_password" required>

  <label for="confirm_password">Xác nhận mật khẩu mới:</label>
  <input type="password" id="confirm_password" name="confirm_password" required>

  <input type="submit" name="ch" value="Đổi mật khẩu">
  <a href="info.php">Quay lại</a>
  <p><?php echo $text ?></p>
</form>
