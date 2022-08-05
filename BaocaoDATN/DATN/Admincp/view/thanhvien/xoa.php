
<?php
   $idnd = intval(Helper::input_value("id"));
   if(!empty($idnd))
   {
      $sql = "select * from user where idnd = :idnd";
      $params = ["idnd"=>$idnd];
      $nguoidungs = Database::db_get_row($sql,$params);
      if ($nguoidungs['email'] == 'admin@gmail.com'){
       ?>
       <script language="javascript">
		    alert('Bạn không thể xóa Supper Admin được!');
		    window.location = '<?php echo Helper::input_value('./?c=listtv'); ?>';
	  </script> 
      }
    <?php
      }
      
   $sql = "delete from user where idnd = :idnd";
   $params = ["idnd"=>$idnd];
   if(Helper::is_submit("yes") && Database::db_execute($sql,$params))
   {
       Helper::redirect("./?c=listtv");
   }
  }
?>
<style>
    footer {display: none;}
</style>
<div style="text-align:center">
<h1 style='color:red;'>Cảnh báo!!!</h1>
<h1>Bạn có muốn xóa thành viên <?php echo "\" " . $nguoidungs["hoten"] . " \""; ?> này không ?</h1>
<form action="" method="post">
    <input type="hidden" name="action" value="yes">
    <input type="submit" value="Có" title="Có để tiếp tục" class="btn btn-danger col-sm-1">
    <a title="Không để trở lại" class="btn btn-success col-sm-1" onclick="history.back(-1)">Không</a>
</form>
</div>