<?php
require APPROOT . '/views/includes/head.php';
?>
<?php
require APPROOT . '/views/includes/navigation.php';
?>
<div class="main-content">
    <div class="container">
    <div class="row">
        <div class="col-8">
        <h3 class="mt-5"><?php echo $data['song']->name ?> - <?php echo $data['song']->sg_id ?></h3>
        </div>
    </div>
    </div>
</div>
<?php
require APPROOT . '/views/includes/footer.php';
?>