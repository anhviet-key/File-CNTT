<title>Quản Lý Chuyên đề</title>
<?php
   $danhmucs = Database::db_get_list("select * from category order by iddm desc");
 ?>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Chuyên đề</h1>
    <p class="mb-4">Bạn hãy chọn 1 chuyên đề để lưu trữ những danh mục khoá học </a>.</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">QUẢN LÝ CHUYÊN ĐỀ</h6>
        </div>
        <!-- <div class="card-body"> -->
        <div class="table-responsive">
            <div class="col">
                <div class="col-sm-12 mt-2 mb-2">
                    <table class="table table-hover table-bordered">
                        <tr class="Bg-primary text-white text-center">
                            <th>ID</th>
                            <th>CODE</th>
                            <th>TÊN CHUYÊN ĐỀ</th>
                            <th class="text-center">
                                <a href="<?php echo Helper::get_url("Admincp?c=addcat"); ?>"
                                    class="btn btn-primary bg-success d-inline">Thêm mới <i class="fas fa-plus"></i></a>
                            </th>
                        </tr>
                        <?php 
                     $iddm = 1;
                     if(!empty($danhmucs)) 
                        foreach($danhmucs as $ds):
                     ?>
                        <tr>
                            <td><?php echo $iddm; ?></td>
                            <td><?php echo $ds['codect'];?></td>
                            <td><?php echo $ds['tendm'];?></td>

                            <td class="text-center">
                                <a href="<?php echo Helper::get_url("Admincp?c=editcat&id=" . $ds['iddm']); ?>"
                                    class="btn btn-outline-success text-danger">Sửa</a> &nbsp;&nbsp;
                                <a href="<?php echo Helper::get_url("Admincp?c=deletecat&id=" . $ds['iddm']);?>"
                                    class="btn btn-outline-danger">Xóa</a> &nbsp;&nbsp;
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
    </div>
</div>