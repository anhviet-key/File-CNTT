<style>
.img-profile {
    display: inline-block !important;
    width: 64px;
    height: 64px;
    border-radius: 50%;
    object-fit: cover;
}

.profile {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    color: #fff;
    font-size: 16px;
    font-weight: 700;
    cursor: pointer;
}

ul li a.active {
    color: #1eafed !important;
}
</style>

<div id="colorlib-page col-6">
    <div class="slidebar">
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
        <aside id="colorlib-aside" role="complementary" class="js-fullheight">
            <a href="index.php">
                <div class="top-author d-flex-center" style="cursor: pointer;">
                    <img src="public/user/assets/img/iOTEAM-logo.png" alt="" width="30%" height="40%">
                </div>
            </a>
            <div class="lglo-author d-flex-center">
                <?php
                if (!isset($_SESSION['user'])) { ?>
                <div class="button-container-1 mr-1">
                    <span class="mas-1">Đăng nhập</span>
                    <a href="account/dangnhap"> <button id='work' type="button" name="Hover"><i class="far fa-user"></i>
                            Đăng nhập</button></a>
                </div>
                <div class="button-container-3">
                    <span class="mas-2">Đăng ký</span>
                    <a href="account/dangky"> <button id='work' type="button" name="Hover"><i class="fas fa-user"></i>
                            Đăng ký</button></a>
                </div>
                <?php } else { ?>
                <?php if (isset($_SESSION['user']))
                        $idnd = $_SESSION['user'][0];
                    if (!empty($idnd)) {
                        $sql = "select * from user where idnd=:idnd";
                        $params = ["idnd" => $idnd];
                        $nguoidungs = Database::db_get_row($sql, $params);
                    } ?>
                <div class="profile">
                    <a href="?c=manage"><img class="img-profile" src="uploads/<?php echo $nguoidungs['anhnd'] ?>"
                            alt="images" style="border:1px solid gray"></a>
                    <div><?php echo $_SESSION['user'][3] ?></div>
                    <!-- <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;"> -->
                </div>
                <?php } ?>

            </div>
            <nav id="colorlib-main-menu" role="navigation">

                <ul>
                    <span style="margin-left: -3em;font-weight: 700">PAGES</span>
                    <li><a href="?c=khoahoc"><i class="fab fa-leanpub e-2"></i>Khóa học</a></li>
                    <li><a href="?c=baiviet"><i class="far fa-newspaper e-2"></i>Bài viết</a></li>
                    <li><a href="?c=taitro"><i class="fas fa-donate e-2"></i>Tài trợ</a></li>
                    <li><a href="?c=gioithieu"><i class="far fa-question-circle e-2"></i>Giới thiệu</a></li>
                    <li><a href="?c=lienhe"><i class="fas fa-file-signature e-2"></i>Liên hệ</a></li>
                </ul>
            </nav>
        </aside>
    </div>
    <script>
    function triggerClick(e) {
        document.querySelector('#profileImage').click();
    }

    function displayImage(e) {
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
    </script>
    <script type="text/javascript">
    let navLink = document.querySelectorAll('a');
    let currentLink = window.location.href;
    for (let i = 0; i < navLink.length; i++) {
        if (navLink[i] == currentLink) {
            navLink[i].classList.add('active');
        }
    }
    </script>