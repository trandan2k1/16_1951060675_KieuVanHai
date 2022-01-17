<?php
require APPROOT . '/views/includes/head.php';
?>
<?php
require APPROOT . '/views/includes/navigation.php';
?>
<div class="main-content">
       <div class="container">
              <h2 class="mt-3 mb-3">
                     Thêm Thông tin bài nhạc
              </h2>
              <form action="<?php echo URLROOT; ?>/admin/add/" method="POST">
                     <div class="mb-3">
                            <label for="id" class="form-label">Tên bài hát</label>
                            <input type="text" class="form-control" name="name" value=" ">
                     </div>
                     <div class="mb-3">
                            <label for="id" class="form-label">Ảnh</label>
                            <input type="text" class="form-control" name="img" value=" ">
                     </div>
                     <div class="mb-3">
                            <label for="id" class="form-label">Link nhạc</label>
                            <input type="text" class="form-control" name="src" value=" ">
                     </div>
                     <div class="mb-3">
                            <label for="id" class="form-label">Mã thể loại</label>
                            <input type="int" class="form-control" name="cate_id" value=" ">
                     </div>
                     <div class="mb-3">
                            <label for="id" class="form-label">Mã nghệ sĩ</label>
                            <input type="int" class="form-control" name="sg_id" value=" ">
                     </div>
                     <div class="mb-3">
                            <label for="id" class="form-label"> Ngày phát hành </label>
                            <input type="date" class="form-control" name="song_releasedate" value=" ">
                     </div>

                     <button id="submit" value="submit" type="submit" class="btn btn-success">Cập nhật</button>
              </form>
       </div>
</div>



<?php
require APPROOT . '/views/includes/footer.php';
?>