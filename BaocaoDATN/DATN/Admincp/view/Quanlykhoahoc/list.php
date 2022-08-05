<title>Quản lý khóa học</title>
<?php
$sql = "select * from videos where idsub='$_GET[id]' order by idvd desc";
$video = Database::db_get_list($sql);

if (!empty($_GET["id"])) {
    $sl_bai =  Helper::input_value("sl_bai");
    $sql = "update categorysub set sl_bai=(select count(idvd) from videos where idsub='$_GET[id]') where idsub='$_GET[id]'";
    $params = [
        "sl_bai" => $sl_bai,
    ];
}
Database::db_execute($sql, $params);
?>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Khoá học</h1>
    <p class="mb-4">Lựa chọn một danh mục khoá học và thêm list video khoá học</a>.</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">QUẢN LÝ KHÓA HỌC</h6>
        </div>
        <!-- <div class="card-body"> -->
        <div class="table-responsive">
            <div class="col">
                <div class="col-sm-12 mt-2 mb-2">
                    <table class="table table-hover table-bordered" id="myTable">
                        <thead>
                            <tr class="Bg-primary text-white text-center">

                                <th class="text-danger">ID</th>
                                <th width="25%">TÊN VIDEO</th>
                                <th width="25%">video_url</th>
                                <th>ngaythemvd</th>
                                <th>ngaycapnhatvd</th>
                                <th class="text-center p-1" width="13%">
                                    <a href="<?php echo Helper::get_url("Admincp?c=addgg"); ?>"
                                        class="btn btn-primary bg-success d-block">Thêm <i class="fas fa-plus"></i></a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $idvd = 1;
                            if (!empty($video))
                                foreach ($video as $sp) :
                            ?>
                            <tr>
                                <td class="text-danger"><?php echo $idvd; ?></td>
                                <td><?php echo $sp['tenvd']; ?></td>
                                <td><?php echo $sp['video_url']; ?></td>
                                <td><?php echo $sp['ngaythemvd']; ?></td>
                                <td><?php echo $sp['ngaycapnhatvd']; ?></td>
                                <td class="text-center">
                                    <a href="<?php echo Helper::get_url("Admincp?c=editgg&id=" . $sp['idvd']); ?>"
                                        class="btn btn-outline-success text-danger">Sửa</a>
                                    <a href="<?php echo Helper::get_url("Admincp?c=deletegg&id=" . $sp['idvd']); ?>"
                                        class="btn btn-outline-danger">Xóa</a>
                                </td>
                            </tr>
                            <?php
                                    $idvd++;
                                endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>