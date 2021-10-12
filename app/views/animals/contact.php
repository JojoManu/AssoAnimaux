<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card bg-light mt-5">
            <div class="card-header card-text">
                <div class="row">
                    <div class="col">
                        <h2 class="card-text">Edit Post</h2>
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT; ?>/posts" class="btn btn-light pull-right"><i class="fa fa-backward"></i> Back</a>
                    </div>

                </div>
            </div>

            <div class="card-body">
                <form method="post" action="<?php echo URLROOT; ?>/Animals/addReservation/<?php echo $data['id']; ?>">
                    <div class="form-group">
                        <label for="text">Votre message</label>
                        <textarea type="text" name="text" class="form-control form-control-lg"></textarea>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <input type="submit" class="btn btn-primary btn-block pull-left" value="Update Post">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>