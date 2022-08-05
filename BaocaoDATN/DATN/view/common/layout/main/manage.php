<?php
if (!Role::is_user()) {
    Helper::redirect(Helper::get_url(''));
}
?>
<title>Profile iOTeam</title>

<?php
$idnd = $_SESSION['user'][0];
if (!empty($idnd)) {
    $sql = "select * from user where idnd=:idnd";
    $params = ["idnd" => $idnd];
    $nguoidungs = Database::db_get_row($sql, $params);
}

if (Helper::is_submit("edit_tv")) {
    $imgfile = "";
    $inputfile = "anhnd";
    if (Helper::upload_file_us($inputfile, $imgfile))
        $anhnd =  $imgfile;
    $email =  Helper::input_value("email");
    $matkhau =  md5(Helper::input_value("matkhau"));
    $hoten =  Helper::input_value("hoten");
    $bio_link =  Helper::input_value("bio_link");
    $faceb_link =  Helper::input_value("faceb_link");
    $sql = "update user set email=:email,matkhau=:matkhau,hoten=:hoten,anhnd=:anhnd,bio_link=:bio_link,faceb_link=:faceb_link where idnd=:idnd";
    $params = [
        "email" => $email,
        "matkhau" => $matkhau,
        "hoten" => $hoten,
        "bio_link" => $bio_link,
        "faceb_link" => $faceb_link,
        "idnd" => $idnd,
        "anhnd" => $anhnd
    ];

    if (Database::db_execute($sql, $params)) {
        Helper::redirect("#");
    }
}
?>
<div id="colorlib-main">
    <div class="bg-img-user"></div>
    <div class="wrapper-ac">
        <!-- <h3>Pure CSS Tabs</h3> -->
        <input type="radio" name="slider" checked id="home">
        <input type="radio" name="slider" id="favorite">
        <input type="radio" name="slider" id="note">
        <input type="radio" name="slider" id="other">
        <input type="radio" name="slider" id="about">
        <nav style="width:100%">
            <label for="home" class="home"><i class="fas fa-home"></i>Hồ sơ</label>
            <label for="note" class="note"><i class="fas fa-code"></i>Ghi chú</label>
            <div class="slider"></div>
        </nav>
        <section-ac>
            <?php if (isset($_SESSION['user']))
                $idnd = $_SESSION['user'][0];
            if (!empty($idnd)) {
                $sql = "select * from user where idnd=:idnd";
                $params = ["idnd" => $idnd];
                $nguoidungs = Database::db_get_row($sql, $params);
            } { ?>
            <div class="content content-1">
                <div class="wrapper-note">
                    <div class="row">
                        <div class="col-xl-6 col-md">
                            <Form method="post" action="" enctype="multipart/form-data">
                                <div class="img-group text-center">
                                    <img src="uploads/<?php echo $nguoidungs['anhnd'] ?>" alt="images"
                                        style="width: 200px;height: 200px;border-radius:100%;border:1px solid #ccc;object-fit:cover"
                                        id="profileDisplay">
                                    <input type="file" name="anhnd" onChange="displayImage(this)" id="anhnd"
                                        class="custom-file-input" required="required">
                                    <div style="font-size:30px;font-weight:700"><?php echo $nguoidungs['hoten'] ?></div>
                                    <!-- <div class="custom-file-label" onClick="triggerClick()" style="border: 1px solid green;padding:0 2em;cursor:pointer;background-color:#17a2b8;font-weight:500;">Ảnh đại diện</div> -->
                                    <label class="custom-file-label mb-5"
                                        style="position: static!important;cursor:pointer;" for="anhnd">Chọn hình đại
                                        diện</label>
                                </div>
                        </div>
                        <div class="col-xl-6 col-md" style="border-left:1px solid black">
                            <div class="page">
                                <label class="field field_v3">
                                    <input type="password" class="field__input" required name="matkhau" id="matkhau"
                                        value="<?php echo $nguoidungs["matkhau"]; ?>">
                                    <span class="field__label-wrap">
                                        <span class="field__label">Mật khẩu</span>
                                    </span>
                                </label>
                                <label class="field field_v3">
                                    <input class="field__input" name="email" id="email"
                                        placeholder="e.g. melnik909@ya.ru" value="<?php echo $nguoidungs['email'] ?>"
                                        required>
                                    <span class="field__label-wrap">
                                        <span class="field__label">E-mail</span>
                                    </span>
                                </label>
                                <label class="field field_v3">
                                    <input name="hoten" id="hoten" class="field__input" placeholder="e.g. melnik90"
                                        value="<?php echo $nguoidungs['hoten'] ?>" required>
                                    <span class="field__label-wrap">
                                        <span class="field__label">Họ tên</span>
                                    </span>
                                </label>
                                <label class="field field_v3">
                                    <input name="bio_link" id="bio_link" class="field__input"
                                        placeholder="e.g. melnik909/ya.bio"
                                        value="<?php echo $nguoidungs['bio_link'] ?>">
                                    <span class="field__label-wrap">
                                        <span class="field__label">Link Bio</span>
                                    </span>
                                </label>
                                <label class="field field_v3">
                                    <input name="faceb_link" id="faceb_link" class="field__input"
                                        placeholder="e.g. melnik909@ya/ru"
                                        value="<?php echo $nguoidungs['faceb_link'] ?>">
                                    <span class="field__label-wrap">
                                        <span class="field__label">Link FaceBook</span>
                                    </span>
                                </label>
                                <input type="hidden" name="action" value="edit_tv">
                                <input type="submit" value="Cập nhật">

                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="content content-3">
                <div class="wrapper-note">
                    <h3>Ghi chú</h3>
                    <div class="inputField">
                        <input type="text" placeholder="Thêm ghi chú mới">
                        <button><i class="fas fa-plus"></i></button>
                    </div>
                    <ul class="todoList">
                        <!-- data are comes from local storage -->
                    </ul>
                    <div class="footer-note">
                        <span>Bạn có <span class="pendingTasks"></span> ghi chú</span>

                        <button>Xóa hết</button>
                    </div>
                </div>
            </div>
        </section-ac>
    </div>
</div>

<script>
// getting all required elements
const inputBox = document.querySelector(".inputField input");
const addBtn = document.querySelector(".inputField button");
const todoList = document.querySelector(".todoList");
const deleteAllBtn = document.querySelector(".footer-note button");

// onkeyup event
inputBox.onkeyup = () => {
    let userEnteredValue = inputBox.value; //getting user entered value
    if (userEnteredValue.trim() != 0) { //if the user value isn't only spaces
        addBtn.classList.add("active"); //active the add button
    } else {
        addBtn.classList.remove("active"); //unactive the add button
    }
}

showTasks(); //calling showTask function

addBtn.onclick = () => { //when user click on plus icon button
    let userEnteredValue = inputBox.value; //getting input field value
    let getLocalStorageData = localStorage.getItem("New Todo"); //getting localstorage
    if (getLocalStorageData == null) { //if localstorage has no data
        listArray = []; //create a blank array
    } else {
        listArray = JSON.parse(getLocalStorageData); //transforming json string into a js object
    }
    listArray.push(userEnteredValue); //pushing or adding new value in array
    localStorage.setItem("New Todo", JSON.stringify(listArray)); //transforming js object into a json string
    showTasks(); //calling showTask function
    addBtn.classList.remove("active"); //unactive the add button once the task added
}

function showTasks() {
    let getLocalStorageData = localStorage.getItem("New Todo");
    if (getLocalStorageData == null) {
        listArray = [];
    } else {
        listArray = JSON.parse(getLocalStorageData);
    }
    const pendingTasksNumb = document.querySelector(".pendingTasks");
    pendingTasksNumb.textContent = listArray.length; //passing the array length in pendingtask
    if (listArray.length > 0) { //if array length is greater than 0
        deleteAllBtn.classList.add("active"); //active the delete button
    } else {
        deleteAllBtn.classList.remove("active"); //unactive the delete button
    }
    let newLiTag = "";
    listArray.forEach((element, index) => {
        newLiTag +=
            `<li>${element}<span class="icon" onclick="deleteTask(${index})"><i class="fas fa-trash"></i></span></li>`;
    });
    todoList.innerHTML = newLiTag; //adding new li tag inside ul tag
    inputBox.value = ""; //once task added leave the input field blank
}

// delete task function
function deleteTask(index) {
    let getLocalStorageData = localStorage.getItem("New Todo");
    listArray = JSON.parse(getLocalStorageData);
    listArray.splice(index, 1); //delete or remove the li
    localStorage.setItem("New Todo", JSON.stringify(listArray));
    showTasks(); //call the showTasks function
}

// delete all tasks function
deleteAllBtn.onclick = () => {
    let getLocalStorageData = localStorage.getItem("New Todo"); //getting localstorage
    if (getLocalStorageData == null) { //if localstorage has no data
        listArray = []; //create a blank array
    } else {
        listArray = JSON.parse(getLocalStorageData); //transforming json string into a js object
        listArray = []; //create a blank array
    }
    localStorage.setItem("New Todo", JSON.stringify(listArray)); //set the item in localstorage
    showTasks(); //call the showTasks function
}
</script>