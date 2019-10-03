<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $_GET['t']; ?></title>
    <link rel="stylesheet" href="/static/css/style.css">
</head>

<body>
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
            <header style="color:aqua;font-size:larger">
                Towers of Hanoi
            </header>
            <content id="content">
                Data about the towers and their background goes here.
            </content>
            <div id="nav"></div>
    </div><script src="/static/js/jquery-3.4.1.min.js"></script>
    <?php 
        if(strpos($_SERVER['HTTP_HOST'], 'dsa') == true){ 
            include_once "/var/www/groupd.dsa/static/content/react-scripts-dev.php";
        } else 
            include_once "/static/content/react-scripts.php";
    ?>
</body>

</html>