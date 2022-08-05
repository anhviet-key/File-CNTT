<?php
$sql = "select * from tintuc order by idtt DESC";
$listtt = Database::db_get_list($sql);
?>


<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">

    <!-- Site title -->
    <title>Tin tức</title>
</head>

<body>
<?php
include'../DA_WebsLaptop/Admincp/view/common/dbconfig.php';
$items_per_page = $_GET['per_page']?$_GET['per_page']:6;
$current_page = $_GET['page']?$_GET['page']:1;
$offset = ($current_page-1)*$items_per_page;
$list = mysqli_query($connection,"SELECT * from tintuc order by idtt DESC limit ".$items_per_page." OFFSET ".$offset."");
$total_records = mysqli_query($connection,"select * from tintuc");
$total_records = $total_records->num_rows;
$total_page = ceil($total_records/$items_per_page);
?>
    <div class="wrapper box-layout">
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tin tức</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- blog main wrapper start -->
        <div class="blog-main-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog-wrapper-inner">
                            <div class="row">
                                <!-- start single blog item -->
                                <?php 
                                 if(!empty($listtt))
                                 foreach($listtt as $rows):
                                ?>
                                <div class="col-lg-4 col-md-6">
                                    <div class="blog-item mb-26">
                                        <div class="blog-thumb img-full fix">
                                            <a href="?c=chitiettintuc&id=<?php echo $rows["matt"]?>">
                                                <img src="uploads/<?php echo $rows['anhtt']; ?>" alt="" style="height: 250px">
                                            </a>
                                        </div>
                                        <div class="blog-content">
                                            <h3><a href="?c=chitiettintuc&id=<?php echo $rows["matt"]?>"><?php echo $rows['tieude']; ?></a></h3>
                                            <div class="blog-meta">
                                                <span class="posted-author">by: admin</span>
                                                <span class="post-date"><?php echo $rows['ngaythemtt']; ?></span>
                                            </div>
                                            <p><?php echo $rows['preview']; ?></p>
                                        </div>
                                        <a href="?c=chitiettintuc&id=<?php echo $rows["matt"]?>">đọc thêm <i class="fa fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <!-- end single blog item -->
                            </div>
                        </div>
                        <!-- start pagination area -->
                         <!-- start pagination area -->
                         <div class="paginatoin-area text-center pt-28">
                            <div class="row">
                                <div class="col-12">
                                    <ul class="pagination-box mb-3">
                                        <li>
                                        <?php 
                                                if($current_page > 0){
                                                    $pre_page = $current_page-1;
                                                }
                                            ?>
                                            <a class="Previous text-primary" href="?c=tintuc&per_page=<?=$items_per_page?>&page=<?=$pre_page?>">Trước</a>
                                        </li>
                                        <li><?php for($num = 1;$num<=$total_page;$num++){?>
                                                <?php if($num!=$current_page){?>
                                            <a class="text-success border pb-0 pt-0 rounded-circle" href="?c=tintuc&per_page=<?=$items_per_page?>&page=<?=$num?>"><?=$num?></a>
                                                <?php }else {?>
                                                    <a class="border pb-0 pt-0 rounded-circle bg-danger text-warning"><?=$num?></a>
                                                <?php } ?>
                                            <?php } ?>
                                        </li>
                                        <li>
                                            <?php 
                                                if($current_page < $total_page){
                                                    $next_page = $current_page+1;
                                                }
                                            ?>
                                            <a class="Next text-primary" href="?c=tintuc&per_page=<?=$items_per_page?>&page=<?=$next_page?>"> Kế tiếp </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- end pagination area -->
                        <!-- end pagination area -->
                    </div>
                </div>
            </div>
        </div>
        <!-- blog main wrapper end -->
    </div>
</body>
</html>