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
                <h3 class="mt-5"><?php echo $data['song']->name ?> - 
                <a class="" href="<?php echo URLROOT; ?>/songs/nghe-si/?id=<?php echo $data['song']->sg_id ?>">
                <?php echo $data['song']->sg_name ?>
                </a>
            </h3>
                <p>Thể loại:
                    <a  href="<?php echo URLROOT; ?>/songs/nghe-si/?id=<?php echo $data['song']->cate_id ?>">
                    <?php echo $data['song']->cate_name ?>
                    </a>
                </p>
                <div class="song-box">
                    <div class="row">
                        <div class="col-4 song-menu">
                                <img class="rounded mx-auto d-block mb-4" src="https://nhac.vn/web-v2/auth/img/white_logo_notext.png" alt="">
                                <div class="mb-4">
                                    <img class="figure-img img-fluid rounded" src="<?php echo $data['song']->img ?>" alt="">
                                </div>
                        </div>
                        <div class="col-8">
                            <div class="song-play mx-auto">
                            <iframe width="360" height="200" src="<?php echo $data['song']->src ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lyric-box">
                    <h5 class="mt-5 mb-4">Lời bài hát</h5>
                    <?php echo $data['song']->lyrics ?>
                    <a class="link-success d-block" onclick="readmore()" id="myBtn">Xem tiếp</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require APPROOT . '/views/includes/footer.php';
?>