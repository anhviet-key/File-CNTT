<?php
if (!Role::is_admin()) {
    Helper::redirect(Helper::get_url('Admincp/?v=common&a=logout'));
}
?>
<link href="../public/admin/css/form.css" rel="stylesheet">
<div id="wrapper">
    <?php include_once('layout/slidebar.php') ?>
    <div id="content-wrapper" class="flex-column">
        <div>
            <?php include_once('layout/header.php') ?>
            <?php include_once('layout/main.php') ?>
            <?php include_once('layout/footer.php') ?>
        </div>
    </div>
</div>