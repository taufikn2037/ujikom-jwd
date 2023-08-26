<?php include 'db/function_db.php'; ?>
<?php include 'layout/header.php'; ?>
<?php include 'layout/navbar.php'; ?>


<?php
$kamar = getAllDataKamar();
?>

<section class="py-5">
    <h1 class="text-center">Daftar Kamar</h1>
    <div class="container py-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($kamar as $tmp): ?>
            <div class="col">
                <div class="card h-100">
                    <img src="<?= $tmp['foto'] ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= $tmp['jenis_kamar'] ?>
                        </h5>
                        <p class="card-text">Rp.
                            <?= number_format($tmp['harga']) ?>
                        </p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="pesan.php?id_kamar=<?= $tmp['id_kamar'] ?>" class="btn btn-primary text-white">Pesan
                            tiket</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<?php include 'layout/footer.php'; ?>