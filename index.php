<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Group D DSA Site</title>
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
    <div class="linear-nav" style="display:block;margin-top:15px">
        <?php
            $data = null;
            if (($h = fopen("static/content/outline_course.csv", "r")) !== FALSE) 
            {
            // Convert each line into the local $data variable
            $th = fgetcsv($h, 620, ",");
            $index = 0;
            while (($data = fgetcsv($h, 620, ",")) !== FALSE) 
            {		
                // Read the data from a single line
                echo '<li class="navs '.$index.'" data-node-index="'.$index.'" js-data="cookie: '.$index.'">
                <span class="txt">'.$data[2].'</span>
                <span class="sm-scr">'.$data[0].'</span>
                </li>
                <hr style="margin:0px 0px;background-color:black">';
                $index++;
            }

            // Close the file
            fclose($h);
            } else echo "File not found";
        ?>
    </div>
        <div class="content" style="display: none">
            <div id="hostels" style="display:none">
                This is a list of all hostels in Kampala:
                <ul style="list-style:georgian" class="hostel-list">
                    <li>Olympia Hostel</li>
                    <hr style="margin-top:0px;margin-bottom:0px;margin-left:-40px">
                    <li>Kare Hostel</li>
                    <li>Nana Hostel</li>
                </ul>
                This is a list of all hostels in Kampala:
                <ul style="list-style:georgian" class="hostel-list">
                    <li>Olympia Hostel</li>
                    <hr style="margin-top:0px;margin-bottom:0px;margin-left:-40px">
                    <li>Kare Hostel</li>
                    <li>Nana Hostel</li>
                </ul>This is a list of all hostels in Kampala:
                <ul style="list-style:georgian" class="hostel-list">
                    <li>Olympia Hostel</li>
                    <hr style="margin-top:0px;margin-bottom:0px;margin-left:-40px">
                    <li>Kare Hostel</li>
                    <li>Nana Hostel</li>
                </ul>This is a list of all hostels in Kampala:
                <ul style="list-style:georgian" class="hostel-list">
                    <li>Olympia Hostel</li>
                    <hr style="margin-top:0px;margin-bottom:0px;margin-left:-40px">
                    <li>Kare Hostel</li>
                    <li>Nana Hostel</li>
                </ul>This is a list of all hostels in Kampala:
                <ul style="list-style:georgian" class="hostel-list">
                    <li>Olympia Hostel</li>
                    <hr style="margin-top:0px;margin-bottom:0px;margin-left:-40px">
                    <li>Kare Hostel</li>
                    <li>Nana Hostel</li>
                </ul>
                This is a list of all hostels in Kampala:
                <ul style="list-style:georgian" class="hostel-list">
                    <li>Olympia Hostel</li>
                    <hr style="margin-top:0px;margin-bottom:0px;margin-left:-40px">
                    <li>Kare Hostel</li>
                    <li>Nana Hostel</li>
                </ul>
                This is a list of all hostels in Kampala:
                <ul style="list-style:georgian" class="hostel-list">
                    <li>Olympia Hostel</li>
                    <hr style="margin-top:0px;margin-bottom:0px;margin-left:-40px">
                    <li>Kare Hostel</li>
                    <li>Nana Hostel</li>
                </ul>This is a list of all hostels in Kampala:
                <ul style="list-style:georgian" class="hostel-list">
                    <li>Olympia Hostel</li>
                    <hr style="margin-top:0px;margin-bottom:0px;margin-left:-40px">
                    <li>Kare Hostel</li>
                    <li>Nana Hostel</li>
                </ul>This is a list of all hostels in Kampala:
                <ul style="list-style:georgian" class="hostel-list">
                    <li>Olympia Hostel</li>
                    <hr style="margin-top:0px;margin-bottom:0px;margin-left:-40px">
                    <li>Kare Hostel</li>
                    <li>Nana Hostel</li>
                </ul>This is a list of all hostels in Kampala:
                <ul style="list-style:georgian" class="hostel-list">
                    <li>Olympia Hostel</li>
                    <hr style="margin-top:0px;margin-bottom:0px;margin-left:-40px">
                    <li>Kare Hostel</li>
                    <li>Nana Hostel</li>
                </ul>
            </div>
            <div id="0" style="display: none">
                <div class="hotelloader" style="display:none;background-color:black"></div>
            </div>
        </div>
    </div>
    <script src="/static/js/jquery-3.4.1.min.js"></script>
    <script src="/static/js/main.js"></script>
</body>

</html>