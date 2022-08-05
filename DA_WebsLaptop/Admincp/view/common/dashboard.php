    <?php require 'dbconfig.php'; ?>
   <!-- Content Row -->
   <div class="row">

      <!-- Tin Tuc Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tin Tức</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">Số lượng: 
                     <?php 
                            
                            $query = "SELECT idtt from tintuc order by idtt";
                            $query_run = mysqli_query($connection,$query);
                            $row = mysqli_num_rows($query_run);
                            echo $row;                           
                        ?></div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-blog fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
      
      <!-- Nguoi Dung Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Người Dùng</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">Thành viên: 
                     <?php 
                            
                            $query = "SELECT idnd from nguoidung order by idnd";
                            $query_run = mysqli_query($connection,$query);
                            $row = mysqli_num_rows($query_run);
                            echo $row;                    
                        ?>
                     </div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-user fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Đơn Hàng Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Đơn Hàng</div>
                     <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                           <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Số lượng: 0</div>
                        </div>
                     </div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Thong Ke Doanh Thu Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Thống Kê Doanh Thu</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">Tổng: 0</div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Content Row -->