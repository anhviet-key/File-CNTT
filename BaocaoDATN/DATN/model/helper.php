<?php 
    ob_start();
    session_start();
    class Database{
        private static $dsn = 'mysql:host=localhost;dbname=learn;charset=utf8';
        private static $username = "root";
        private static $password = "";
        private static $con = null;
        public function __construct()
        {
           self::db_connect();
        }
        public static function db_connect()//phương thức tỉnh dùng seft
     {
         try{
            if(is_null(self::$con))
            {
               self::$con = new PDO(self::$dsn,self::$username,self::$password);
               self::$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
            }
         }catch(PDOException $e)
         {
           $error_message = $e->getMessage();
           include_once('../errors/database_error.php');
         }
     }

        public static function db_disconnect()
     {
        if(!is_null(self::$con))
        {
           self::$con = null;
        }

     }
        public function __destruct()
     {
         self::db_disconnect();
     }

        public static function db_execute($sql = '',$params = [])//thực hiện thêm sũa xóa
     {
        if(!is_null(self::$con))
        {
            $result = self::$con->prepare($sql);
            $result->execute($params);
            if($result->rowCount() > 0)
            {
                $result->closeCursor();
                return true;
            }
        }  
        return false;
     }

        public static function db_get_list($sql = '')//thực hiện danh sách
     {
        if(!is_null(self::$con))
        {
           $result = self::$con->prepare($sql);
           $result->execute();
           if($result->rowCount() > 0)
           {
              $rows = $result->fetchAll();
              $result->closeCursor();
              return $rows;
           }
        }
        return false;
     }
     public static function db_get_list_condition($sql = '',$params = [])
     {
        if(!is_null(self::$con))
        {
            $result = self::$con->prepare($sql);
            $result->execute($params);
            if($result->rowCount() > 0)
            {
               $rows = $result->fetchAll();
               $result->closeCursor();
               return $rows;
            }
        }
        return false;
     }

     public static function db_get_row($sql = '',$params = [])
      {
         if(!is_null(self::$con))
         {
            $result = self::$con->prepare($sql);
            $result->execute($params);
            if($result->rowCount() > 0) 
            {
              $row = $result->fetch();
              $result->closeCursor();
              return $row;
            }
         }
         return false;
      }

    }

    class Helper{
       public static function upload_video($inputfile, &$videofile)
    {
        if (!empty($_FILES[$inputfile])) {
            $check = getimagesize($_FILES[$inputfile]['tmp_name']);
            // Check if image file is a actual image or fake image and error upload file
            if (($_FILES[$inputfile]['error'] > 0) && $check === false) {
                return false;
            } else {
                $clientpath = $_FILES[$inputfile]['tmp_name'];
                $videofile = $_FILES[$inputfile]['name'];
                $extension = "." . strtolower(pathinfo($videofile, PATHINFO_EXTENSION));
                $allowed_extensions = array(".avi", ".flv", ".wmv", ".mov", ".mp4");
                $videonewfile = substr(md5($videofile),0,6) . $extension;
    
                if (in_array($extension, $allowed_extensions)) {
                    move_uploaded_file($clientpath, '../media/' . $videonewfile);
                    //image size
                    $size_allow = 9999;
                    $videofile = $videonewfile;
                    return true;
                } else {
                    echo "<script>alert('Phần mở rộng file không hợp lệ. Chỉ phần mở rộng avi/flv/wmv/mov/mp4 cho phép upload file !');</script>";
                    return false;
                }
            }
        } else {
            return false;
        }
        }
        public static function get_url($url = '')
        {
           $uri = filter_input(INPUT_SERVER,'REQUEST_URI',FILTER_SANITIZE_STRING);
           $app_path = explode('/',$uri);
           return 'http://' . $_SERVER['HTTP_HOST'] . '/' .$app_path[1] . '/' . $url;
        }
        
        public static function redirect($url)
        {
           header("Location:{$url}");
           exit();
        }
        public static function redirect_js($url)
	{
		if ($url) {
			echo '<script>window.location.href="' . $url . '"</script>';
		}
    }
        public static function input_value($inputname,$filter=FILTER_SANITIZE_STRING)
        {
            $value = filter_input(INPUT_POST,$inputname,$filter);
            if($value === NULL)
               $value = filter_input(INPUT_GET,$inputname,$filter);
            return $value;   
        }
  
        public static function is_submit($hidden)
        {
           return (!empty(self::input_value('action')) && self::input_value('action') == $hidden); //input_value->truyền vào tên điều kiển hc tham só trả về giá trị
        }

        public static function process_image($dir, $filename)
    {
        // Set up the variables
        $dir = $dir . DIRECTORY_SEPARATOR;
        $i = strrpos($filename, '.');
        $image_name = substr($filename, 0, $i);
        $ext = substr($filename, $i);

        // Set up the read path
        $image_path = $dir . DIRECTORY_SEPARATOR . $filename;

        // Set up the write paths
        $image_path_400 = $dir . $image_name . '' . $ext;
        // $image_path_100 = $dir . $image_name . '_100' . $ext;

        // Create an image that's a maximum of 400x300 pixels
        self::resize_image($image_path, $image_path_400, 500, 500);

        // Create a thumbnail image that's a maximum of 100x100 pixels
        // self::resize_image($image_path, $image_path_100, 100, 100);
    }

    public static function resize_image($old_image_path, $new_image_path,
    $max_width, $max_height) {

    // Get image type
    $image_info = getimagesize($old_image_path);
    $image_type = $image_info[2];

    // Set up the function names
    switch ($image_type) {
        case IMAGETYPE_JPEG:
            $image_from_file = 'imagecreatefromjpeg';
            $image_to_file = 'imagejpeg';
            break;
        case IMAGETYPE_GIF:
            $image_from_file = 'imagecreatefromgif';
            $image_to_file = 'imagegif';
            break;
        case IMAGETYPE_PNG:
            $image_from_file = 'imagecreatefrompng';
            $image_to_file = 'imagepng';
            break;
        default:
            echo 'File must be a JPEG, GIF, or PNG image.';
            exit;
    }

    // Get the old image and its height and width
    $old_image = $image_from_file($old_image_path);
    $old_width = imagesx($old_image);
    $old_height = imagesy($old_image);

    // Calculate height and width ratios
    $width_ratio = $old_width / $max_width;
    $height_ratio = $old_height / $max_height;

    // If image is larger than specified ratio, create the new image
    if ($width_ratio > 1 || $height_ratio > 1) {

        // Calculate height and width for the new image
        $ratio = max($width_ratio, $height_ratio);
        $new_height = round($old_height / $ratio);
        $new_width = round($old_width / $ratio);

        // Create the new image
        $new_image = imagecreatetruecolor($new_width, $new_height);

        // Set transparency according to image type
        if ($image_type == IMAGETYPE_GIF) {
            $alpha = imagecolorallocatealpha($new_image, 0, 0, 0, 127);
            imagecolortransparent($new_image, $alpha);
        }
        if ($image_type == IMAGETYPE_PNG || $image_type == IMAGETYPE_GIF) {
            imagealphablending($new_image, false);
            imagesavealpha($new_image, true);
        }

        // Copy old image to new image - this resizes the image
        $new_x = 0;
        $new_y = 0;
        $old_x = 0;
        $old_y = 0;
        imagecopyresampled($new_image, $old_image,
            $new_x, $new_y, $old_x, $old_y,
            $new_width, $new_height, $old_width, $old_height);

        // Write the new image to a new file
        $image_to_file($new_image, $new_image_path);

        // Free any memory associated with the new image
        imagedestroy($new_image);
    } else {
        // Write the old image to a new file
        $image_to_file($old_image, $new_image_path);
    }
    // Free any memory associated with the old image
    imagedestroy($old_image);
}
public static function upload_file_us($inputfile, &$imgfile)
{
    if (!empty($_FILES[$inputfile])) {
        $check = getimagesize($_FILES[$inputfile]['tmp_name']);
        // Check if image file is a actual image or fake image and error upload file
        if (($_FILES[$inputfile]['error'] > 0) && $check === false) {
            return false;
        } else {
            $clientpath = $_FILES[$inputfile]['tmp_name'];
            $imgfile = $_FILES[$inputfile]['name'];
            $extension = "." . strtolower(pathinfo($imgfile, PATHINFO_EXTENSION));
            $allowed_extensions = array(".jpg", ".jpeg", ".png", ".gif");
            $imgnewfile = substr(md5($imgfile),0,6) . $extension;

            if (in_array($extension, $allowed_extensions)) {
                move_uploaded_file($clientpath, 'uploads/' . $imgnewfile);
                //image size
                self::process_image('uploads/', $imgnewfile);
                $imgfile = $imgnewfile;
                return true;
            } else {
                echo "<script>alert('Phần mở rộng file không hợp lệ. Chỉ phần mở rộng jpg /jpeg/png/gif cho phép upload file !');</script>";
                return false;
            }
        }
    } else {
        return false;
    }

}
public static function upload_file($inputfile, &$imgfile)
{
    if (!empty($_FILES[$inputfile])) {
        $check = getimagesize($_FILES[$inputfile]['tmp_name']);
        // Check if image file is a actual image or fake image and error upload file
        if (($_FILES[$inputfile]['error'] > 0) && $check === false) {
            return false;
        } else {
            $clientpath = $_FILES[$inputfile]['tmp_name'];
            $imgfile = $_FILES[$inputfile]['name'];
            $extension = "." . strtolower(pathinfo($imgfile, PATHINFO_EXTENSION));
            $allowed_extensions = array(".jpg", ".jpeg", ".png", ".gif");
            $imgnewfile = substr(md5($imgfile),0,6) . $extension;

            if (in_array($extension, $allowed_extensions)) {
                move_uploaded_file($clientpath, '../uploads/' . $imgnewfile);
                //image size
                self::process_image('../uploads/', $imgnewfile);
                $imgfile = $imgnewfile;
                return true;
            } else {
                echo "<script>alert('Phần mở rộng file không hợp lệ. Chỉ phần mở rộng jpg /jpeg/png/gif cho phép upload file !');</script>";
                return false;
            }
        }
    } else {
        return false;
    }

}
    }

    class Session
{
   public static function set_session($key,$value) {
      $_SESSION[$key] = $value;
   }

   public static function get_session($key)
   {
      return isset($_SESSION[$key])?$_SESSION[$key]:false;
   }

   public static function delete_session($key)
   {
      if(isset($_SESSION[$key]))
      {
         $_SESSION[$key] = array();   // Clear session data from memory
         session_destroy($_SESSION[$key]);     // Clean up the session ID
      } 
   }
}

class Role extends Session
{ 
    public static function set_logged($email,$kieunguoidung,$hoten="") {
       self::set_session('token',
       ['email'=>$email,'kieunguoidung'=>$kieunguoidung,'hoten'=>$hoten]);
    }

    public static function set_logout() {
       self::delete_session('token');
    }

    public static function session_user_logged() {
       $user = self::get_session('token');
       return $user;
    }

    public static function is_admin() {
       $user = self::session_user_logged();
       if(!empty($user['kieunguoidung']) && intval($user['kieunguoidung']) == 1)
       {
          return true;
       }
       return false;
    }

    public static function get_current_username(){
       $user = self::session_user_logged();
       return (isset($user['hoten'])?$user['hoten']:'');
    }
    
    public static function get_current_typeuser()
    {
       $user = self::session_user_logged();
       return (isset($user['kieunguoidung'])?intval($user['kieunguoidung']):'');
    }
    public static function is_user() {
      $user = self::session_user_logged();
      if(!empty($user['kieunguoidung']) && intval($user['kieunguoidung']) == 2)
      {
         return true;
      }
      return false;
   }
}