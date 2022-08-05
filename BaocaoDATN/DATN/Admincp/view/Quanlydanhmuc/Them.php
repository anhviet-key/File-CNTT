<?php
   if(Helper::is_submit("add"))
   {
      $codect =  Helper::input_value("codect");
      $tendm =  Helper::input_value("tendanhmuc");
      $sql = "insert into category(codect,tendm) values(:codect,:tendm)";
      $params = [
          "codect"=>$codect,
          "tendm"=>$tendm
      ];
      if(Database::db_execute($sql,$params))
      {
        Helper::redirect("./?c=listcat");//quay lại trang list
      }
   }
?>

<div id="wrapper">
<div id="content">
 <div class="container-fluid">
  <div class="row d-flex-center">
    <div class="col-lg-6">
        <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Thêm chuyên đề mới</h6>
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
<div class="container text-primary col-sm-12 mt-5">
    <form action="" method="POST">
    <div class="form-group text-left">
    <label for="codect">Mã chuyên đề :</label>
    <input type="codect" class="form-control" name="codect" id="codect" placeholder="Nhập mã chuyên đề..." required>
      </div>
      <div class="form-group text-left">
    <label for="tendanhmuc">Tên chuyên đề :</label>
    <input type="tendanhmuc" class="form-control" name="tendanhmuc" id="tendanhmuc" placeholder="Nhập tên chuyên đề..." required>
      </div>
      
       <div class="form-group text-left">
    <input type="hidden" name="action" value="add">
     </div>
     <div class="d-flex-center mb-6">
        <input type="submit" class="btn btn-primary mt-3 w-20" value="Thêm">
     </div>
  </form>
</div>
</div>
        <p class="btn btn-secondary btn-icon-split mt-5" style="margin-bottom: 6rem!important;">
            <span class="text-white-50">
             <i class="fas fa-angle-double-left"></i>
            </span>
            <span class="text" onclick="history.back(-1)">Quay lại</span>
        </p>
</div>
</div>
</div>
</div>
</div>