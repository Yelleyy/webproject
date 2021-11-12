<?php
include("navbar.php");
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="apple-touch-icon" sizes="144x144" href="img/apple-icon-144x144.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="img/ms-icon-144x144.png">
    <link rel="manifest" href="img/manifest.json">
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <title>GYP Dessert</title>
</head>

<body>

    <div id='cssmenu'>
        <ul>
            <li><a href='listuser.php'>รายการผู้ใช้งาน</a>
            <li class="has-sub"><a href='#'>จัดการอาหาร</a>
                <ul>
                    <li><a href='listfood.php'>รายการอาหาร</a></li>
                    <li><a href='addfood.php'>เพิ่มรายการอาหาร</a></li>
                </ul>
            </li>
            <li class="has-sub"><a href='#'>จัดการหมวดหมู่</a>
                <ul>
                    <li><a href='listcategory.php'>รายการหมวดหมู่</a></li>
                    <li><a href='addcategory.php'>เพิ่มรายการหมวดหมู่</a></li>
                </ul>
            </li>
            <li><a href='listorder.php'>รายการออเดอร์</a>
            </li>
            </li>
            <li><a href='index.php?logout=1'>ออกจากระบบ</a></li>
        </ul>
    </div>
    <br><br>
</body>
<script src="./navadmin.js"></script>