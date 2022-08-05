<?php
      $iddm = intval(Helper::input_value("id"));
      if(!empty($iddm))
      {
         $sql = "select * from danhmuc where iddm = :iddm";
         $params = ["iddm"=>$iddm];
         $danhmucs = Database::db_get_row($sql,$params); 
      }

      if(Helper::is_submit("edit"))
        {
            $tendm =  Helper::input_value("tendanhmuc");
            $tt =  Helper::input_value("thutu");
            $sql = "update danhmuc set tendm = :tendm where iddm = :iddm";
            $params = [
                "tendm"=>$tendm,
                "iddm" => $iddm
            ];
            if(!empty($tendm) && Database::db_execute($sql,$params))
            {
              Helper::redirect("./?c=listcat");
            }
        }
      
?>

<div class="container text-primary col-sm-6 Cbao">
<caption><h2>Sữa danh mục sản phẩm</h2></caption>
    <form action="" method="POST">
      <div class="form-group text-left">
    <label for="tendanhmuc">Tên danh mục :</label>
    <input type="tendanhmuc" class="form-control" name="tendanhmuc" id="tendanhmuc" value="<?php echo $danhmucs["tendm"]; ?>">
      </div>
       <div class="form-group text-left">
    <input type="hidden" name="action" value="edit">
     </div>     
    <button type="submit" class="btn btn-primary" value="Sữa danh mục sản phẩm">Sửa danh mục sản phẩm</button>
    <br>
    <p class="mt-5"><a href="?c=listcat">Trở lại danh mục</a></p>
  </form>
</div>
