<?php
include("connect.php");
include("admintools.php");
?>
<link rel="stylesheet" href="table.css">
<style>
    .center,
    .rwd-table {
        max-width: 65%;
    }
    a:visited,a:link{
        color: #fff2dc;
        text-decoration: none;
        font-weight: bolder;
    }
</style>

<body>
    <div class="rwd-table center">
        <table style="width: 100%;">
            <thead>
                <tr>
                    <th>ออเดอร์ไอดี</th>
                    <th>วันที่สั่ง</th>
                    <th>จำนวน</th>
                    <th>ราคารวม</th>
                    <th>ที่อยู่</th>
                    <th>สถานะ</th>
                </tr>
            </thead>
            <tbody>
                <?php $stmt = $pdo->prepare("SELECT * FROM `orderh` join address on orderh.ID_Address=address.ID_Address;");
                $stmt->execute();
                while ($row = $stmt->fetch()) :
                ?>
                    <tr>
                        <td data-th="ออเดอร์ไอดี"><?= $row[0] ?></td>
                        <td data-th="วันที่สั่ง"><?= $row[1] ?></td>
                        <td data-th="จำนวน"><?= $row[2] ?> รายการ</td>
                        <td data-th="ราคารวม"><?= number_format($row[3], 2) ?> บาท</td>
                        <td data-th="ที่อยู่"><?= $row[8] ?></td>
                        <td data-th="สถานะ" align='center'>
                            <?php if ($row["status"] == "work") {
                                echo "<a href='#!' type='button'>กำลังดำเนินการ</a>";
                            } else if ($row["status"] == "cancel") {
                                echo "<a href='#!'>ยกเลิกแล้ว</a>";
                            } else {
                                echo   "<a href='#!'>เสร็จสิ้นแล้ว</a>";
                            }
                            echo "</td>";
                            echo "<td align='center'> &nbsp;";
                            if ($row["status"] == "work") {
                                echo "<a href='changecus.php?ID_Order=$row[0]' onclick=\"return confirm('ยืนยันการยกเลิก... !!!')\" 
                                     type='button' >ยกเลิกออเดอร์</a>";
                            } ?>
                        </td>
                    </tr>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>