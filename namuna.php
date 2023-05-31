
<?php 
    require "./include/boshi.php" ;
    require "baza.php";

    $buyruq=$pdo->prepare("SELECT * FROM images ORDER BY id DESC");
    $buyruq->execute();

    $img_olish=$buyruq->fetchAll();

?>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Album example</h1>
            <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        </div>
        </div>
    </section>
    <!-- ++++++++++++ -->
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach($img_olish as $olish): ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <?php echo "<img src='data:" . $olish['mime_type'] . ";base64," . base64_encode($olish['image_data']) . "' width=100% height=350>";?>
                            <div class="card-body">
                                <p class="card-text"><?php echo $olish['malumot'] ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Bog'lanish</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    
<?php require "./include/oxiri.php" ?>