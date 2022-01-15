<?php
require APPROOT . '/views/includes/head.php';
?>

<div class ="container">
<h2 class="mt-3 mb-3">
              Thêm thông tin bài nhạc 
       </h2>
<form action="" method="post">
  <div class="mb-3">
    <label for="id" class="form-label">Id</label>
    <input type="int" class="form-control" name="id" value="">
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" value="">
  </div>
  <div class="mb-3">
    <label for="lyrics" class="form-label">lyrics</label>
    <input type="text" class="form-control" name="lyrics" value="">
  </div>
  <div class="mb-3">
    <label for="img" class="form-label">img</label>
    <input type="text" class="form-control" name="img" value="">
  </div>
  <div class="mb-3">
    <label for="src" class="form-label">Src</label>
    <input type="text" class="form-control" name="src" value="">
  </div>
  <div class="mb-3">
    <label for="cate_id" class="form-label">cate_id</label>
    <input type="int" class="form-control" name="cate_id" value="">
  </div>
  <div class="mb-3">
    <label for="sg_id" class="form-label">sg_id</label>
    <input type="text" class="form-control" name="diachi" value="">
  </div>
  <div class="mb-3">
    <label for="song_releasedate" class="form-label">song_releasedate</label>
    <input type="date" class="form-control" name="song_releasedate" value="">
  </div>
  <input type="submit" name="submit" value="Save" class="btn btn-primary">

</div>

<?php
require APPROOT . '/views/includes/footer.php';
?>