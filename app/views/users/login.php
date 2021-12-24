<?php
   require APPROOT . '/views/includes/head.php';
?>


<?php
       require APPROOT . '/views/includes/navigation.php';
    ?>
    <div class="main-content">
        <div class="container">
        
        <div class="login-box">
            <div class="login-menu">
                <img class="rounded mx-auto d-block mb-4" src="https://nhac.vn/web-v2/auth/img/white_logo_notext.png" alt="">
                <form action="<?php echo URLROOT; ?>/users/login" method ="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nhập tên đăng nhập hoặc email</label>
    <input type="text" class="form-control" name="username" aria-describedby="emailHelp">
    <span class="invalidFeedback">
                <?php echo $data['usernameError']; ?>
            </span>
    <div id="emailHelp" class="form-text">VD:abc123, abcdef@gmail.com</div>
  </div>
  <div class="mb-4">
    <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
    <input type="password" class="form-control" name="password">
    <span class="invalidFeedback">
                <?php echo $data['passwordError']; ?>
            </span>
  </div>
  <div class="d-grid gap-2">
  <button id="submit" value="submit" type="submit" class="btn btn-success" aria-describedby="loginHelp">Đăng nhập</button>
  <?php  if (isset($_GET['Message'])) :?> 
    <p> Vui kiểm tra email đã đăng ký để lòng kích hoạt tài khoản </p>
    <?php else : ?>
   <div id="loginHelp" class="form-text">Chưa có tài khoản , hãy đăng ký</div>
    <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-primary">Đăng ký</a>
    <?php endif; ?>
</div>
</form>
            </div>
        </div>
        </div>
    </div>


<?php
       require APPROOT . '/views/includes/footer.php';
    ?>

<!-- <div class="container-login">
    <div class="wrapper-login">
        <h2>Sign in</h2>

        <form action="<?php echo URLROOT; ?>/users/login" method ="POST">
            <input type="text" placeholder="Username *" name="username">
            <span class="invalidFeedback">
                <?php echo $data['usernameError']; ?>
            </span>

            <input type="password" placeholder="Password *" name="password">
            <span class="invalidFeedback">
                <?php echo $data['passwordError']; ?>
            </span>

            <button id="submit" type="submit" value="submit">Submit</button>

            <p class="options">Not registered yet? <a href="<?php echo URLROOT; ?>/users/register">Create an account!</a></p>
        </form>
    </div>
</div> -->
