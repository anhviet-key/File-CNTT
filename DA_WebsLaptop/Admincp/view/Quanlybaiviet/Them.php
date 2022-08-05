
<?php
// $sql = "select * from danhmuc";
// $tintucs = Database::db_get_list($sql);

if (Helper::is_submit("add_tintuc")) {
    $imgfile = "";
    $inputfile = "anhtt";
    $matt =  Helper::input_value("matt");
    $tieude =  Helper::input_value("tieude");
    $noidung =  Helper::input_value("noidung");
    $preview =  Helper::input_value("preview");
    if (Helper::upload_file($inputfile, $imgfile))
        $anhtt =  $imgfile;

    $sql = "insert into tintuc(matt,tieude,noidung,preview,anhtt) 
                 values(:matt,:tieude,:noidung,:preview,:anhtt)";
    $params = [
        "matt" => $matt,
        "tieude" => $tieude,
        "noidung" => $noidung,
        "preview"=> $preview,
        "anhtt" => $anhtt,
    ];

    if (Database::db_execute($sql, $params)) {
        Helper::redirect("./?c=listtt");
    }
}
?>

    <div class="container">
        <div class="row">
            <div class="text-primary col-sm-12"><!--offset-sm-2-->
                <h1>Thêm bài viết</h1>
                <form  action="" method="post" id="add_form" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="add_tintuc">
                    
                    <div class="form-group text-left">
                        <label for="matt">Mã tin:</label>
                        <input type="text" class="form-control" name="matt" id="matt">
                    </div>
                    <div class="form-group text-left">
                        <label for="tieude">Tiêu đề:</label>
                        <input type="text" class="form-control" name="tieude" id="tieude">
                    </div>
                    <div class="form-group text-left">
                        <label for="noidung">Nội dung:</label>
                        <textarea class="form-control summernote" rows="5" name="noidung" id="noidung"></textarea>
                    </div>
                    <div class="form-group text-left">
                        <label for="preview">preview:</label>
                        <textarea class="form-control summernote" rows="5" name="preview" id="preview"></textarea>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="anhtt" id="anhtt">
                        <label class="custom-file-label" for="anhtt">Chọn ảnh</label>
                    </div>
                    <input type="submit" class="btn btn-primary mt-3" value="Thêm bài viết">
                    <br>
                    <p class="mt-5"><a href="?c=listtt">Danh sách tin</a></p>
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