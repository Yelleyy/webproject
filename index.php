<?php
include "tools.php";
include "connect.php";
$stmt = $pdo->prepare("select * from categoryf");
$stmt->execute();

?>
<!DOCTYPE html>
<html lang="en">
<style>
    * {
        font-size: 30px;
    }

    .header {
        margin-left: 50px;
    }

    .vertical-menu {
        width: 200px;
    }

    .vertical-menu a {
        background-color: #eee;
        color: black;
        display: block;
        padding: 12px;
        text-decoration: none;
    }

    .vertical-menu a:hover {
        background-color: #ccc;
    }

    .vertical-menu a.active {
        background-color: #04AA6D;
        color: white;
    }
</style>

<body>
    <div class="content">
        
    </div>
</body>

</html>
<script>
    function click() {
        var x = document.getElementById("cat");
        if (x.className === "b") {
            x.className += "active";
        } else {
            x.className = "b";
        }
    }
</script>