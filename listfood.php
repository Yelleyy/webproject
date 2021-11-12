<?php
include("connect.php");
include("admintools.php");
?>
<link rel="stylesheet" href="table.css">
<body>
    <div class="rwd-table center">
        <table>
            <thead>
                <tr>
                    <th>ไอดี</th>
                    <th>ชื่อ</th>
                    <th>ราคา</th>
                    <th>รูป</th>
                    <th>หมวดหมู่</th>
                </tr>
            </thead>
            <tbody>
                <?php $stmt=$pdo->prepare("SELECT * FROM `stock` join categoryf on stock.ID_CATF=categoryf.ID_CATF ORDER BY `stock`.`ID_Food` ASC");
                $stmt->execute();
                while ($row=$stmt->fetch()):           
                ?>
                <tr>
                    <td data-th="ไอดี"><?=$row[0]?></td>
                    <td data-th="ชื่อ"><?=$row[1]?></td>
                    <td data-th="ราคา"><?=number_format($row[3],2)?></td>
                    <td data-th="รูป"> <img src='img/<?=$row["PicFood"]?>' width='100'></td>
                    <td data-th="หมวดหมู่"><?=$row[7]?></td>
                    <td><a href="listfood_edit.php?ID=<?=$row[0]?>">แก้ไข</a> <a href="delfood.php?ID=<?=$row[0]?>" onclick="return confirm('คุณแน่ใจแล้วหรอที่จะลบ !!!')">ลบ</a></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>