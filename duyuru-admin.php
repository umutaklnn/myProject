<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'header.php' ?>
    <link rel="stylesheet" href="css/style.css">
    <title>Admin Paneli</title>
</head>
<body>
    
    <div class="container admin-p">
        <div class="row">
            <?php include 'header-admin.php';?>
            <div class="col-lg-9 no-padding">
                <div class="general-1">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-box">
                                    <h1>Yeni Duyuru Ekle</h1>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                            <form action="upload.php?addduyuru" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                  <input type="text" name="baslik"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Başlık">
                                </div>
                                <div class="form-group">
                                    <textarea name="icerik" class="hey" id="" placeholder="icerik" cols="70" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                  <input type="text"  name="user"class="form-control" id="exampleInputPassword1" placeholder="Kullanıcı">
                                </div>
                                <button type="submit" name="submit">YUKLE</button> 
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form >
        
    </form>
</body>
</html>