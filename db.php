<?php
$mysqli = new mysqli('localhost','schoolsc_denee','umtmd438.A','schoolsc_find') or die($mysqli->connect_error);
$mysqli -> set_charset("utf8");
$connect = mysqli_connect('localhost','schoolsc_denee','umtmd438.A','schoolsc_find');
$connect -> set_charset("utf8");
if($mysqli){
    
}
else{
 
}

try {
     $db = new PDO("mysql:host=localhost;dbname=schoolsc_find", "schoolsc_denee", "umtmd438.A");
} catch ( PDOException $e ){
     print $e->getMessage();
}

/*
 cpanelden bitane modülü aktifleşt
try {
    $db = new PDO("mysql;host=localhost:3306;dbname=schoolsc_deneme", 'schoolsc_yeniden', 'Umtmd438.A'); herşey doğru aq
} catch(PDOException $e) {
   echo $e->getMessage();
   //echo "sea";
}
$data = $db->query("SELECT * FROM img")->fetch();
print_r($data);

*/
?>
  