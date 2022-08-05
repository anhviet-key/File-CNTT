
<?php

$idsp = intval(Helper::input_value("id"));
if(!empty($idsp))
{
   $sql = "select * from sanpham where idsp = :idsp";
   $params = ["idsp"=>$idsp];
   $sanphams = Database::db_get_row($sql,$params); 
}

if (Helper::is_submit("edit_category")) {
    $imgfile = "";
    $inputfile = "anhsp";
    $iddm =  Helper::input_value("iddm");
    $masp =  Helper::input_value("masp");
    $tensp =  Helper::input_value("tensp");
    $mota =  Helper::input_value("mota");
    if (Helper::upload_file($inputfile, $imgfile))
        $anhsp =  $imgfile;
    $giasp =  Helper::input_value("giasp");
    $giagiam =  Helper::input_value("giagiam");
    $soluong =  Helper::input_value("soluong");
    $sql = "update sanpham set masp=:masp,iddm=:iddm,tensp=:tensp,mota=:mota,anhsp=:anhsp,giasp=:giasp,soluong=:soluong where idsp = :idsp";
    $params = [
        "masp" => $masp,
        "iddm" => $iddm,
        "tensp" => $tensp,
        "mota" => $mota,
        "anhsp" => $anhsp,
        "giasp" => $giasp,
        "soluong" => $soluong,
        "idsp" => $idsp
    ];

    if (Database::db_execute($sql, $params)) {
        Helper::redirect("./?c=listpro");
    }
}
?>

    <div class="container">
        <div class="row">
            <div class="text-primary col-sm-12">
                <h1>Thêm Sản Phẩm</h1>
                <form  action="" method="post" id="add_form" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="edit_category">
                    <div class="form-group text-left">
                        <label for="sel1">Chọn Danh Mục:</label>
                        <select class="form-control" name="iddm">
                            <?php
                            $sqls = "select * from danhmuc";
                            $sanphamss = Database::db_get_list($sqls);
                            if (!empty($sanphamss))
                                foreach ($sanphamss as $spp) :
                            ?>
                                <option value="<?php echo $spp['iddm']; ?>">
                                    <?php echo $spp['tendm']; ?>
                                </option>
                            <?php
                                endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="form-group text-left">
                        <label for="masp">Mã Sản Phẩm:</label>
                        <input type="text" class="form-control" name="masp" id="masp" value="<?php echo $sanphams["masp"]; ?>">
                    </div>
                    <div class="form-group text-left">
                        <label for="tensp">Tên Sản Phẩm:</label>
                        <input type="text" class="form-control" name="tensp" id="tensp" value="<?php echo $sanphams["tensp"]; ?>">
                    </div>
                    
                    <div class="form-group text-left">
                        <label for="giasp">Giá Sản Phẩm:</label>
                        <input type="text" class="form-control" name="giasp" id="giasp" value="<?php echo $sanphams["giasp"]; ?>">
                    </div>
                    <div class="form-group text-left">
                        <label for="soluong">Số lượng:</label>
                        <input type="text" class="form-control" name="soluong" id="soluong" value="<?php echo $sanphams["soluong"]; ?>">
                    </div>
                    <div class="form-group text-left">
                        <label for="mota">Mô Tả Sản Phẩm:</label>
                        <textarea class="form-control summernote" rows="5" name="mota" id="mota" ><?php echo $sanphams["mota"]; ?></textarea>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="anhsp" id="anhsp">
                        <label class="custom-file-label" for="anhsp"><?php echo $sanphams["anhsp"];?></label>
                    </div>
                    <input type="submit" class="btn btn-primary mt-3" value="Sửa Sản Phẩm">
                    <br>
                    <p class="mt-5"><a href="?c=listpro">Danh sách sản phẩm</a></p>
                </form>
            </div>
        </div>
    </div>


<script>
    $(document).ready(function() {
        //Editor Summernote
        $('.summernote').summernote({
            height: 240, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after 
        });
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    });
</script>