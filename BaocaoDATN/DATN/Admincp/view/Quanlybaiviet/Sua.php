<?php

$idtt = intval(Helper::input_value("id"));
if (!empty($idtt)) {
    $sql = "select * from news where idtt = :idtt";
    $params = ["idtt" => $idtt];
    $tintucs = Database::db_get_row($sql, $params);
}

if (Helper::is_submit("edit_tintuc")) {
    $imgfile = "";
    $inputfile = "anhtt";
    $matt =  Helper::input_value("matt");
    $tieude =  Helper::input_value("tieude");
    $noidung =  $_POST['myTextarea'];
    $preview =  Helper::input_value("preview");
    if (Helper::upload_file($inputfile, $imgfile))
        $anhtt =  $imgfile;

    $sql = "update news set matt=:matt,tieude=:tieude,noidung=:noidung,preview=:preview,anhtt=:anhtt where idtt = :idtt";
    $params = [
        "idtt" => $idtt,
        "matt" => $matt,
        "tieude" => $tieude,
        "noidung" => $noidung,
        "preview" => $preview,
        "anhtt" => $anhtt
    ];

    if (Database::db_execute($sql, $params)) {
        Helper::redirect("./?c=listtt");
    }
}
?>

<div id="wrapper">
    <div id="content" class="w-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Sửa thông tin bài viết</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Lựa chọn:</div>
                                    <a class="dropdown-item" href="#">Sửa</a>
                                    <a class="dropdown-item" href="#">Xóa</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <div class="text-primary col-sm-12 mt-5">
                            <form action="" method="post" id="add_form" enctype="multipart/form-data">
                                <input type="hidden" name="action" value="edit_tintuc">
                                <div class="form-group text-left">
                                    <label for="matt">Mã Tin:</label>
                                    <input type="text" class="form-control" style="color: #f6c23e;" required name="matt"
                                        id="matt" value="<?php echo $tintucs["matt"]; ?>">
                                </div>
                                <div class="form-group text-left">
                                    <label for="tieude">Tiêu đề:</label>
                                    <input type="text" class="form-control" style="color: #f6c23e;" required
                                        name="tieude" id="tieude" value="<?php echo $tintucs["tieude"]; ?>">
                                </div>
                                <div class="form-group text-left">
                                    <label for="noidung">Nội dung:</label>
                                    <textarea class="form-control" required rows="5" name="myTextarea"
                                        id="myTextarea"><?php echo $tintucs["noidung"]; ?></textarea>
                                </div>

                                <div class="form-group text-left">
                                    <label for="preview">preview:</label>
                                    <textarea class="form-control" style="color: #f6c23e;border: 1px solid;" required
                                        rows="5" name="preview"
                                        id="preview"><?php echo $tintucs["preview"]; ?></textarea>
                                </div>

                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="anhtt" id="anhtt" required>
                                    <label class="custom-file-label"
                                        for="anhtt"><?php echo $tintucs["anhtt"]; ?></label>
                                </div>
                                <div class="d-flex-center">
                                    <input type="submit" class="btn btn-primary mt-3 w-20" value="Cập nhật">
                                </div>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
                <p class="btn btn-secondary btn-icon-split">
                    <span class="text-white-50">
                        <i class="fas fa-angle-double-left"></i>
                    </span>
                    <span class="text" onclick="history.back(-1)">Quay lại</span>
                </p>
            </div>
        </div>
    </div>