<?php
include_once('../model/helper.php');
$db = new Database();
?>


<!DOCTYPE html>
<html lang="en">
<base href="<?php echo Helper::get_url('Admincp/'); ?>">

<head>
    <meta charset="utf-8">
    <meta name=description content="">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link href="../public/admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../public/user/assets/css/loader.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <?php
    //$auth = new Auth_Basic();
    $view = filter_input(INPUT_GET, "v");
    $action = filter_input(INPUT_GET, "a");
    if (empty($view) || empty($action)) {
        $view = 'common';
        $action = 'admin';
    }

    $path = 'view/' . $view . '/' . $action . '.php';
    if (file_exists($path)) {
        include_once($path);
    } else {
        header('Location:../404.php');
    }
    ?>
    <div class="loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script src="../public/admin/js/sb-admin-2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../public/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
    selector: "textarea#myTextarea",
    plugins: "print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons",
    imagetools_cors_hosts: ["picsum.photos"],
    menubar: "file edit view insert format tools table help",
    toolbar: "undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl",
    toolbar_sticky: true,
    autosave_ask_before_unload: true,
    autosave_interval: "30s",
    autosave_prefix: "{path}{query}-{id}-",
    autosave_restore_when_empty: false,
    autosave_retention: "2m",
    image_advtab: true,
    link_list: [{
        title: "My page 1",
        value: "https://www.codexworld.com",
    }, {
        title: "My page 2",
        value: "https://www.xwebtools.com",
    }, ],
    image_list: [{
        title: "My page 1",
        value: "https://www.codexworld.com",
    }, {
        title: "My page 2",
        value: "https://www.xwebtools.com",
    }, ],
    image_class_list: [{
        title: "None",
        value: "",
    }, {
        title: "Some class",
        value: "class-name",
    }, ],
    importcss_append: true,
    templates: [{
        title: "New Table",
        description: "creates a new table",
        content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>',
    }, {
        title: "Starting my story",
        description: "A cure for writers block",
        content: "Once upon a time...",
    }, {
        title: "New list with dates",
        description: "New List with dates",
        content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>',
    }, ],
    template_cdate_format: "[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]",
    template_mdate_format: "[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]",
    height: 600,
    image_caption: true,
    quickbars_selection_toolbar: "bold italic | quicklink h2 h3 blockquote quickimage quicktable",
    noneditable_noneditable_class: "mceNonEditable",
    toolbar_mode: "sliding",
    contextmenu: "link image imagetools table",
});
</script>
<script>
$(document).ready(function() {
    $('#myTable').DataTable({
        "pageLength": 10,
        "lengthMenu": [5, 10, 15, 20, 25, 50],

    });
});
</script>
<script>
$(document).ready(function() {
    $('.myTable2').DataTable({
        "pageLength": 10,
        "lengthMenu": [5, 10, 15, 20, 25, 50],

    });
});
</script>
<script>
$(document).ready(function() {
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
});
</script>
<script>
$(window).on("load", function() {
    $(".loader-wrapper").fadeOut("slow");
});
</script>