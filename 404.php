
<?php
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <base href="/">
</head>
<body>
    <div class="genel-a">
        <h1>404 Not Found</h1>
        <h3>Aradığınız Sayfayı Bulamıyorum</h3>
        <p>Dilerseniz <a href="/">linkten</a>anasayfaya ulaşabilirsiniz.</p>
    </div>
    <style>
        h1{
            width: 100%;
            text-align: center;
            color: black;
            background: rgba(0,0,0,.6);
            padding: 10px 0;
            color: rgba(255,255,255,.7);
            font-weight: bold;
            margin: 0;
            padding-top: 25px;

        }
        p{
            width: 100%;
            text-align: center;
            color: black;
            background: rgba(0,0,0,.6);
            padding: 10px 0;
            color: rgba(255,255,255,.7);
            font-weight: bold;
            margin: 0;
            padding-bottom: 25px;
        }
        h3{
            width: 100%;
            text-align: center;
            color: black;
            background: rgba(0,0,0,.6);
            padding: 10px 0;
            color: rgba(255,255,255,.7);
            font-weight: bold;
            margin: 0;

        }
        a{
            margin: 0 5px;


        }
        .genel-a{
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-image: url("../img/404.jpg");
            background-size: cover;

        }
        .generall{
            box-shadow: 0 0 50px white;
        }
        html{
            overflow-y: hidden;
        }
    </style>
</body>
</html>
<?php include "foother.php"; ?>