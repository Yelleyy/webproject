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
                <?php $stmt=$pdo->prepare("select * from stock");
                $stmt->execute();
                while ($row=$stmt->fetch()):           
                ?>
                <tr>
                    <td data-th="ไอดี"><?=$row[0]?></td>
                    <td data-th="ชื่อ"><?=$row[1]?></td>
                    <td data-th="ราคา"><?=$row[3]?></td>
                    <td data-th="รูป"> <img src='img/<?=$row["PicFood"]?>' width='100'></td>
                    <td data-th="หมวดหมู่"><?=$row[5]?></td>
                    <td> 
                    <a href="listfood_edit.php?ID=<?=$row[0]?>">แก้ไข</a>
                    <a href="delfood.php?ID=<?=$row[0]?>" onclick="return confirm('คุณแน่ใจแล้วหรอที่จะลบ !!!')">ลบ</a></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>