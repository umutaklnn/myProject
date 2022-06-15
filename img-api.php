<?php
include 'db.php';

session_start();



?>

<?php
if(isset($_GET['imgupdate'])){
    $img_id = $_GET['imgupdate'];
    $_SESSION['img-statu'] = $img_id;
    $name = $_POST['name'];
    $text = $_POST['text'];
    $text_total = $_POST['text-total'];

    $ssc = "UPDATE img_total SET  text='$text' , text_total='$text_total'    WHERE id='$img_id'";
    $result = $mysqli->query($ssc);
    header("Location:gorsel-update?updatesuccess");
}

if(isset($_GET['deletee'])){

    $dsd = $_GET['deletee'];
    $ssc = " DELETE FROM img_total WHERE id='$dsd' ";
    $result = $mysqli->query($ssc);


    $alterrr = "SET @num :=0;";
    $result = $mysqli->query($alterrr);
    $alter = "ALTER TABLE img_total AUTO_INCREMENT = '1'";
    $result = $mysqli->query($alter);
    $alterr = "UPDATE img_total SET id = @num := (@num+1);";
    $result = $mysqli->query($alterr);
    header("Location:gorsel-update?updatesuccess");
}

?>
