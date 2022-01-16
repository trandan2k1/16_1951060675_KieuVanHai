
<header class="fixed-top">
  <nav class="navbar-nhacvn navbar navbar-expand-lg navbar-light">
    <div class="container">

      <a class="navbar-brand" href="<?php echo URLROOT; ?>/index">
        <img src="https://nhac.vn/web-v2/new-image/logo.png" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="ms-auto">
          <form class="d-flex">
            <input class="form-control input-search me-2" type="search" placeholder="Nhập từ khóa tìm kiếm" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Search</button>
          </form>
        </div>
        <div class="login-link ms-auto">
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item">
              <?php if (isset($_SESSION['user_id'])) : ?>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav me-5">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user-circle"></i>
                        <?php echo $_SESSION['username'] ?>
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/users/baihatyeuthich/">Nhạc yêu thích</a></li>
                        <!-- <li><a class="dropdown-item" href="#">Tài khoản</a></li> -->
                        <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/users/baihatdanghe/">Nghe gần đây</a></li>
                        <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/users/logout">Log out</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              <?php else : ?>
                <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Đăng nhập</a>
              <?php endif; ?>
            </li>
            <li class="nav-item">
              <?php if (isset($_SESSION['user_id'])) : ?>
              <?php else : ?>
                <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Đăng ký</a>
              <?php endif; ?>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </nav>
  <nav class="baihatNavbar navbar navbar-expand">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown me-5">
            <a class="nav-link dropdown-toggle" href="#" id="bxhDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Thể loại
            </a>
            <ul class="dropdown-menu" aria-labelledby="bxhDropdown">
              <li><a class="dropdown-item text-center fs-5"> Việt Nam</a></li>
              <?php foreach ($data['list_vn'] as $post) : ?>
                <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/songs/cate/?id=<?php echo $post->Id ?>"><?php echo $post->cate_name ?></a></li>
              <?php endforeach; ?>
            </ul>
          </li>
          <li class="nav-item dropdown me-5">
            <a class="nav-link " href="<?php echo URLROOT; ?>/songs/nghesi/">
              Nghệ sĩ
            </a>
          </li>
        </ul>
      </div>
    </div>
    </div>
  </nav>
</header>