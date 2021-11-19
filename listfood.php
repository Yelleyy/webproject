<?php
include("connect.php");
include("admintools.php");
?>
<link rel="stylesheet" href="table.css">

<body>
    <div class="rwd-table center" style="max-width: 1500px;">
        <form action="listfood.php" method="POST">
            <input type="text" name="search" placeholder="ค้นหา..">
            <input type="submit" value="ค้นหา">
            <a href="listfood.php"><button>clear</a></button>
        </form>
        <table >
            <?php
            if (isset($_POST['search'])) {
                $search = $_POST['search'];
                $stmt = $pdo->prepare("SELECT * FROM stock WHERE Food_Name LIKE '%$search%'");
                $stmt->execute();
                $row = $stmt->fetch();
                if (empty($row)) {
                    echo "<h1 align='center'>ไม่มีรายการนี้</h1>";
                } else { ?>
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
                        <tr>
                            <td data-th="ไอดี"><?= $row[0] ?></td>
                            <td data-th="ชื่อ"><?= $row[1] ?></td>
                            <td data-th="ราคา"><?= number_format($row[3], 2) ?></td>
                            <td data-th="รูป"> <img src='img/<?= $row["PicFood"] ?>' width='100'></td>
                            <td data-th="หมวดหมู่"><?= $row[7] ?></td>
                            <td><a href="listfood_edit.php?ID=<?= $row[0] ?>">แก้ไข</a> <a href="delfood.php?ID=<?= $row[0] ?>" onclick="return confirm('คุณแน่ใจแล้วหรอที่จะลบ !!!')">ลบ</a></td>
                        </tr>

                    <?php  }
            } else {
                $stmt1 = $pdo->prepare("SELECT count(*) as count FROM `stock` join categoryf on stock.ID_CATF=categoryf.ID_CATF ORDER BY stock.`ID_Food` ASC ");
                $stmt1->execute();
                $row1=$stmt1->fetch();
                $count=ceil($row1[0]/10);
                for ($i=0; $i <$count ; $i++) { 
                    echo "<a class='center' href='listfood.php?page=".($i*10)."' style='border: 3px solid black;' >หน้าที่ ".($i+1)." "."</a>";
                }
                if(!isset($_GET["page"])){
                    $numpage=0;
                }
                else{
                    $numpage=$_GET["page"];
                }
                
                $stmt2 = $pdo->prepare("SELECT * FROM `stock` join categoryf on stock.ID_CATF=categoryf.ID_CATF ORDER BY stock.`ID_Food` ASC LIMIT 10 OFFSET $numpage;");
                $stmt2->execute();?>
                <thead>
                            <tr>
                                <th>ไอดี</th>
                                <th>ชื่อ</th>
                                <th>ราคา</th>
                                <th>รูป</th>
                                <th>หมวดหมู่</th>
                            </tr>
                        </thead>
              <?php  while ($row = $stmt2->fetch()) :
                    ?>
                        
                    <tbody>
                        <tr>
                            <td data-th="ไอดี"><?= $row[0] ?></td>
                            <td data-th="ชื่อ"><?= $row[1] ?></td>
                            <td data-th="ราคา"><?= number_format($row[3], 2) ?></td>
                            <td data-th="รูป"> <img src='img/<?= $row["PicFood"] ?>' width='100'></td>
                            <td data-th="หมวดหมู่"><?= $row[7] ?></td>
                            <td><a href="listfood_edit.php?ID=<?= $row[0] ?>">แก้ไข</a> <a href="delfood.php?ID=<?= $row[0] ?>" onclick="return confirm('คุณแน่ใจแล้วหรอที่จะลบ !!!')">ลบ</a></td>
                        </tr>
                <?php endwhile;
            } ?>

                    </tbody>
        </table>
    </div>
</body>

</html>