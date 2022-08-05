<title>Quản lý danh mục khóa học</title>
<?php
$danhmucsub = Database::db_get_list("select * from categorysub,category where categorysub.iddm=category.iddm order by categorysub.idsub desc");
?>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Danh mục</h1>
    <p class="mb-4">Bạn xem danh mục thuộc loại nào của chuyên đề tạo ra 1 hoặc nhiều khoá học thuộc chuyên đề đó </a>.
    </p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DANH MỤC KHÓA HỌC</h6>
        </div>
        <!-- <div class="card-body"> -->
        <div class="table-responsive">
            <div class="col">
                <div class="col-sm-12 mt-2 mb-2">
                    <table class="table table-hover table-bordered" id="myTable">
                        <thead>
                            <tr class="Bg-primary text-white text-center">
                                <th>ID</th>
                                <th width="40%">TÊN KHÓA HỌC</th>
                                <th width="13%">ẢNH BÌA</th>
                                <th>CHUYÊN ĐỀ</th>
                                <!-- <th width="30%">GIỚI THIỆU</th> -->
                                <th class="text-center">
                                    <a href="<?php echo Helper::get_url("Admincp?c=addpro"); ?>"
                                        class="btn btn-primary bg-success d-inline">Thêm mới <i
                                            class="fas fa-plus"></i></a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                     $idsub = 1;
                     if (!empty($danhmucsub))
                        foreach ($danhmucsub as $dsub) :
                     ?>
                            <tr>
                                <td><?php echo $idsub; ?></td>
                                <td><?php echo $dsub['tensub']; ?></td>
                                <td><img src="../uploads/<?php echo $dsub['anhnd']; ?>"
                                        style="object-fit: cover;width:100%;height:80px;" class="img-thumbnail"></td>
                                <td><?php echo $dsub['tendm']; ?></td>
                                <!-- <td><php echo $dsub['mota']; ?></td> -->
                                <td class="text-center">
                                    <a href="<?php echo Helper::get_url("Admincp?c=editpro&id=" . $dsub['idsub']); ?>"
                                        class="btn btn-outline-success text-danger">Sửa</a> &nbsp;&nbsp;
                                    <a href="<?php echo Helper::get_url("Admincp?c=deletepro&id=" . $dsub['idsub']); ?>"
                                        class="btn btn-outline-danger">Xóa</a> &nbsp;&nbsp;
                                </td>
                            </tr>
                            <?php
                           $idsub++;
                        endforeach;
                     ?>
                            </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>