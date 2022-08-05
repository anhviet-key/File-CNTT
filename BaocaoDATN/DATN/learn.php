<?php
include_once('model/helper.php');
$db = new Database();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="public/user/assets/css/learn.css">
    <link rel="stylesheet" href="public/user/assets/css/grids.css">
    <link rel="stylesheet" href="public/user/assets/css/loader.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet " href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css "
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer " />
    <link rel="icon" href="public/user/assets/img/iOTEAM-rel-icon.png">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <?php
    $view = filter_input(INPUT_GET, "v");
    $action = filter_input(INPUT_GET, "a");
    if (empty($view) || empty($action)) {
        $view = 'common';
        $action = 'home';
    }

    $path = 'view/' . $view . '/' . $action . '.php';
    if (file_exists($path)) {
        include_once($path);
    } else {
        header('Location:errors/404.php');
    }
    ?>
    <!-- loader -->
    <div class="loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>

    <script src="public/user/assets/js/jquery.min.js"></script>
    <script src="public/user/assets/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="public/user/assets/js/popper.min.js"></script>
    <script src="public/user/assets/js/aos.js"></script>
    <script src="public/user/assets/js/scrollax.min.js"></script>
    <script src="public/user/assets/js/jquery.stellar.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
    </script>
    <script src="public/user/assets/js/main.js"></script>
    <script src="public/user/assets/js/jquery.easing.min.js"></script>
    <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="public/user/assets/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="public/user/assets/js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="public/user/assets/js/scripts.js"></script>
    <script>
    $(document).ready(function() {
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    });
    </script>
    <script>
    $(window).on("load", function() {
        $(".loader-wrapper").fadeOut("slow");
    });
    </script>
</body>

</html>