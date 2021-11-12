<?php
include("connect.php");
include("admintools.php");
?>
<link rel="stylesheet" href="table.css">

<body>
    <div class="rwd-table center">
        <table style="width: 100%;">
            <thead>
                <tr>
                    <th>ออเดอร์ไอดี</th>
                    <th>วันที่สั่ง</th>
                    <th>จำนวน</th>
                    <th>ราคารวม</th>
                    <th>สถานะ</th>
                    <th>ไอดีที่อยู่</th>
                    <th>ไอดีผู้ใช้</th>
                </tr>
            </thead>
            <tbody>
                <?php $stmt = $pdo->prepare("select * from orderh");
                $stmt->execute();
                while ($row = $stmt->fetch()) :
                ?>
                    <tr>
                        <td data-th="ออเดอร์ไอดี"><?= $row[0] ?></td>
                        <td data-th="วันที่สั่ง"><?= $row[1] ?></td>
                        <td data-th="จำนวน"><?= $row[2] ?></td>
                        <td data-th="ราคารวม"><?= $row[3] ?></td>
                        <td data-th="สถานะ"><?= $row[4] ?></td>
                        <td data-th="ไอดีที่อยู่"><?= $row[5] ?></td>
                        <td data-th="ไอดีผู้ใช้"><?= $row[6] ?></td>
                        <td><a href="listorder_edit.php?ID=<?= $row[0] ?>">แก้ไข</a> <a href="delorder.php?ID=<?= $row[0] ?>" onclick="return confirm('คุณแน่ใจแล้วหรอที่จะลบ !!!')">ลบ</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>