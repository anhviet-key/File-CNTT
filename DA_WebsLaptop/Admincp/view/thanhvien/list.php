<?php
   $nguoidungs = Database::db_get_list("select * from nguoidung");
?>

<div class="container">
    <div class="row mt-3">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div>
    	<a href="<?php echo Helper::get_url("Admincp?c=addtv")?>">
    	<button class="btn btn-primary">
    	<span class="fas fa-plus"></span>
    	    Thêm thành viên
    	</button>
    	</a>
    </div>
    <div class="table-responsive mt-3">
	<caption><h3 class="text-primary">Danh sách thành viên</h3 class="text-danger"></caption>
	<table class="table fs-17" id="myTable">
			<thead>
				<tr>
	    			<th>TT</th>
	    			<th>Họ Tên</th>
	    			<th>Ngày tạo</th>
	    			<th>Ngày cập nhật</th>
	    			<th>Kiểu thành viên</th>
	    			<th>Trạng thái</th>
	    			<th>Hành động</th>
			    </tr>
			</thead>
			<tbody>
				<?php 
				   $stt = 1;
				   if(!empty($nguoidungs))
				   foreach($nguoidungs as $nguoidung){
				?>
				<tr>
					<td> 
						<?php  
						   echo $stt;
						?> 
					</td>
					<td>
					<?php echo $nguoidung['hoten'];?>
					<span  class="info_email fas fa-user-secret" data-toggle="popover" data-html="true" data-container="body" data-trigger="hover" title="Email thành viên !" data-content="<?php echo $nguoidung['email']; ?>" ></span>	
				    </td>
					<td><?php echo $nguoidung['ngaytaonguoidung']; ?></td>
					<td><?php echo $nguoidung['ngaycapnhatnguoidung']; ?></td>
					<td><?php echo ($nguoidung['kieunguoidung']==1)?'Admin':'User'; ?></td>
					<td>
					   <div class="m-b-7 m-r-20 flex-c-m">
						<input type="checkbox" name="chk_active" value="<?php echo $nguoidung['trangthai'];  ?>" <?php echo ($nguoidung['trangthai'] == 1)?'checked':''; ?> disabled style="zoom:1.5">
					   </div>
					</td>
					<td>
	    				<form class="frm_delete" action="<?php echo Helper::get_url("Admincp?c=deletetv&id=" . $nguoidung['idnd']); ?>" method="post">
	    				  <div class="m-t-10">
						  <a href="<?php echo Helper::get_url("Admincp?c=edittv&id=" . $nguoidung['idnd']); ?>"><span class="fas fa-user-edit"></span></a>
							<input type="hidden" name="idnd" value="<?php echo $nguoidung['idnd']; ?>">
	                        <input type="hidden" name="action" value="delete_user">
	                        <a class="btn_delete m-l-2" href="#" id=""><span class="far fa-trash-alt text-danger"></span>
	                        </a>
	    				  </div>
	    				</form>
					</td>
				</tr>
                   <?php $stt++; }?>
			</tbody>
		</table>
	</div>
        </div>
    </div>
</div>

<!-- JQuery định nghĩa bảng -->
<script>
	$(document).ready(function(){
		$('table').addClass('table-hover table-striped');
        $('table').css({border:"2px solid #007BFF"});
        $('thead').addClass('bg-primary');
        $('th').addClass('text-white border-0');
        $('td').addClass('align-middle');
        $('td:nth-child(1),th:nth-child(1)').addClass('text-center');
        
        // Xử lý submit cho điều khiển chk_active và btn_delte
		$('.btn_delete').click(function(){
			$(this).parent().parent().submit();
			 return false;
		});

		// $('.frm_delete').submit(function(){
		// 	if(!confirm('Bạn có chắc muốn xóa thành viên này không ?'))
		// 	{
		// 		return false;
		// 	}
		// 	$(this).append('<input type="hidden" name="redirect" value="'+ window.location.href +'">');
		// 	return true;
		// });

		//Xu ly tooltip voi Bootsrap 4
		$('.info_email').popover();
	});
</script>