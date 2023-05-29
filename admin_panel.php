<?php 
    require"baza.php"; 

    $m="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $img=$_FILES['image']['name'];
        $matn=$_POST['matn'];
        
        $buyruq= $pdo->prepare("INSERT INTO rasm (img_url,matn) VALUES (?,?)");
        $buyruq->execute([$img,$matn]);

        if( move_uploaded_file($_FILES['image']['tmp_name'],"images/".$_FILES['image']['name'])){
            $m="yaxshi";
        }else{
            $m="yomon";
        }
        
     }


    $buyruq=$pdo->prepare("SELECT * FROM kontakt ORDER BY id DESC");
    $buyruq->execute();

    $olish=$buyruq->fetchAll();

    if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['delete'])){
        $id=$_POST['post_id'];

        $buyruq=$pdo->prepare("DELETE FROM kontakt WHERE id= ?");
        $buyruq->execute([$id]);

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Document</title>

</head>
<body>
    <br><br><br>

    <form  method="post" action="" enctype="multipart/form-data">
        <input type="hidden" name="size" value="1000000">
        <div>
        <!-- <label for="formFileLg" class="form-label">Large file input example</label> -->
            <input class="form-control form-control-lg" name="image" type="file">
        </div>
        <div class="md-form mb-0">
            <input type="text" name="matn" class="form-control">
            <label class="">Your name</label>
        </div>
        <div class="text-center text-md-left">
            <input class="btn btn-primary" type="submit">
        </div>
    
    </form>
    
    <div class="container">
        <div class="px-4 py-5 my-5 text-center">
            <h1 class="display-5 fw-bold">XABARLAR</h1>
            <p class="lead mb-4">Mijozlar tomonidan kelgan,ma'lumot va xabarlar</p>
        </div>
        <div class="row align-items-md-stretch">
            <?php foreach($olish as $malumot): ?>
                <div class="col-md-6">
                    <div class="h-100 p-5 text-white bg-dark rounded-3">
                        <h6>Ism: <?php echo $malumot['ism'] ?></h6>
                        <h6>Email manzili: <?php echo $malumot['email'] ?></h6>
                        <h6>Telefon raqami: <?php echo $malumot['raqam'] ?></h6>
                        <h6>Xabar matni:</h6><p><?php echo $malumot['xabar'] ?></p>
                        <form method="post" action="">
                            <input type="hidden" name="post_id" value="<?php echo $malumot['id'] ?>">
                            <input type="hidden" name="delete">
                            <button class="btn btn-outline-light" type="submit">O'chirish</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div> 

    <!-- ++++++++++++++++ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
</body>
</html>


