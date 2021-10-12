<?php require APPROOT . '/views/inc/header.php'; ?>
<?php foreach ($data['demandeClient'] as $demandeClient) : ?>
    <div class="card mb-3 mt-2">
        <div class="card-body">
            <h2 class="card-text"><?php echo  $demandeClient->contact; ?></h2>
        </div>
        <p class="card-body">
            <?php echo  $demandeClient->text; ?>
        </p>
        <p class="card-title bg-light p-2 mb-3">
            Ajouté le <?php echo  $demandeClient->dateAjout; ?>
        </p>
        <a href="<?php echo URLROOT; ?>/animals/show/<?php echo $demandeClient->id_animal; ?>" class="btn btn-dark btn-block">Voir l'animal concerné</a>
    </div>
<?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>