<title>Giới thiệu</title>
<style>
.card {
    position: relative;
    width: 300px;
    height: 400px;
    background-color: #fff;
    transform-style: preserve-3d;
    transform: perspective(1000px);
    box-shadow: 10px 20px 40px rgba(0, 0, 0, .25);
    transition: 1s;
}

.card .imgBox {
    position: relative;
    width: 100%;
    height: 100%;
    z-index: 1;
    /* background-color:#000; */
    transition: 1s;
    transform-origin: left;
    transform-style: preserve-3d;
    box-shadow: 10px 20px 40px rgba(0, 0, 0, .25);
}

.card:hover {
    transform: translateX(50%);
}

.card:hover .imgBox {
    transform: rotateY(-180deg);
}

.card .imgBox img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transform-style: preserve-3d;
    backface-visibility: hidden;
}

.card .imgBox img:nth:child(2) {
    transform: rotateY(180deg);
}

.card .details {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    padding: 20px;
}

.card .details .content h2 {
    text-align: center;
    font-weight: 700;
    line-height: 1em;
}

.card .details .content h2 span {
    color: #e21212;
    font-size: .8em;
}

.card .details .content .social-icons {
    position: relative;
    display: flex;
    margin-top: 10px;
}

.card .details .content .social-icons a {
    display: inline-block;
    width: 35px;
    height: 35px;
    background-color: #333333;
    color: #fff;
    text-decoration: none;
    margin: 5px;
    font-size: 18px;
    transition: .2s;
    border-radius: 15%;


}

@media (max-width:996px) {
    .ssm-12 {
        padding: 2em;
        /* margin-right: -25em!important; */
    }

    .ssm-0 {
        display: none !important;
    }
}
</style>
<div id="colorlib-main">
    <div class="row">
        <div class="col-12">
            <div class="bg-images" style="background-image:url(public/user/assets/img/map.jpg);">
                <h3 class="title-heading d-flex-center" style="padding:2em 0 0 0!important">Giới thiệu</h3>
                <p class="title-heading d-flex-center" style="padding:2em 0 0 0!important">Chia sẻ kiến thức, cùng nhau
                    phát triển</p>
            </div>
        </div>
    </div>
    <div class="row mt-5">

        <div class="col-6 d-flex-center ssm-0">
            <div class="card">
                <div class="imgBox">
                    <img src="public/user/assets/img/beauty_1568080960684.jpeg" alt="">
                    <img src="public/user/assets/img/beauty_1568080960684.jpeg" alt="">
                </div>
                <div class="details d-flex-center">
                    <div class="content d-flex-center" style="flex-direction: column;">
                        <h2>Nguyễn Anh Việt</br><span>Founder</span></h2>
                        <div class="social-icons">
                            <a style="border-radius: 25%;" class="d-flex-center"
                                href="https://www.facebook.com/NguyenIAnhIViet"><i class="fab fa-facebook"></i></a>
                            <a style="border-radius: 25%;" class="d-flex-center"
                                href="https://twitter.com/Nguyen_Anh_Viet"><i class="fab fa-twitter"></i></a>
                            <a style="border-radius: 25%;" class="d-flex-center" href="#"><i
                                    class="fab fa-linkedin"></i></a>
                            <a style="border-radius: 25%;" class="d-flex-center" href="#"><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-about-12 ssm-12">
            <h3>Tầm nhìn</h3>
            <p>Với mong muốn mang đến kiến thức chất lượng, miễn phí cho mọi người, với tâm huyết phá bỏ rào cản kiến
                thức từ việc giáo dục thu phí.
                iOTeam đã lập nên trang website này để thế giới phẳng hơn. Bất cứ ai có mong muốn khai phá thế giới. Phá
                bỏ mọi thứ ngăn cản sự phát triển tất yếu bền vững của xã hội đều là Kter (Người sáng lập iOTeam).
                </br><b>GIÁO DỤC LÀ MIỄN PHÍ!</b></p>
            <hr>
            <p>
                Góp ý hoặc liên hệ cho iOTeam nếu bạn có nhu cầu về dịch vụ, quảng cáo hoặc những thắc mắc khác.
            </p>
        </div>
    </div>
</div>