<?php
require APPROOT . '/views/includes/head.php';
?>
<?php
require APPROOT . '/views/includes/navigation.php';
?>
<div class="main-content">
       <div class="container">
              <h2 class="mt-3 mb-3">
                     Sửa thông tin bài nhạc
              </h2>
              <form action="<?php echo URLROOT; ?>/admin/edit/?id=<?php echo ($data['song']->Id) ?>" method="POST">
                     <div class="mb-3">
                            <label for="id" class="form-label">Tên bài hát</label>
                            <input type="text" class="form-control" name="name" value="<?php
                                                                                    echo ($data['song']->name) ?>">
                     </div>
                     <div class="mb-3">
                            <label for="id" class="form-label">Ảnh</label>
                            <input type="text" class="form-control" name="img" value="<?php
                                                                                    echo ($data['song']->img) ?>">
                     </div>
                     <div class="mb-3">
                            <label for="id" class="form-label">Link nhạc</label>
                            <input type="text" class="form-control" name="src" value="<?php
                                                                                    echo ($data['song']->src) ?>">
                     </div>
                     <div class="mb-3">
                            <label for="id" class="form-label">Mã thể loại</label>
                            <input type="int" class="form-control" name="cate_id" value="<?php
                                                                                    echo ($data['song']->cate_id) ?>">
                     </div>
                     <div class="mb-3">
                            <label for="id" class="form-label">Mã nghệ sĩ</label>
                            <input type="int" class="form-control" name="sg_id" value="<?php
                                                                                    echo ($data['song']->sg_id) ?>">
                     </div>
                     <div class="mb-3">
                            <label for="id" class="form-label">Mã nghệ sĩ</label>
                            <input type="date" class="form-control" name="song_releasedate" value="<?php
                                                                                    echo ($data['song']->song_releasedate) ?>">
                     </div>

                     <button id="submit" value="submit" type="submit" class="btn btn-success">Cập nhật</button>
              </form>
       </div>
</div>

