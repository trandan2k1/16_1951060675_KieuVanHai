<!-- <div style="color: red">
<?php echo $error; ?>
</div>
<form action="" method="post">
    Name:
    <input type="text"
           name="name"
           value="<?php
           echo isset($_POST['name']) ? $_POST['name'] : $book['name']?>"
    />
    <br />
    <input type="submit" name="submit" value="Update" />
</form> -->


<?php
require_once 'views/includes/head.php';
?>
<div class="container-fluid">
       <h2 class="mt-3 mb-3">
              Sửa thông tin bài nhạc 
       </h2>
<form action="" method="post">
  <div class="mb-3">
    <label for="id" class="form-label"></label>
    <input type="int" class="form-control" name="id" value="<?php
           echo isset($_POST['id']) ? $_POST['id'] : $songs['id']?>">
  </div>
  <div class="mb-3">
    <label for="name" class="form-label"></label>
    <input type="text" class="form-control" name="name" value="<?php
           echo isset($_POST['name']) ? $_POST['name'] : $songs['name']?>">
  </div>
  <div class="mb-3">
    <label for="lyrics" class="form-label"></label>
    <input type="text" class="form-control" name="lyrics" value="<?php
           echo isset($_POST['lyrics']) ? $_POST['lyrics'] : $songs['lyrics']?>">
  </div>
  <div class="mb-3">
    <label for="img" class="form-label"></label>
    <input type="text" class="form-control" name="img" value="<?php
           echo isset($_POST['img']) ? $_POST['img'] : $songs['img']?>">
  </div>
  <div class="mb-3">
    <label for="src" class="form-label"></label>
    <input type="text" class="form-control" name="src" value="<?php
           echo isset($_POST['src']) ? $_POST['src'] :$songs['src']?>">
  </div>
  <div class="mb-3">
    <label for="cate_id" class="form-label"></label>
    <input type="int" class="form-control" name="cate_id" value="<?php
           echo isset($_POST['cate_id']) ? $_POST['cate_id'] : $songs['cate_id']?>">
  </div>
  <div class="mb-3">
    <label for="sg_id" class="form-label"></label>
    <input type="text" class="form-control" name="sg_id" value="<?php
           echo isset($_POST['sg_id']) ? $_POST['sg_id'] : $songs['sg_id']?>">
  </div>

  <div class="mb-3">
    <label for="song_releasedate" class="form-label"></label>
    <input type="text" class="form-control" name="song_releasedate" value="<?php
           echo isset($_POST['song_releasedate']) ? $_POST['song_releasedate'] : $songs['song_releasedate']?>">
  </div>


  <input type="submit" name="submit" value="Update" class="btn btn-primary">
</form>
</div>