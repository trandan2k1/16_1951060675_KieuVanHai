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
                <div class="newSong row">
                    <h3 class="mt-5">Thể loại:
                        <a class="" href="<?php echo URLROOT; ?>/songs/nghe-si/?id=<?php echo $data['song'][0]->cate_id ?>">
                        <?php echo $data['song'][0]->cate_name ?>
                        </a>
                    </h3>
                    <div class="line mt-3"></div>
                    <?php foreach ($data['song'] as $post) : ?>
                        <div class="newSong-item mt-3 mb-2 col-3">
                            <a href="<?php echo URLROOT; ?>/songs/baihat/?id=<?php echo $post->Id ?>">
                                <img class="img-fluid" src="<?php echo $post->img ?>" alt="">
                            </a>
                            <div class="">
                                <a class="mb-1 mt-3" href="<?php echo URLROOT; ?>/songs/baihat/?id=<?php echo $post->Id ?>"><?php echo $post->name ?></a>
                                <a class="newSong_singer" href="<?php echo URLROOT; ?>/songs/nghe-si/?id=<?php echo $post->sg_id ?>"><?php echo $post->sg_name ?></a>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



<?php
require APPROOT . '/views/includes/footer.php';
?>