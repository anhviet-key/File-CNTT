
<?php
$tintucs = Database::db_get_list("select * from tintuc");
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Quản Lý Tin Tức</title>

<div class="container">
<caption><h2 style="color: royalblue;">Quản lý tin tức</h2></caption>
    <div class="row">
        <table class="table table-hover table-bordered" id="myTable">
        <thead>
        <tr class="Bg-primary text-white text-center">
        
                    <th class="text-danger">ID</th>
                    <th>TIÊU ĐỀ</th>                 
                    <!-- <th>NỘI DUNG</th> -->
                    <th>ẢNH BÌA</th>
                    <th>PREVIEW</th>
                    <th>MÃ TIN TỨC</th>
                    <th class="text-center p-1">
                        <a href="<?php echo Helper::get_url("Admincp?c=addtt"); ?>" class="btn btn-primary bg-success d-block">Thêm bài viết</a>
                    </th>
                </tr>
        </thead>
        <tbody>
                <?php
                $idtt = 1;
                if (!empty($tintucs))
                    foreach ($tintucs as $tt) :
                ?>
                
                    <tr>
                        <td class="text-danger"><?php echo $idtt; ?></td>
                        <td><?php echo $tt['tieude']; ?></td>
                        <!-- <td><?php echo $tt['noidung']; ?></td> -->
                        <td><img src="../uploads/<?php echo $tt['anhtt']; ?>" width="80px"; class="img-thumbnail"></td>
                        <td><?php echo $tt['preview'];?></td>
                        <td><?php echo $tt['matt']; ?></td>

                        <td class="text-center">
                            <a href="<?php echo Helper::get_url("Admincp?c=edittt&id=" . $tt['idtt']); ?>" class="btn btn-outline-success text-danger">Sửa</a>
                            <a href="<?php echo Helper::get_url("Admincp?c=deletett&id=" . $tt['idtt']);?>" class="btn btn-outline-danger">Xóa</a>
                        </td>
                    </tr>
                <?php
                        $idtt++;
                    endforeach;
                ?>
        </tbody>
        </table>
    </div>
</div>