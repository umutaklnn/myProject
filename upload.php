
<?php

include 'header.php';
include 'db.php';


if(isset($_GET['postadd'])){



    /* foreach($_FILES['myImages']['tmp_name'] as $key => $image){

        $imageName = $_FILES['myImages']['name'][$key];

        $imageTmpName = $_FILES['myImages']['tmp_name'][$key];



        $directory = 'uploads/';

        $result= move_uploaded_file($imageTmpName,$directory.$imageName);



    }*/



    $baslik=$_POST['baslik'];

    $icerik=$_POST['icerik'];
    $insta=$_POST['insta'];
    $youtube=$_POST['youtube'];

    $user=$_POST['user'];

    $imgg = $_FILES['images']['name'];

    $imgtmp = $_FILES['images']['tmp_name'];

    $fileSize = $_FILES['images']['size'];

    $fileError = $_FILES['images']['error'];

    $dire = 'uploads/';



    $filExt = explode('.',$imgg);

    $fileActualExt = strtolower(end($filExt));

    $allowed = array('jpg','jpeg','png','pdf');



    if(in_array($fileActualExt,$allowed)){

        if($fileError === 0){

            if($fileSize < 10000000){

                $fileNameNew = uniqid('',true).".".$fileActualExt;

                $fileDestination = 'uploads/'.$fileNameNew;

                move_uploaded_file($imgtmp,$fileDestination);

                //htmlentities($icerik, ENT_QUOTES, "UTF-8");

                //utf8_decode($icerik);

                $y = addslashes($icerik);

                $query = "INSERT INTO  img (baslik,icerik,images,insta,youtube,user) VALUES ('$baslik','$y','$fileNameNew','$insta','$youtube','$user')";

                $result = mysqli_query($connect,$query);

                if($result){

                    header("Location:admin/pages/makale.php?uploadsucces");

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

        header("Location:admin/pages/haber?uploadsuccess");

    }

    else{

        echo "<script type='text/javascript'>alert('HATA');</script>";

    }

}

?>

<?php



if(isset($_GET['addduyuru'])){



    $baslik_duyuru = $_POST['baslik'];

    $icerik_duyuru = $_POST['link'];

    $yazar_duyuru = $_POST['yazar-new'];

    $query_duyuru = "INSERT INTO `duyuru`(`baslik`,`link`,`yazar`) VALUES ('$baslik_duyuru','$icerik_duyuru','$yazar_duyuru')";

    $result_duyuru = mysqli_query($connect,$query_duyuru);

    if($result_duyuru){

        header("Location:admin/pages/haber.php?success");

    }

    else{

        echo "<script type='text/javascript'>alert('HATA');</script>";

    }

}
if(isset($_GET['addkose'])){



    $baslik_duyuru = $_POST['baslik'];

    $icerik_duyuru = $_POST['link'];

    $yazar_duyuru = $_POST['yazar'];

    $query_duyuru = "INSERT INTO `haber`(`baslik`,`link`,`yazar`) VALUES ('$baslik_duyuru','$icerik_duyuru','$yazar_duyuru')";

    $result_duyuru = mysqli_query($connect,$query_duyuru);

    if($result_duyuru){

        header("Location:admin/pages/kose.php?success");

    }

    else{

        echo "<script type='text/javascript'>alert('HATA');</script>";

    }

}
if(isset($_GET['deleteduyuru'])){
    $query = $db->prepare("DELETE FROM duyuru WHERE id = :id");
    $delete = $query->execute(array(
        'id' => $_GET['deleteduyuru']
    ));
    if($delete){
        header("Location:admin/pages/duyuru-edit?success");
    }
}
if(isset($_GET['deletekose'])){
    $query = $db->prepare("DELETE FROM haber WHERE id = :id");
    $delete = $query->execute(array(
        'id' => $_GET['deletekose']
    ));
    if($delete){
        header("Location:admin/pages/kose-edit?success");
    }
}

if (isset($_GET["addtotal"])==1) {

    $text = $_POST['category'];

    $text_alt = $_POST['text-alt'];

    $uploadFolder = 'uploads/';

    foreach ($_FILES['imageFile']['tmp_name'] as $key => $image) {

        $imageName = $_FILES['imageFile']['name'][$key];

        $imageTmpName = $_FILES['imageFile']['tmp_name'][$key];

        $directory = "uploads-total/";

        $result = move_uploaded_file($imageTmpName,$directory.$imageName);

        $query = "INSERT INTO `img_total`(`name`,`category`) VALUES ('$imageName','$text')";

        $result = mysqli_query($mysqli,$query);

    }

    if ($result) {

        header("Location:admin/pages/toplu.php?success");

    }

    else{

        echo "<script> alert('deASDFASDFASe'); </script>";

    }

}
if (isset($_GET["addtotal"])==2) {

    $text = $_POST['category'];

    $text_alt = $_POST['text-alt'];

    $uploadFolder = 'uploads/';

    foreach ($_FILES['imageFile']['tmp_name'] as $key => $image) {

        $imageName = $_FILES['imageFile']['name'][$key];

        $imageTmpName = $_FILES['imageFile']['tmp_name'][$key];

        $directory = "uploads-total/";

        $result = move_uploaded_file($imageTmpName,$directory.$imageName);

        $query = "INSERT INTO `img_total_1`(`name`,`category`) VALUES ('$imageName','$text')";

        $result = mysqli_query($mysqli,$query);

    }

    if ($result) {

        header("Location:admin/pages/toplu.php?success");

    }

    else{

        echo "<script> alert('deASDFASDFASe'); </script>";

    }

}
if(isset($_GET['deleteimgg'])){
    $id = $_GET['deleteimgg'];
    $delete_query = "DELETE FROM img_total WHERE id='$id'";
    $ressq = mysqli_query($mysqli,$delete_query);

    if($ressq){
        header("Location:admin/pages/gorsel.php?deletesuccess");
    }

}
if(isset($_GET['deletemakale'])){

    $id_makale = $_GET['deletemakale'];

    $ssm = "DELETE FROM img WHERE id='$id_makale'";

    if($mysqli->query($ssm) === TRUE){

        header("Location:admin/pages/makaleler.php");

    }

    else{

        echo "<script type='text/javascript'>alert('BAŞARISIZ');</script>";

    }





}

if(isset($_GET['guncellemakale'])){

    $id_makale_guncel = $_GET['guncellemakale'];

    $makale_select = "SELECT * FROM img WHERE id='$id_makale_guncel'";

    $makale_result = $mysqli->query($makale_select);

    foreach ($makale_result as $e){

        ?>



        <div class="card">

            <div class="body">

                <form action="upload.php?updatemakale=<?php echo $e['id']; ?>" method="post" enctype="multipart/form-data">

                    <div class="row clearfix">

                        <div class="col-sm-12">

                            <div class="form-group form-float">

                                <div class="form-line">

                                    <input type="text" value="<?php echo $e['baslik']; ?>" name="baslik" class="form-control">



                                </div>

                            </div>

                        </div>

                        <div class="col-sm-12">

                            <div class="form-group form-float">

                                <div class="form-line">

                                    <input value="<?php echo $e['icerik']; ?>" type="text" name="icerik" class="form-control">

                                </div>

                            </div>

                        </div>

                        <div class="col-sm-12">

                            <div class="form-group form-float form-group-lg">

                                <div class="form-line">

                                    <input value="<?php echo $e['user']; ?>" type="text" name="user" class="form-control">

                                </div>

                            </div>



                            <div class="form-group form-float form-group-sm">

                                <div class="fallback">

                                    <input class="form-control form-control-lg" type="file" multiple="" name="images" placeholder="asdfasdfasd" aria-label="">

                                    <img src="uploads/<?php echo $e['images']; ?>" class="img-responsive m-4 p-4" style="max-width: 150px;  box-shadow: 0 0 6px rgba(0,0,0,.3)" alt="">

                                </div>

                            </div>

                            <div class="form-group form-float form-group-sm">

                                <button type="submit" class="btn btn-success"> EKLE </button>

                            </div>

                        </div>

                    </div>



                </form>

            </div>

        </div>



        <?php

    }

}


if(isset($_GET['updatemakale'])){

    $id_ff = $_GET['updatemakale'];

    $baslik_update = $_POST['baslik'];

    $icerik_update = $_POST['icerik'];

    $user_update = $_POST['user'];

    $imgg_update = $_FILES['images']['name'];

    $imgtmp_update = $_FILES['images']['tmp_name'];

    $fileSize_update = $_FILES['images']['size'];

    $fileError_update = $_FILES['images']['error'];

    $dire_update = 'uploads/';

    $filExt_update = explode('.',$imgg_update);

    $fileActualExt_update = strtolower(end($filExt_update));

    $allowed_update = array('jpg','jpeg','png','pdf');

    if(in_array($fileActualExt_update,$allowed_update)){

        if($fileError_update === 0){

            if($fileSize_update < 10000000){



                $fileNameNew = uniqid('',true).".".$fileActualExt_update;

                $fileDestination = 'uploads/'.$fileNameNew;



                move_uploaded_file($imgtmp_update,$fileDestination);

                $query = "UPDATE img SET baslik='$baslik_update',icerik='$icerik_update',user='$user_update',images='$fileNameNew' WHERE id='$id_ff'";

                $result = mysqli_query($connect,$query);

                if($result){

                    header("Location:admin/pages/makaleler");

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

}



?>



