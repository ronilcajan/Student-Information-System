<?php if(isset($_GET['error'])): ?>
    <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
    <?php if($_GET['error'] == 1){?>
        <p><span class="text-danger"><small><strong><i class="fas fa-exclamation-triangle mr-1"></i>Error!</strong> Password did not match!</small></span></p>
    <?php }elseif($_GET['error'] == 2){?>
        <p><span class="text-danger"><small><strong><i class="fas fa-exclamation-triangle mr-1"></i>Error!</strong> The Password is still the same! Nothing change.!</small></span></p>
    <?php }elseif($_GET['error'] == 3){?>
        <p><span class="text-danger"><small><strong><i class="fas fa-exclamation-triangle mr-1"></i>Error!</strong> Username aready taken!</small></span></p>
    <?php }else{ ?>
        <p><span class="text-danger"><small><strong><i class="fas fa-exclamation-triangle mr-1"></i>Warning!</strong> Code Inscription already taken.</small></span></p>
        <?php }?>
        <button type="button" class="close btn-sm" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
     </div>
<?php endif; ?>

<?php if(isset($_GET['success'])): ?>
    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
    <?php if($_GET['success'] == 1){?>
        <p><span class="text-success"><small><strong><i class="fas fa-check mr-1"></i>Success!</strong> Password has been change.</small></span></p>
    <?php }elseif($_GET['success'] == 2){?>
        <p><span class="text-success"><small><strong><i class="fas fa-check mr-1"></i>Success!</strong> New user has been added.</small></span></p>
    <?php }elseif($_GET['success'] == 3){?>
        <p><span class="text-success"><small><strong><i class="fas fa-check mr-1"></i>Success!</strong> Student  has been added.</small></span></p>
    <?php }elseif($_GET['success'] == 4){?>
        <p><span class="text-success"><small><strong><i class="fas fa-check mr-1"></i>Success!</strong> Student  has been edited.</small></span></p>
    <?php }else{ ?>
        <p><span class="text-success"><small><strong><i class="fas fa-check mr-1"></i>Success!</strong> Excel imported.</small></span></p>
    <?php } ?>
        <button type="button" class="close btn-sm" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
     </div>
<?php endif; ?>

<?php if(isset($_GET['not_found'])): ?>
    <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
    <?php if($_GET['not_found']==1){?>
        <p><span class="text-danger"><small><strong><i class="fas fa-check mr-1"></i>Warning!</strong> Data not found.</small></span></p>
    <?php } ?>
    <button type="button" class="close btn-sm" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
     </div>
<?php endif; ?>