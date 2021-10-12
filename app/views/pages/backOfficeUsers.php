<?php require APPROOT . '/views/inc/header.php'; ?>
<?php foreach ($data['users'] as $users) : ?>
    <div class="card mb-3 mt-2">
        <div class="card-body">
            <h2 class="card-text"><?php echo  $users->name; ?></h2>
        </div>
        <p class="card-body">
            <?php echo  $users->email; ?>
        </p>
        <p class="card-body">
            <?php if ($users->role === "1") {
                echo ("admin");
            } else {
                echo ("utilisateur normal");
            } ?>
        </p>
        <p class="card-title bg-light p-2 mb-3">
            Ajouté le <?php echo  $users->created_at; ?>
        </p>
        <a href="<?php echo URLROOT; ?>/pages/update/<?php echo $users->id; ?>/<?php echo $users->role ?>" class="btn btn-dark btn-block">Changer de rôle</a>
    </div>
<?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>