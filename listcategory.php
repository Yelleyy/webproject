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
                    <th>ไอดี</th>
                    <th>ชื่อ</th>
                    <th>รูป</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $stmt = $pdo->prepare("select * from categoryf");
                $stmt->execute();
                while ($row = $stmt->fetch()) :
                ?>
                    <tr>
                        <td data-th="ไอดี"><?= $row[0] ?></td>
                        <td data-th="ชื่อ"><?= $row[1] ?></td>
                        <td data-th="รูป"><img src="img/<?= $row[2] ?>" width="200px"></td>
                        <td><a href="listcategory_edit.php?ID=<?= $row[0] ?>">แก้ไข</a> <a href="delcategory.php?ID=<?= $row[0] ?>" onclick="return confirm('คุณแน่ใจแล้วหรอที่จะลบ !!!')">ลบ</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>