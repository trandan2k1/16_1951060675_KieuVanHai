<?php
require APPROOT . '/views/includes/head.php';
?>
<?php
require APPROOT . '/views/includes/navigation.php';
?>

<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="line"></div>
            <div class="col-8">
                <h3 class="mt-5 mb-3">Nghệ sỹ</h3>
                <div class="line mb-5"></div>
                <div class="row">
                    <?php foreach ($data['nghesi'] as $post) : ?>
                        <div class="col-3">
                            <div class="singerSong_item ">
                                <a href="<?php echo URLROOT; ?>/songs/nghesi/?id=<?php echo $post->id ?>">
                                    <img class="img-thumbnail rounded-circle" src="<?php echo $post->sg_img ?>" alt="">
                                </a>
                                <a class="" href="<?php echo URLROOT; ?>/songs/nghesi/?id=<?php echo $post->id ?>">
                                    <h5 class="text-center"><?php echo $post->sg_name ?></h5>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>




<?php
require APPROOT . '/views/includes/footer.php';
?>