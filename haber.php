<div class="genel" data-aos="fade-up">
    <div class="h1">
    <i class="fas fa-angle-double-right" style="transform:rotateY(0);" ></i>    Köşe Yazıları <i  style="transform:rotateY(-180deg);" class=" iiii fas fa-angle-double-right"></i>
    </div>
    <ul class="genel-ul">
    <?php $sqq = "SELECT * FROM haber ORDER BY date DESC";
             $result_duyuru = $mysqli->query($sqq);
             $countft = 0;
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
        <?php $countft +=1; if($countft>4){break;} }?> 
    </ul>
</div>