<?php include("Header.php"); ?>
<?php include("Data.php"); ?>


<div class="container-xl" style="margin-top: 50px;">
    <div class="table-responsive">
        <div class="table-wrapper">
            <?php foreach ($flowers as $flower): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?= $flower['Name']; ?></h5>
                        <p class="card-text"><?= $flower['Infomation']; ?></p>
                    </div>
                    <img src="<?= $flower['Image']; ?>" class="card-img-top" alt="<?= $flower['Name']; ?>">

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>