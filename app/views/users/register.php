<?php
   require APPROOT . '/views/includes/head.php';
?>

<?php
    require APPROOT . '/views/includes/navigation.php';
?>

<div class="main-content">
  <div class="container">
    <form id="register-form"
                method="POST"
                action="<?php echo URLROOT; ?>/users/register">
      <div class="login-box">
        <div class="login-menu">
          <img
            class="rounded mx-auto d-block mb-4"
            src="https://nhac.vn/web-v2/auth/img/white_logo_notext.png"
            alt=""
          />
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"
              >Tên đăng nhập</label
            >
            <input
              type="text"
              class="form-control"
              name="username"
              aria-describedby="emailHelp"
            />
            <span class="invalidFeedback">
                <?php echo $data['usernameError']; ?>
            </span>
            <div id="emailHelp" class="form-text">VD:abc123</div>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input
              type="email"
              class="form-control"
              name="email"
              aria-describedby="emailHelp"
            />
            <span class="invalidFeedback">
                <?php echo $data['emailError']; ?>
            </span>
            <div id="emailHelp" class="form-text">VD:abcdef@gmail.com</div>
          </div>
          <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label"
              >Mật khẩu</label
            >
            <input type="password" class="form-control" name="password" />
            <span class="invalidFeedback">
                <?php echo $data['passwordError']; ?>
            </span>
          </div>
          <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label"
              >Nhập lại mật khẩu</label
            >
            <input type="password" class="form-control" name="confirmPassword" />
            <span class="invalidFeedback">
                <?php echo $data['confirmPasswordError']; ?>
            </span>
          </div>
          <div class="d-grid gap-2 mx-auto">
            <button id="submit" type="submit" class="btn btn-success">Đăng ký</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<?php
       require APPROOT . '/views/includes/footer.php';
    ?>

<!-- <div class="container-login">
    <div class="wrapper-login">
        <h2>Register</h2>

            <form
                id="register-form"
                method="POST"
                action="<?php echo URLROOT; ?>/users/register"
                >
            <input type="text" placeholder="Username *" name="username">
            <span class="invalidFeedback">
                <?php echo $data['usernameError']; ?>
            </span>

            <input type="email" placeholder="Email *" name="email">
            <span class="invalidFeedback">
                <?php echo $data['emailError']; ?>
            </span>

            <input type="password" placeholder="Password *" name="password">
            <span class="invalidFeedback">
                <?php echo $data['passwordError']; ?>
            </span>

            <input type="password" placeholder="Confirm Password *" name="confirmPassword">
            <span class="invalidFeedback">
                <?php echo $data['confirmPasswordError']; ?>
            </span>

            <button id="submit" type="submit" value="submit">Submit</button>

            <p class="options">Not registered yet? <a href="<?php echo URLROOT; ?>/users/register">Create an account!</a></p>
        </form>
    </div>
</div> -->
