<?php
session_start();
if (!isset($_SESSION['email'])) {
  echo "<script type='text/javascript'>";
  echo "alert('กรุณาเข้าสู่ระบบ');";
  echo "window.location = 'login.php'; ";
  echo "</script>";
}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['email']);
  header('location: login.php');
}
include('connect.php');
include('tools.php');
$id = $_REQUEST["ID"];
$stmt = $pdo->prepare("SELECT * FROM detail WHERE ID_Order = '$id' ");
$stmt->execute();
$i = 1; ?>

<head>
  <link rel="stylesheet" href="./table.css">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body>
  <br>

  <div class="center">
    <h1 class="card-title">รายละเอียดออเดอร์</h1>

    <table class="rwd-table"  style="min-width: 1000px">
      <thead>
        <tr align='center'>
          <th>ลำดับที่</th>
          <th>รายการ</th>
          <th>รูป</th>
          <th>จำนวนทั้งหมด</th>
          <th>ราคารวม</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $stmt->fetch()) {
          $ID_Food = $row["ID_Food"];
          $stmt1 = $pdo->prepare("SELECT * FROM stock where ID_Food ='$ID_Food'");
          $stmt1->execute();
          echo "<tr align='center'>";
          echo "<td >" . $i .  "</td> ";
          $row1 = $stmt1->fetch();
          echo "<td >" . $row1["Food_Name"] . "</td> ";
          echo "<td><img src='img/" . $row1["PicFood"] . "' width='300px' height='auto'> </td> ";
          echo "<td>" . $row["amount"] .  " ชิ้น</td> ";
          echo "<td>" . number_format($row["price"], 2) .  " บาท</td> ";
          echo "<td> </td> ";
          echo "</tr>";
          $i++;
        }
        ?>
      </tbody>
    </table>
    <a href="javascript:history.back()" style="color:brown;text-decoration:none">กลับหน้าเดิม</a>
  </div>
  <br>
</body>