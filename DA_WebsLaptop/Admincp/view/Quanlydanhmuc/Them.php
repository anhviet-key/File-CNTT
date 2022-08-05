<?php
   if(Helper::is_submit("add"))
   {
      $tendm =  Helper::input_value("tendanhmuc");
      $tt = Helper::input_value("thutu");
      $sql = "insert into danhmuc(tendm) values(:tendm)";
      $params = [
          "tendm"=>$tendm,
      ];
      if(!empty($tendm) && Database::db_execute($sql,$params))
      {
        Helper::redirect("./?c=listcat");//quay lại trang list
      }
   }
?>

<div class="container text-primary col-sm-6 Cbao">
<caption><h2>Thêm danh mục sản phẩm</h2></caption>
    <form action="" method="POST">
      <div class="form-group text-left">
    <label for="tendanhmuc">Tên danh mục :</label>
    <input type="tendanhmuc" class="form-control" name="tendanhmuc" id="tendanhmuc">
      </div>
       <div class="form-group text-left">
    <input type="hidden" name="action" value="add">
     </div>
    <button type="submit" class="btn btn-primary" value="Sữa danh mục sản phẩm">Thêm danh mục sản phẩm</button>
    <br>
    <p class="mt-5"><a href="?c=listcat">Trở lại danh mục</a></p>
  </form>
</div>