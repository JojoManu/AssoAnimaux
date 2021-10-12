<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row ">
    <div class="col-md-4">
        <a class="btn btn-primary pull-right" href="<?php echo URLROOT; ?>/animals"><i class="fa fa-backward"></i> Go Back</a>
    </div>
</div>
<div class="card mb-3 mt-2">
    <div class="card-body">
        <h2 class="card-text"><?php echo  $data['animal']->nom; ?></h2>
        <h5 class="card-text"><?php echo  $data['animal']->age; ?> ans</h5>
    </div>
    <p class="card-body">
        <?php echo  $data['animal']->description; ?>
    </p>
    <p class="card-title bg-light p-2 mb-3">
        Ajouté le <?php echo  $data['animal']->dateAjout; ?>
    </p>

    <?php if ($_SESSION['role'] === "0") : ?>
        <div class="row">
            <div class="col">
                <a href="<?php echo URLROOT; ?>/animals/addReservation/<?php echo $data['animal']->id; ?>" class="btn btn-dark btn-block">Contacté un admin</a>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($_SESSION['role'] === "1") : ?>
        <div class="row">
            <div class="col">
                <a href="<?php echo URLROOT; ?>/animals/edit/<?php echo $data['animal']->id; ?>" class="btn btn-dark btn-block">Edit</a>
            </div>
            <div class="col">
                <form class="pull-right" action="<?php echo URLROOT; ?>/animals/delete/<?php echo $data['animal']->id; ?>" method="post">
                    <input type="submit" class="btn btn-danger btn-block" value="Delete">
                </form>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>