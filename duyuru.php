<div class="genel" data-aos="fade-up">

<div class="h1">
<i class="fas iii fa-angle-double-right" style="transform:rotateY(0);" ></i>    Duyurular <i  style="transform:rotateY(-180deg);" class=" iiii fas fa-angle-double-right"></i>
</div>
<ul class="genel-ul">
    <?php $sqq = "SELECT * FROM duyuru ORDER BY date DESC";
         $result_duyuru = $mysqli->query($sqq);
         $countt = 0;
    ?>
    <?php foreach($result_duyuru as $res){?>
        
    <li>
        <a href="">
            <?php echo ucfirst($res['baslik']);?>
        </a>
        <p>
            <?php echo $res['content'];?>
        </p>
    </li>
    <?php $countt +=1; if($countt>4){break;} }?>
</ul>
</div>