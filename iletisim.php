<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include 'header.php'; ?>
    <?php include 'db.php'; ?>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEYO</title>
</head>
<body>
    <div class="container-fluid">
        <?php include 'menu.php'; ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="container header">
                    <div class="black-header">
                        <h1>Okullar Kodluyor Robotlar Buluşuyor Erasmus+ Projesi</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia corrupti vel ipsum, temporibus rem aliquam iusto nostrum nemo odit exercitationem soluta, quaerat reprehenderit voluptate amet! Aperiam quidem dolores aut beatae.</p>
                        <div class="slideshow-container">

<div class="mySlides">
  <q>I love you the more in that I believe you had liked me for my own sake and for nothing else</q>
  <p class="author">- John Keats</p>
</div>

<div class="mySlides">
  <q>But man is not made for defeat. A man can be destroyed but not defeated.</q>
  <p class="author">- Ernest Hemingway</p>
</div>

<div class="mySlides">
  <q>I have not failed. I've just found 10,000 ways that won't work.</q>
  <p class="author">- Thomas A. Edison</p>
</div>

<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>
<div class="dot-container">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
</div>
                    </div>         
                </div>
                </div>
                <div class="container content"> <!-- Contents -->
                    <div class="row">
                        <div class="col-lg-9">
                            <h1  data-text="Yakında.." style="text-align:center;" class="content-textt">Yakında..</h1>
                        </div>
                        <div class="col-lg-3">
                            <?php include 'duyuru.php';?>
                            <?php include 'haber.php';?>
                        </div>
                    </div>
                </div>
                               
                <?php include 'foother.php';?>
            </div>
        </div>
    </div>
    <?php include 'script.php'; ?>
    <!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="/__/firebase/8.5.0/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="/__/firebase/8.5.0/firebase-analytics.js"></script>

<!-- Initialize Firebase -->
<script src="/__/firebase/init.js"></script>
</body>
</html>