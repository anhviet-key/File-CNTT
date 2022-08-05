<?php
$sql = "select * from categorysub order by idsub DESC";
$listgg = Database::db_get_list($sql);
?>

<title>List Courses</title>
<style>
.cox {
    display: none;
    width: 280px !important;
}

.courses--img:hover {
    filter: brightness(50%);
    transition: .5s;
}
</style>
<div class="row" style="
    display: flex;
    justify-content: center;
    align-items: center;
">
    <?php if (!empty($listgg))
        foreach ($listgg as $rows) :
    ?>
    <div class="item__courses cox">
        <a href="?c=listgg&id=<?php echo $rows["idsub"] ?>">
            <div class="courses--img">
                <img src="../uploads/<?php echo $rows['anhnd'] ?>" alt="" style="object-fit:cover;">
                </p>
            </div>
        </a>
        <div class="courses__sub grid-name">
            <!-- //grid-name -->
            <?php echo $rows['tensub'] ?>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<div class="d-flex-center">
    <button class="btn-more glow-on-hover mb-4" type="button">Xem thêm...</button>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(".cox").slice(0, 8).show()
$(".btn-more").on("click", function() {
    $(".cox:hidden").slice(0, 8).slideDown()
    if ($(".cox:hidden").length == 0) {
        $(".btn-more").fadeOut('slow')
    }
})
</script>