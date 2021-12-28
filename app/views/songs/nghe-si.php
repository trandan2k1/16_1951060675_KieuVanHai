<?php
require APPROOT . '/views/includes/head.php';
?>
<?php
require APPROOT . '/views/includes/navigation.php';
?>

<div class="main-content">
    <div class="container">
        <div class="singer_banner mt-3 mb-3" style="background: url(<?php echo $data['song'][0]->sg_banner ?>);">
            
        </div>
        <div class="row">
            <div class="line"></div>
            <div class="col-8">
            <h3>Bài Hát</h3>
            <?php foreach ($data['song'] as $post) : ?>
                <div class="singerSong_item ">
                    <a class="mb-3 mt-3" href="<?php echo URLROOT; ?>/songs/baihat/?id=<?php echo $post->Id ?>"><?php echo $post->name ?></a>
                    <span> - </span>
                    <a class="newSong_singer" href="<?php echo URLROOT; ?>/songs/nghesi/?id=<?php echo $post->sg_id ?>"><?php echo $post->sg_name ?></a>
                </div>
                <div class="line"></div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>




<?php
require APPROOT . '/views/includes/footer.php';
?>