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
                    <h3 class="mt-5">Bài hát yêu thích</h3>
                    <div class="line mt-3"></div>
                    <?php foreach ($data['favarite_song'] as $post) : ?>
                        <div class="newSong-item mt-3 mb-2 col-6">
                            <div class="row">
                                <div class="col-md-10">
                                    <a class="mb-1 mt-3" href="<?php echo URLROOT; ?>/songs/baihat/?id=<?php echo $post->id ?>"><?php echo $post->name ?></a>
                                    <a class="newSong_singer" href="<?php echo URLROOT; ?>/songs/nghesi/?id=<?php echo $post->sg_id ?>"><?php echo $post->sg_name ?></a>
                                </div>
                            </div>
                            <div class="line"></div>
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