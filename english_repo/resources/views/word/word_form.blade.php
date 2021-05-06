<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm từ mới</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        body{
            background-color: DarkSeaGreen;
            background-image: url('../images/special_cource_3.png'); 
            background-size: cover;
            background-position: center;
            font-family: sans-serif;
        }

        .wordform{
            width: 320px;
            height: 450px;
            background: #000;
            color: #fff;
            top: 50%;
            left: 50%;
            position: absolute;
            transform: translate(-50%,-50%);
            box-sizing: border-box;
            padding: 30px 30px; 
        }
        .wordform label{
            margin: 0;
            padding: 0;
            font-weight: bold;
        }


        .wordform input{
            width: 100%;
            margin-bottom: 15px;
        }

        .wordform input[type="text"]
        {
            border: none;
            border-bottom: 1px solid #fff;
            background: transparent;
            outline: none;
            height: 30px;
            color: #fff;
            font-size: 15px;
        }
        .wordform input[type="submit"]
        {
            border: none;
            outline: none;
            height: 35px;
            background: #fb2525;
            color: #fff;
            font-size: 18px;
            border-radius: 20px;
        }
        .wordform input[type="submit"]:hover
        {
            cursor: pointer;
            background: #ffc107;
            color: #000;
        }
        table{
            border-collapse:collapse;
            background-color:yellow;
            width:100%;
        }
        td{
            background-color:#fff;
        }
        table th, td{
            border:1px solid black;
        }
    </style>
</head>
 
<body >
<!-- <a href = "dashboard"><img src="" alt="icon" style=" width: 20px; height: 20px;">Quay lại</button></a> -->
<section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                        <div class="wordform">
    <form action={{url ('store_word') }} enctype="multipart/form-data" id="form1" method="post"  >
    @csrf
        <label >Từ:</label>
        <input type="text" id="fname" name="word" ><br>
        <label>Loại từ:</label>
        <input type="text" id="lname" name="type" ><br>
        <label>Nghĩa:</label>
        <input type="text" id="fname" name="mean" ><br>
        <label>Ảnh:</label>
        <input type="file" name="image" accept=".img,.png" ><br>
        <label>Phát âm:</label>
        <input type="file" name="sound" accept=".ogg,.flac,.mp3" ><br>
        <label>Ghi chú:</label>
        <input type="text" id="fname" name="note" ><br>
        <input type="submit" name="submit" class="btn btn-primary" value ="Thêm từ"/>
    </form>
</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="single-footer-widget footer_1">
                        <a href="#"> <img src="image_frontend/logo.png" alt=""> </a>
                        <h3> <i>Học, học nữa, học mãi </i> </h3>
                        
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-4">
                    <div class="single-footer-widget footer_2">
                        <h4>Đăng kí nhận bản tin</h4>
                        <p>Cập nhật thông tin một cách nhanh nhất để không bỏ lỡ thông báo mới nào về chúng tôi
                        </p>
                        <form action="#">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder='Enter email address'
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email address'">
                                    <div class="input-group-append">
                                        <button class="btn btn_1" type="button"><i class="ti-angle-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="social_icon">
                            <a href="#"> <i class="ti-facebook"></i> </a>
                            <a href="#"> <i class="ti-twitter-alt"></i> </a>
                            <a href="#"> <i class="ti-instagram"></i> </a>
                            <a href="#"> <i class="ti-skype"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-md-4">
                    <div class="single-footer-widget footer_2">
                        <h4>Kết nối với chúng tôi</h4>
                        <div class="contact_info">
                            <p><span> Địa chỉ :</span> Số 3 Duy Tân, Càu Giấy, Hà Nội </p>
                            <p><span> Điện thoại :</span> +84 328857765</p>
                            <p><span> Email : </span>nguyenliensera@gmail.com </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright_part_text text-center">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
<!-- Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> -->
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{asset('js/jquery-1.12.1.min.js')}}"></script>
    <!-- popper js -->
    <script src="{{asset('js/popper.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- easing js -->
    <script src="{{asset('js/jquery.magnific-popup.js')}}"></script>
    <!-- swiper js -->
    <script src="{{asset('js/swiper.min.js')}}"></script>
    <!-- swiper js -->
    <script src="{{asset('js/masonry.pkgd.js')}}"></script>
    <!-- particles js -->
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- swiper js -->
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>   

</body>
</html>
</x-app-layout>






















































































































































































































































































































































































































































































































        