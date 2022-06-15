<?php
    include 'header.php';

    include 'db.php';
    $connect = mysqli_connect('localhost','schoolsc_denee','umtmd438.A','schoolsc_second');
    
if(isset($_GET['postadd'])){

    /* foreach($_FILES['myImages']['tmp_name'] as $key => $image){
        $imageName = $_FILES['myImages']['name'][$key];
        $imageTmpName = $_FILES['myImages']['tmp_name'][$key];

        $directory = 'uploads/';
        $result= move_uploaded_file($imageTmpName,$directory.$imageName);

    }*/

        $baslik=$_POST['baslik'];
        $icerik=$_POST['icerik'];
        $user=$_POST['user'];
        $imgg = $_FILES['images']['name'];
        $imgtmp = $_FILES['images']['tmp_name'];
        $fileSize = $_FILES['images']['size'];
        $fileError = $_FILES['images']['error'];
        $dire = 'uploads/';
        echo $baslik;
        die();
        $filExt = explode('.',$imgg);
        $fileActualExt = strtolower(end($filExt));
        $allowed = array('jpg','jpeg','png','pdf');

        if(in_array($fileActualExt,$allowed)){
            if($fileError === 0){
                if($fileSize < 10000000){
                    $fileNameNew = uniqid('',true).".".$fileActualExt;
                    $fileDestination = 'uploads/'.$fileNameNew;
                    move_uploaded_file($imgtmp,$fileDestination);
                    
                    $query = "INSERT INTO `img`(`baslik`,`icerik`,`images`,`user`) VALUES ('$baslik','$icerik','$fileNameNew','$user')";
                    $result = mysqli_query($connect,$query);
                    if($result){
                        header("Location:admin-panel.php?uploadsuccess");
                    }
                    else{
                     echo "<script>alert('basarısız');</script>";
                    }
                    mysqli_close($connect);
                }
                else{
                    echo "Dosya Boyutu Büyük";
                }
            }
            else{
                echo "Yüklenirken hata";
            }
        }
        else{
            echo "HATA";
        }

    /* if($result){
         $pdoQuery = "INSERT INTO `school`(`baslik`,`icerik`,`image`,`user`) VALUES (:baslik,:icerik,:image,:user)";
         $pdoResult = $pdoConnect -> prepare($pdoQuery);

         $pdoExec = $pdoResult->execute(array(":baslik"=>$baslik,":icerik"=>$icerik,":image"=>$imageName,":user"=>$user));
         
         if($pdoExec){
             echo "Veri Kaydedildi";
         }
         else{
             echo "hata";
         }
    }*/

}
?>
 
<?php

if(isset($_GET['addnews'])){
    
                    $baslik_new = $_POST['baslik-new'];
                    $icerik_new = $_POST['icerik-new'];
                    $yazar_new = $_POST['yazar-new'];
                    $query_new = "INSERT INTO `haber`(`baslik`,`content`,`yazar`) VALUES ('$baslik_new','$icerik_new','$yazar_new')";
                    $result_new = mysqli_query($connect,$query_new);
                    if($result_new){
                        echo "<script type='text/javascript'>alert('BAŞARILI');</script>";
                    }
                    else{
                        echo "<script type='text/javascript'>alert('HATA');</script>";
                    }
}
?>
<?php

if(isset($_GET['addduyuru'])){
    
                    $baslik_duyuru = $_POST['baslik-new'];
                    $icerik_duyuru = $_POST['icerik-new'];
                    $yazar_duyuru = $_POST['yazar-new'];
                    $query_duyuru = "INSERT INTO `haber`(`baslik`,`content`,`yazar`) VALUES ('$baslik_duyuru','$icerik_duyuru','$yazar_duyuru')";
                    $result_duyuru = mysqli_query($connect,$query_duyuru);
                    if($result_duyuru){
                        echo "<script type='text/javascript'>alert('BAŞARILI');</script>";
                    }
                    else{
                        echo "<script type='text/javascript'>alert('HATA');</script>";
                    }
}
?>

