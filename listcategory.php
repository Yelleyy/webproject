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
                    <th>อีเมล</th>
                    <th>รหัสผ่าน</th>
                    <th>เบอร์โทร</th>
                </tr>
            </thead>
            <tbody>
                <?php $stmt=$pdo->prepare("select * from categoryf");
                $stmt->execute();
                while ($row=$stmt->fetch()):           
                ?>
                <tr>
                    <td data-th="ไอดี"><?=$row[0]?></td>
                    <td data-th="ชื่อ"><?=$row[1]?></td>
                    <td data-th="รูป"><?=$row[2]?></td>
                    
                    <td><a href="listcategory_edit.php?ID=<?=$row[0]?>">แก้ไข</a> <a href="delcategory.php?ID=<?=$row[0]?>" onclick="return confirm('คุณแน่ใจแล้วหรอที่จะลบ !!!')">ลบ</a></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>