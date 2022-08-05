<title>Khóa học</title>
<style>.col{display:none;}</style>
<?php 
    if(isset($_POST['Timkiem']))
        $tukhoa = $_POST['tukhoa'];
        $sql = "SELECT * FROM categorysub where tensub LIKE '%".$tukhoa."%'";
        $list = Database::db_get_list($sql);
        if(empty($tukhoa)){           
            Helper::redirect(Helper::get_url('index.php'));
        }
        if(empty($list)){
            echo '<script>
            swal({
                title: "Xin lỗi!",
                text: "Không có dữ liệu về từ khóa",
                icon: "warning",
                button: "Trở lại",
              });</script>';
              $sql = "SELECT * FROM categorysub order by idsub DESC";
              $list = Database::db_get_list($sql);
        }
 ?>
<div id="colorlib-main">
    <div class="row">
        <div class="col-12">
            <div class="bg-images" style="background-image:url(public/user/assets/img/code.jpg);">
            <h3 class="title-heading">Tất cả khóa học</h3>
            <p class="title-heading">Hàng trăm khóa học miễn phí được xây dựng bởi iOTeam và cộng đồng!</p>
            </div>
        </div>
        <!-- start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Từ khóa: <span class="text-success"><?php echo $_POST['tukhoa'];?></span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end -->
    </div>
        <div class="row mb-5 ml-1 mr-1">
        <?php 
            if(!empty($list))
            foreach($list as $rows):
        ?>
	    <div class="col col-xl-3 col-lg-4 col-md-4 grid mt-5">
        <div class="grid-front">
        <div class="grid-rank">3</div>
        <div class="con_tai_ner">
            <img class="grid-thumbnail" src="uploads/<?php echo $rows['anhnd']; ?>" alt="" style="width:640px;height:210px;object-fit:revert;">
            <div class="back__alow">
                <button class="btn--courses mx-6"><i class="fas fa-video mr-1"></i> Giới thiệu</button>
                <a href='?c=listvideo&id=<?php echo $rows["idsub"]?>'><button class="btn--courses mx-6 ml-1"><i class="far fa-caret-square-right"></i> Học nhanh</button></a>
            </div>
            </div>
            <a href='?c=listvideo&id=<?php echo $rows["idsub"]?>' title="hello">
            <div class="pd--sub">
            <div class="text-warning font-size-sm">
            <i class="fa fa-fw fa-star"></i>
            <i class="fa fa-fw fa-star"></i>
            <i class="fa fa-fw fa-star"></i>
            <i class="fa fa-fw fa-star"></i>
            <i class="fa fa-fw fa-star"></i>
            (5)
            </div>
            <p class="grid-name"><?php echo $rows['tensub'] ?></p>
            </a>
			<div class="btn__logo--iOTeam">From iOTeam</div>
            <div class="grid-stats">
                <p class="viewers"><i class="fas fa-book"></i> <b><?php echo $rows["sl_bai"]?></b> bài học</p>
				<p class="viewers"><i class="fas fa-eye"></i> <b><?php echo $rows["so_luot_xem"]?></b> lượt xem</p>
            </div>
            <div class="team--author">
                <span>Tác giả</span>
                <p class="icon--author"><img class="img-boder" src="public/user/assets/img/beauty.jpeg"></p>          
            </div>
        </div>
        </div>
        </div>
        <?php endforeach; ?>
	</div>
    <div class="d-flex-center">
    <button class="btn-more glow-on-hover mb-2" type="button">Xem thêm...</button>
    </div>
	</div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(".col").slice(0, 8).show()
        $(".btn-more").on("click", function(){
            $(".col:hidden").slice(0, 8).slideDown()
            if ($(".col:hidden").length == 0) {
                $(".btn-more").fadeOut('slow')
            }
        })
    </script>