<?php
    if(isset($_SESSION['mensagem'])):
?>

<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php 
        echo $_SESSION['mensagem'];
        unset($_SESSION['mensagem']);
    ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<?php 
    unset($_SESSION['mensagem']);
    endif;
?>