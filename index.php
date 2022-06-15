<!DOCTYPE html><html lang="en"><head>    <meta charset="UTF-8">    <meta http-equiv="X-UA-Compatible" content="IE=edge">    <?php include 'header.php'; ?>    <?php include 'db.php'; ?>     <meta name="viewport" content="width=device-width, initial-scale=1.0">    <title>Sendeki Yankımı Keşfet</title></head><body>    <div class="container-fluid">        <?php include 'menu.php'; ?>        <div class="row">            <div class="col-lg-12">                <div class="container header">                    <div class="black-header">                        <h1>Okullar Kodluyor Robotlar Buluşuyor Erasmus+ Projesi</h1>                        <p>"Okullar Kodluyor, Robotlar Buluşuyor" isimli 2018-1-TR01-KA229-058672numaralı projemiz Erasmus+ Programı Ana Eylem 2 Okullar Arası Değişim Ortaklıkları (KA229) faaliyeti kapsamında yürütülmektedir. 2018-2021</p>                        <div class="slideshow-container"><div class="mySlides">  <q style="font-size: 15px">Kodlama ve Robotik çalışmaları öğrenmeye başlayan öğrencilerin keşfetme duygularının artığını, heyecanlarını görmek mümkün. Projemizin motivasyonu bu zemin üzerinde yükselmektedir. Çocukların yazılım geliştirme yeteneklerinin erken yaşta geliştirilmesi, 21. yüzyıl değerleri ve fırsatları düşünüldüğünde çocuklarımıza sağlam bir temel yaratabileceğine inanıyoruz. Yani proje hedefimizi “yazılımlar tarafından kontrol edilen bireylerden ziyade yazılım(kodlama) üretebilen bireylerin çoğalması” diyebiliriz.</q></div><div class="mySlides">  <q style="font-size: 15px">Robotik-kodlama öğrenmenin bireylerin      problem çözme, iletişim kurma, takım çalışması, planlı yaşam, karar verebilme, yaratıcı      düşünebilme yeteneklerine çok büyük oranda katkı sağladığı, bilimsel verilerle gözlenmektedir.</q></div><div class="mySlides">  <q style="font-size: 15px">Kodlama, çocukları gelecekte gerekli olan becerileri geliştirmeye hazırlar.</q></div><a class="prev" onclick="plusSlides(-1)">❮</a><a class="next" onclick="plusSlides(1)">❯</a><div class="dot-container">  <span class="dot" onclick="currentSlide(1)"></span>   <span class="dot" onclick="currentSlide(2)"></span>   <span class="dot" onclick="currentSlide(3)"></span> </div></div>                    </div>                         </div>                </div>                <div class="container content"> <!-- Contents -->                    <div class="row">                        <div class="col-lg-9">                            <h1 data-text="Etkinlikler" class="content-textt">Etkinlikler</h1>                            <?php                                 $sqll = "SELECT * FROM img ORDER BY date DESC";                                $resultt = $mysqli->query($sqll);                                foreach ($resultt as $value) {?>                                    <div class="card "data-aos="fade-up">                                        <div class="container">                                           <div class="row">                                                <div class="col-lg-3">                                                    <img src="uploads/<?php echo $value['images'];?>" alt="">                                                </div>                                                <div class="col-lg-9">                                                    <h1 class="who">Yazar : <?php echo $value['user'];?></h1>                                                    <h1 class="date"><?php echo $value['date'];?></h1>                                                    <h1 class="head"><?php echo $value['baslik'];?></h1>                                                    <p class="texttt"><?php echo substr(stripslashes($value['icerik']),0,120);                                                        $abc = strlen($value['icerik']); if($abc>50){echo "...";}                                                    ?></p>                                                    <a  href="api.php?page_id=<?php echo $value['id']; ?>"  ><button style="margin: 25px 0" class=" ">İncele</button></a>                                                </div>                                           </div>                                        </div>                                    </div>                               <?php } ?>                        </div>                        <div class="col-lg-3">                            <div class="fefe" style="position: sticky; top: 100px">                                <?php include 'duyuru.php';?>                                <?php include 'haber.php';?>                            </div>                        </div>                    </div>                </div>                                               <?php include 'foother.php';?>            </div>        </div>    </div>    <?php include 'script.php'; ?>    <!-- The core Firebase JS SDK is always required and must be listed first --><script src="/__/firebase/8.5.0/firebase-app.js"></script><!-- TODO: Add SDKs for Firebase products that you want to use     https://firebase.google.com/docs/web/setup#available-libraries --><script src="/__/firebase/8.5.0/firebase-analytics.js"></script><!-- Initialize Firebase --><script src="/__/firebase/init.js"></script></body></html>