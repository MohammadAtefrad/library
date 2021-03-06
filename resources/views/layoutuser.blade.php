<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>پروفایل کاربری</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    {{-- <link href="/img/favicon.png" rel="icon"> --}}
    {{-- <link href="/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i"
        rel="stylesheet">
    
    <!-- Libraries CSS Files -->
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/lib/modal-video/css/modal-video.min.css" rel="stylesheet">
    <!-- Main Stylesheet File -->
    <link href="/css/style.css" rel="stylesheet">

    <!-- Bootstrap css -->
    <link href="/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="/css/fontiran.css" rel="stylesheet">
    <!-- Main Stylesheet File -->
    <link href="/css/style.css" rel="stylesheet">
    @yield('styles')
</head>

<body>
    <!-- header -->
    <header id="header" class="header header-hide">
        <div class="container">
            <div id="logo" class="pull-left">
                <h1><a href="#body" class="scrollto">کتابخانه</a></h1>
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="{{ route('firstpage.index') }}">خانه</a></li>
                    <li><a href="#about-us">درباره ما</a></li>
                    <li><a href="{{ route('book.allbooks') }}">کتاب ها</a></li>
                    <li><a href="{{ route('article.allarticles') }}">مقالات</a></li>
                    <li><a href="{{ route('post.allposts') }}">اخبار</a></li>
                    <li><a href="#contact">ارتباط با ما</a></li>
                    @if (auth::check())
                    <li class="menu-has-children"><a href="">{{ Auth::user()->name }}</a>
                        <ul>
                            <li><a class="btn btn-xs" href="{{ route('user.index') }}">پروفایل کاربری</a></li>
                            <li><form action="{{route('logout')}}" method="post">
                                    {{ csrf_field() }}
                                    <button class="col-12 btn btn-xs btn-warning">خروج</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                        <li><a href="/login">ورود</a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </header><!-- #header -->

    {{-- content --}}
    <section id="blog" class="padd-section wow fadeInUp">
        <div class="container-fluid">
            <div class="row">
                <!-- main -->
                @yield('content')
                <!-- Sidebar -->
                @include('user.sidebar')
                <!-- End sidebar -->
            </div>
        </div>
    </section>

    <!--==========================
    Newsletter Section
  ============================-->
  <section id="newsletter" class="newsletter text-center wow fadeInUp">
    <div class="overlay padd-section">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-6">
                    <form class="form-inline" method="POST" action="#">

                        <input type="email" class="form-control " placeholder="آدرس ایمیل" name="email">
                        <button type="submit" class="btn btn-default"><i class="fa fa-location-arrow"></i>اشتراک در خبرنامه</button>

                    </form>

                </div>
            </div>

            <ul class="list-unstyled">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>


        </div>
    </div>
</section>

<!--==========================
Contact Section
============================-->
<section id="contact" class="padd-section wow fadeInUp">

    <div class="container">
        <div class="section-title text-center">
            <h2>تماس با ما</h2>
            <p class="separator">خوشحال می شویم که نظرات و انتقادات خود را با در میان بگذارید</p>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-3 col-md-4">

                <div class="info">
                    <div>
                        <i class="fa fa-map-marker"></i>
                        <p>خیابان پیروزی<br>تهران, 4861754318</p>
                    </div>

                    <div class="email">
                        <i class="fa fa-envelope"></i>
                        <p>info@example.com</p>
                    </div>

                    <div>
                        <i class="fa fa-phone"></i>
                        <p>+9821111111</p>
                    </div>
                </div>

                <div class="social-links">
                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                </div>

            </div>

            <div class="col-lg-5 col-md-8">
                <div class="form">
                    <div id="sendmessage">Your message has been sent. Thank you!</div>
                    <div id="errormessage"></div>
                    <form action="" method="post" role="form" class="contactForm">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="نام"
                                data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="ایمیل"
                                data-rule="email" data-msg="Please enter a valid email" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="موضوع"
                                data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us"
                                placeholder="پیام خود را در این قسمت بنویسید"></textarea>
                            <div class="validation"></div>
                        </div>
                        <div class="text-center"><button type="submit">ارسال پیام</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section><!-- #contact -->

<!--==========================
Footer
============================-->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-4">
                <div class="footer-logo text-right">
                    <a class="navbar-brand" href="#">...کتابخانه</a>
                    <p >کتابخانه ... محلی برای اشتراک کتابهای ناب با شماست. ما همچون شما علاقه مند به منابع معتبر و ارزشمند ادبی هستیم. امیدواریم ساعات خوشی را در کنا ر یکدیگر سپری کنیم.</p>
                </div>
            </div>

            <div class="col-sm-6 col-md-3 col-lg-2">
                <div class="list-menu text-right">
                    <h4>پشتیانی</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">پشتیانی</a></li>
                        <li><a href="#">تحریریه</a></li>
                        <li><a href="#">سوالات متداول</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-6 col-md-3 col-lg-2">
                <div class="list-menu text-right">
                    <h4>تحریریه</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">پشتیانی</a></li>
                        <li><a href="#">تحریریه</a></li>
                        <li><a href="#">سوالات متداول</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-2">
                <div class="list-menu text-right">
                    <h4>سوالات متداول</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">پشتیانی</a></li>
                        <li><a href="#">تحریریه</a></li>
                        <li><a href="#">سوالات متداول</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-6 col-md-3 col-lg-2">
                <div class="list-menu text-right">
                    <h4>تحریریه</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">پشتیانی</a></li>
                        <li><a href="#">تحریریه</a></li>
                        <li><a href="#">سوالات متداول</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <div class="copyrights">
        <div class="container">
            <p>&copy; کتابخانه ... . تمام حقوق محفوظ است</p>
        </div>
    </div>
</footer>

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<!-- JavaScript Libraries -->
<script src="/lib/jquery/jquery.min.js"></script>
<script src="/lib/jquery/jquery-migrate.min.js"></script>
<script src="/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/lib/superfish/hoverIntent.js"></script>
<script src="/lib/superfish/superfish.min.js"></script>
<script src="/lib/easing/easing.min.js"></script>
<script src="/lib/modal-video/js/modal-video.js"></script>
<script src="/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="/lib/wow/wow.min.js"></script>
<!-- Contact Form JavaScript File -->
<script src="/contactform/contactform.js"></script>

<!-- Template Main Javascript File -->
<script src="/js/main.js"></script>
<!-- search box -->
<script src="/js/extention/choices.js"></script>
<script>
    const choices = new Choices('[data-trigger]', {
        searchEnabled: false,
        itemSelectText: '',
    });

</script>
</body>

</html>
