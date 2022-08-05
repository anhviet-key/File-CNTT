
<?php
   $danhmucs = Database::db_get_list("select * from danhmuc");
    // if(!empty($danhmucs))
    //     foreach($danhmucs as $dm)
    //         echo "Id: " . $dm['iddm'] . " Ten DM " . $dm['tendm']."<br>";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Quản lý danh mục</title>
   </head>
<body>
<div class="container">
<caption><h2 style="color: royalblue;" class="">Quản lý danh mục</h2></caption>
<div class="row">
        <div class="col-sm-12">
        <table class="table table-hover table-bordered">
      
        <tr class="Bg-primary text-white text-center">
        <th>ID</th>
        <th>TÊN DANH MỤC</th>
        <th class="text-center">
            <a href="<?php echo Helper::get_url("Admincp?c=addcat"); ?>" class="btn btn-primary bg-success d-inline">Thêm danh mục</a>
        </th>
        </tr>
        <?php 
        $iddm = 1;
        if(!empty($danhmucs)) 
         foreach($danhmucs as $ds):
      ?>
      <tr>
         <td><?php echo $iddm; ?></td>
         <td><?php echo $ds['tendm'];?></td>

         <td class="text-center">
            <a href="<?php echo Helper::get_url("Admincp?c=editcat&id=" . $ds['iddm']); ?>" class="btn btn-outline-success text-danger">Sửa</a> &nbsp;&nbsp;
            <a href="<?php echo Helper::get_url("Admincp?c=deletecat&id=" . $ds['iddm']);?>" class="btn btn-outline-danger">Xóa</a> &nbsp;&nbsp;
         </td>
      </tr> 
      <?php 
        $iddm++;
        endforeach;  
      ?>
     </table>
        </div>
</div>
</div>
   
</body>
</html>