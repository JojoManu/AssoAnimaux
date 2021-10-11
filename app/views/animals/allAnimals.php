<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message'); ?>
<div class="row ">
    <div class="col-md-8">
        <h2>Tout nos animaux</h2>
    </div>
    <div class="col-md-4">
        <a class="btn btn-primary pull-right" href="<?php echo URLROOT; ?>/animals/add"><i class="fa fa-pencil"></i> Add Post</a>
    </div>
</div>
<?php foreach ($data['animals'] as $animal) : ?>
    <div class="card mb-3 mt-2">
        <div class="card-body">
            <h2 class="card-text"><?php echo  $animal->nom; ?></h2>
        </div>
        <p class="card-body">
            <?php echo  $animal->nom; ?>
        </p>
        <p class="card-title bg-light p-2 mb-3">
            Created on <?php echo  $animal->dateAjout; ?>
        </p>
        <a href="<?php echo URLROOT; ?>/animals/show/<?php echo $animal->id; ?>" class="btn btn-dark btn-block">More...</a>
    </div>
<?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>