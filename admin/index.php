<!DOCTYPE html>
<html>
<head>
  <title>Trang quản lý thiết bị</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    /* CSS cho phần banner */
    .banner {
      background-color: #f5f5f5;
      padding: 20px;
      text-align: center;
    }

    /* CSS cho phần menu */
    .menu {
      background-color: #333;
      padding: 10px;
    }

    .menu ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
    }

    .menu ul li {
      display: inline-block;
      margin-right: 10px;
    }

    .menu ul li a {
      color: #fff;
      text-decoration: none;
      padding: 5px 10px;
    }

    .menu ul li a:hover {
      background-color: #555;
    }

    /* CSS cho footer */
    .footer {
      margin-top: 20px;
      text-align: center;
    }
  </style>
  <?php 
  include_once 'check_log.php';
  ?>
</head>
<body>
  <div class="banner">
    <h1>Trang quản lý thiết bị</h1>
  </div>

  <div class="menu">
    <ul>
      <li><a href="m_thietbi.php">Quản lí thiết bị</a></li>
      <li><a href="m_nguoidung.php">Quản lí người dùng</a></li>
      <li><a href="m_phieu.php">Quản lí phiếu yêu cầu mua</a></li>
      <li><a href="create_pdf.php">Xuất báo cáo</a></li>
      <li><a href="info.php">Thông tin tài khoản</a></li>
      <li><a href="dig.php">Biểu đồ</a></li>
      <li><a href="qr.php">Tạo QR</a></li>
      <li><a href="api.php">API</a></li>
      <li><a href="logout.php">Đăng xuất</a></li>
    </ul>
  </div>

  <div class="container">
    <!-- Nội dung trang quản lí thiết bị -->
    <!-- Thay thế phần này bằng mã HTML và PHP tương ứng cho quản lí thiết bị -->

    <h2>Đây là trang quản lí thiết bị</h2>
    <p>Thêm nội dung tùy ý tại đây...</p>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.4736632130353!2d105.73253187461574!3d21.053735986921453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31345457e292d5bf%3A0x20ac91c94d74439a!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2hp4buHcCBIw6AgTuG7mWk!5e0!3m2!1svi!2s!4v1685859886945!5m2!1svi!2s" width="600" height="450" style="border:0;"
     allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
  

  <div class="footer">
    <p>Bản quyền © <?php echo date("Y"); ?> Trang quản lý thiết bị. Tất cả các quyền đã được bảo lưu.</p>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  
</body>
</html>
