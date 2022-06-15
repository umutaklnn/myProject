<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php ob_start(); include 'header.php'; ?>
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
                        <h1 style="text-align:center;">Admin Paneline Giriş</h1>
                        <div class="slideshow-container">

<div class="mySlides">
        <?php 
        
            if($_POST){
                    $id = $_POST['admin-id'];
                $pass = $_POST['admin-pass'];
                $sql="SELECT id FROM adminf WHERE useridd='$id' and pass='$pass'";
                $result=mysqli_query($mysqli,$sql);
                $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                if(mysqli_num_rows($result) == 1)
                {
                    $aa = $_SESSION['users'][0];
                    $aa = 1;
                 header("Location:admin");
                }else
                {
                }
            }
           

        ?>
        <form action="admin-login.php" class="form-login" method="post">
            <input name="admin-id" placeholder="Kullanıcı Adı" type="text">
            <input name="admin-pass" placeholder="Password" type="password">
            <button type="submit" class="btn btn-success m-3">Panele Giriş</button>
        </form>
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
            </div>
        </div>
    </div>
    <?php include 'script.php';ob_end_flush(); ?>
    <!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="/__/firebase/8.5.0/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="/__/firebase/8.5.0/firebase-analytics.js"></script>

<!-- Initialize Firebase -->
<script src="/__/firebase/init.js"></script>
</body>
</html>