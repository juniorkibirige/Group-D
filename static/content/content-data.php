<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $_GET['t'];?></title>
    <link rel="stylesheet" href="/static/css/style.css">
</head>

<body onload="loader()">
    <div class="wel-text">
        <div class="wel" id="wel">
            <div class="logos">
                <img class="mak" src="/static/icons/mak_logo.png" alt="Makerere Logo">
            </div>
            <div class="titles">
                MAKERERE UNIVERSITY<br>COLLEGE OF COMPUTING AND INFORMATION
                <br>SCIENCES<br>DEPARTMENT OF COMPUER SCIENCE &<br>
                DEPARTMENT OF SOFTWARE ENGINEERING<br>
                CSC 2100 Data Structures and Algorithms
            </div>
        </div>
        <hr style="margin-top: 5px;margin-bottom:0px">
        <div id="body"></div>
            <script src="/static/js/jquery-3.4.1.min.js"></script>
            <script src="/static/js/main.js"></script>
            <?php
            echo "<script>
                function loader(){"?>
                <?php
                if(isset($_GET['arr_cust'])){
                    echo " $('#body').load('/static/content/data.php?dat=".$_GET['dat']."&t=".urlencode($_GET['t'])."&type=".urlencode($_GET['type'])."&data=".$_GET['data']."&arr_cust=".urlencode($_GET['arr_cust'])."&num=".urlencode($_GET['num'])."&param=".urlencode($_GET['param'])."');";
                }elseif(isset($_GET['u_elem'])){
                    echo " $('#body').load('/static/content/data.php?dat=".$_GET['dat']."&t=".urlencode($_GET['t'])."&type=".$_GET['type']."&u_elem=".$_GET['u_elem']."&data=".$_GET['data']."');";
                } elseif(isset($_GET['values'])){
                    echo " $('#body').load('/static/content/data.php?dat=".$_GET['dat']."&t=".urlencode($_GET['t'])."&type=".$_GET['type']."&values=".urlencode($_GET['values'])."&num=".$_GET['num']."&data=".$_GET['data']."');";
                } elseif(isset($_GET['type'])){
                    echo " $('#body').load('/static/content/data.php?dat=".$_GET['dat']."&t=".urlencode($_GET['t'])."&type=".urlencode($_GET['type'])."&data=".$_GET['data']."');";
                } elseif(isset($_GET['lists'])){
                    echo "$('#body').load('/static/content/lists.php?t=".urlencode($_GET['lists'])."');";
                } else echo " $('#body').load('/static/content/data.php?dat=".$_GET['dat']."&t=".urlencode($_GET['t'])."');";
                 ?>
                <?php echo "}
            </script>";
            ?>
</body>

</html>