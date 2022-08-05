
<?php
$sql = "select * from danhmuc";
$sanphams = Database::db_get_list($sql);

if (Helper::is_submit("add_product")) {
    $imgfile = "";
    $inputfile = "anhsp";
    $iddm =  Helper::input_value("iddm");
    $masp =  Helper::input_value("masp");
    $tensp =  Helper::input_value("tensp");
    $mota =  Helper::input_value("mota");
    if (Helper::upload_file($inputfile, $imgfile))
        $anhsp =  $imgfile;
    $giasp =  Helper::input_value("giasp");
    $soluong =  Helper::input_value("soluong");
    $sql = "insert into sanpham(masp,iddm,tensp,mota,anhsp,giasp,soluong) 
                 values(:masp,:iddm,:tensp,:mota,:anhsp,:giasp,:soluong)";
    $params = [
        "masp" => $masp,
        "iddm" => $iddm,
        "tensp" => $tensp,
        "mota" => $mota,
        "anhsp" => $anhsp,
        "giasp" => $giasp,
        "soluong" => $soluong
    ];

    if (Database::db_execute($sql, $params)) {
        Helper::redirect("./?c=listpro");
    }
}
?>

    <div class="container">
        <div class="row">
            <div class="text-primary col-sm-12"><!--offset-sm-2-->
                <h1>Thêm Sản Phẩm</h1>
                <form  action="" method="post" id="add_form" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="add_product">
                    <div class="form-group text-left">
                        <label for="sel1">Chọn Danh Mục:</label>
                        <select class="form-control" name="iddm">
                            <?php
                            if (!empty($sanphams))
                                foreach ($sanphams as $sp) :
                            ?>
                                <option value="<?php echo $sp['iddm']; ?>">
                                    <?php echo $sp['tendm']; ?>
                                </option>
                            <?php
                                endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="form-group text-left">
                        <label for="masp">Mã Sản Phẩm:</label>
                        <input type="text" class="form-control" name="masp" id="masp">
                    </div>
                    <div class="form-group text-left">
                        <label for="tensp">Tên Sản Phẩm:</label>
                        <input type="text" class="form-control" name="tensp" id="tensp">
                    </div>
                    
                    <div class="form-group text-left">
                        <label for="giasp">Giá Sản Phẩm:</label>
                        <input type="text" class="form-control" name="giasp" id="giasp">
                    </div>
                    <div class="form-group text-left">
                        <label for="soluong">Số lượng:</label>
                        <input type="text" class="form-control" name="soluong" id="soluong">
                    </div>
                    <div class="form-group text-left">
                        <label for="mota">Mô Tả Sản Phẩm:</label>
                        <textarea class="form-control summernote" rows="5" name="mota" id="mota"></textarea>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="anhsp" id="anhsp">
                        <label class="custom-file-label" for="anhsp">Chọn Sản Phẩm </label>
                    </div>
                    <input type="submit" class="btn btn-primary mt-3" value="Thêm Sản Phẩm">
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