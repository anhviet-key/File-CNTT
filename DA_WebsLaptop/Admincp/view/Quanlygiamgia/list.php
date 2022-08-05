
<?php
$giamgias = Database::db_get_list("select * from giamgia,danhmuc where giamgia.iddm=danhmuc.iddm");
// $danhmucs = Database::db_get_list("select * from danhmuc");
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Quản lý sản phẩm giảm giá</title>

<div class="container">
<caption><h2 style="color: royalblue;">Quản lý sản phẩm giảm giá</h2></caption>
    <div class="row">
        <table class="table table-hover table-bordered" id="myTable">
        <thead>
        <tr class="Bg-primary text-white text-center">
        
                    <th class="text-danger">ID</th>
                    <th>TÊN SẢN PHẨM</th>
                    <th>HÌNH ẢNH</th>
                    <th>GIÁ SẢN PHẨM</th>
                    <th>SỐ LƯỢNG</th>
                    <th>DANH MỤC</th>
                    <th>GIÁ GIẢM</th>
                    <th>MÃ SẢN PHẨM</th>
                    <!-- <th>MÔ TẢ</th> -->
                    <th class="text-center p-1">
                        <a href="<?php echo Helper::get_url("Admincp?c=addgg"); ?>" class="btn btn-primary bg-success d-block">Thêm sản phẩm</a>
                    </th>
                </tr>
        </thead>
        <tbody>
                <?php
                $idgg = 1;
                if (!empty($giamgias))
                    foreach ($giamgias as $sp) :
                ?>
                
                    <tr>
                        <td class="text-danger"><?php echo $idgg; ?></td>
                        <td><?php echo $sp['tensp']; ?></td>
                        <td><img src="../uploads/<?php echo $sp['anhsp']; ?>" width="80px"; class="img-thumbnail"></td>
                        <td><?php echo number_format($sp['giasp'],0,',','.') ?></td>
                        <td><?php echo $sp['soluong'];?></td>
                        <td><?php echo $sp['tendm']; ?></td>
                        <td><?php echo number_format($sp['giagiam'],0,',','.') ?></td>
                        <td><?php echo $sp['magg']; ?></td>
                        <!-- <td><?php echo $sp['mota']; ?></td> -->

                        <td class="text-center">
                            <a href="<?php echo Helper::get_url("Admincp?c=editgg&id=" . $sp['idgg']); ?>" class="btn btn-outline-success text-danger">Sửa</a>
                            <a href="<?php echo Helper::get_url("Admincp?c=deletegg&id=" . $sp['idgg']);?>" class="btn btn-outline-danger">Xóa</a>
                        </td>
                    </tr>
                <?php
                        $idgg++;
                    endforeach;
                ?>
        </tbody>
        </table>
    </div>
</div>