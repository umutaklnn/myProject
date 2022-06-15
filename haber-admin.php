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
                                    <h1>Yeni Haber Ekle</h1>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                            <form action="upload.php?addnews" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                  <input type="text" name="baslik-new"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Haber Bağlığı">
                                </div>
                                <div class="form-group">
                                    <textarea name="icerik-new" class="hey" id="" placeholder="Haber İçeriği" cols="70" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                  <input type="text" name="yazar-new"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Haber Yazarı">
                                </div>
                                <button type="submit" class="btn btn-success  m-auto" name="submit">Yeni Haber Ekle</button> 
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