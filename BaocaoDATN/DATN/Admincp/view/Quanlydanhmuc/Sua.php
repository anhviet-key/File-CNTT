<?php
      $iddm = intval(Helper::input_value("id"));
      if(!empty($iddm))
      {
         $sql = "select * from category where iddm = :iddm";
         $params = ["iddm"=>$iddm];
         $danhmucs = Database::db_get_row($sql,$params); 
      }

      if(Helper::is_submit("edit"))
        {
            $tendm =  Helper::input_value("tendanhmuc");
            $codect =  Helper::input_value("codect");
            $sql = "update category set codect=:codect,tendm = :tendm where iddm = :iddm";
            $params = [
                "codect"=>$codect,
                "tendm"=>$tendm,
                "iddm" => $iddm
            ];
            if(!empty($tendm) && Database::db_execute($sql,$params))
            {
              Helper::redirect("#");
            }
        }
?>
<div id="wrapper">
<div id="content">
 <div class="container-fluid">
  <div class="row">
    <div class="col-lg-6">
        <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Sửa chuyên đề mới</h6>
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
    <label for="tendanhmuc">Tên danh mục :</label>
    <input type="tendanhmuc" class="form-control" style="color: #f6c23e;" required
     name="tendanhmuc" id="tendanhmuc" value="<?php echo $danhmucs["tendm"]; ?>">
      </div>
      <div class="form-group text-left">
    <label for="codect">Nhập mã chuyên đề :</label>
    <input type="codect" class="form-control" style="color: #f6c23e;" required
     name="codect" id="codect" value="<?php echo $danhmucs["codect"]; ?>">
      </div>
       <div class="form-group text-left">
    <input type="hidden" name="action" value="edit">
     </div>     
     <div class="d-flex-center mb-6">
        <input type="submit" class="btn btn-primary mt-3 w-20" value="Cập nhật">
     </div>
  </form>
</div>
        </div>
              <p class="btn btn-secondary btn-icon-split">
                  <span class="text-white-50">
                  <i class="fas fa-angle-double-left"></i>
                  </span>
                  <span class="text" onclick="history.back(-1)">Quay lại</span>
              </p>
        </div>
        <div class="col-lg-6">
            <div class="card mb-5">
              <div class="card-header">
                  Danh sách chuyên đề
              </div>
              <!-- <div class="card-body"> -->
              <table class="table table-inverse">
                  <thead>
                      <tr class="cent">
                          <th>Mã CODE</th>
                          <th>Tên chuyên đề</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php
                    $danhmucs = Database::db_get_list("select * from category order by iddm desc limit 10");
                  ?>
                  <?php
                      $iddm = 1;
                      if (!empty($danhmucs))
                          foreach ($danhmucs as $ds) :
                      ?>
                          <tr>
                              <td><?php echo $ds['codect']; ?></td>
                              <td><?php echo $ds['tendm']; ?></td>
                          </tr>
                      <?php
                              $iddm++;
                          endforeach;
                      ?>
                  </tbody>
              </table>
          </div>
        </div>
        </div>
        </div>
        </div>
    </div>
