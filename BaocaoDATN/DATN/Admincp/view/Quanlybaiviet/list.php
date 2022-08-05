<?php
$tintucs = Database::db_get_list("select * from news order by idtt desc");
?>
<title>Quản Lý Bài viết</title>
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Bài viết</h1>
    <p class="mb-4">Quản lý tất cả bài viết</a>.</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">QUẢN LÝ BÀI VIẾT</h6>
        </div>
        <!-- <div class="card-body"> -->
        <div class="table-responsive">
            <div class="col mt-2 mb-2">
                <table class="table table-hover table-bordered" id="myTable">
                    <thead>
                        <tr class="Bg-primary text-white text-center">

                            <th class="text-danger">ID</th>
                            <th width="20%">TIÊU ĐỀ</th>
                            <!-- <th>NỘI DUNG</th> -->
                            <th>ẢNH BÌA</th>
                            <th width="35%">PREVIEW</th>
                            <th width="9%">MÃ TIN</th>
                            <th class="text-center p-1" width="13%">
                                <a href="<?php echo Helper::get_url("Admincp?c=addtt"); ?>"
                                    class="btn btn-primary bg-success d-block">Thêm bài viết</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $idtt = 1;
                        if (!empty($tintucs))
                            foreach ($tintucs as $tt) :
                        ?>

                        <tr>
                            <td class="text-danger"><?php echo $idtt; ?></td>
                            <td><?php echo $tt['tieude']; ?></td>
                            <!-- <td><?php echo $tt['noidung']; ?></td> -->
                            <td><img src="../uploads/<?php echo $tt['anhtt']; ?>"
                                    style="object-fit: cover;width: 100%;height: 80px;" class="img-thumbnail"></td>
                            <td><?php echo $tt['preview']; ?></td>
                            <td><?php echo $tt['matt']; ?></td>

                            <td class="text-center">
                                <a href="<?php echo Helper::get_url("Admincp?c=edittt&id=" . $tt['idtt']); ?>"
                                    class="btn btn-outline-success text-danger">Sửa</a>
                                <a href="<?php echo Helper::get_url("Admincp?c=deletett&id=" . $tt['idtt']); ?>"
                                    class="btn btn-outline-danger">Xóa</a>
                            </td>
                        </tr>
                        <?php
                                $idtt++;
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>