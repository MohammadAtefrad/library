<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>{{ config('layoutmain.name', 'Library') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Favicons -->
    {{-- <link href="/img/favicon.png" rel="icon"> --}}
    {{-- <link href="/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i"
        rel="stylesheet">

    <!--font-->
    <link href="/css/fontiran.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/lib/modal-video/css/modal-video.min.css" rel="stylesheet">

    <!-- Bootstrap css -->
    <link href="/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- serch box style files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="/css/main.css" rel="stylesheet" />

    <!-- Main Stylesheet File -->
    <link href={{ asset("/css/style.css") }} rel="stylesheet">

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
                    @auth
                    <li class="menu-has-children"><a href="">{{ Auth::user()->name }}</a>
                        <ul>
                            <li><a class="btn btn-xs" href="{{ route('user.index') }}">پروفایل کاربری</a></li>
                            <li>
                                <form action="{{route('logout')}}" method="post">
                                    {{ csrf_field() }}
                                    <button class="col-12 btn btn-xs btn-warning">خروج</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li><a href="/login">ورود</a></li>
                    @endauth
                </ul>
            </nav>
        </div>
    </header><!-- #header -->

    <div class="d-flex flex-column position-relative text-center justify-content-center align-items-center" style="top:49px;margin-bottom: 20px;">
        {{-- flash welcoming message --}}
        @if ($message=session('message'))
            <div class="col-12 my-0 alert alert-success">
                {{$message}}
            </div>
        @endif
        {{-- end message --}}
        {{-- <img class="img-fluid rounded" src="/img/newsletter-bg.jpg" style=""> --}}
        <img class="img-fluid rounded" src="/img/video-bg.jpg" style="">
        <div class="position-absolute text-white">
            {{-- search box --}}
            <div class="row col-10 col-md-10 mx-auto s003" style="dir:rtl">
                {{-- <h1>به کتابخانه ... خوش آمدید</h1> --}}
                <form class="bg-white rounded" method="post" action="{{ route('firstpage.search') }}">
                    {{ csrf_field() }}
                    <div class="inner-form">
                        <div class="input-field first-wrap">
                            <div class="input-select">
                                <select data-trigger="" name="category">
                                    <option value="books">کتاب ها</option>
                                    <option value="articles">مقالات</option>
                                    <option value="posts">اخبار</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-field second-wrap">
                            <input id="search" name="search" type="text" placeholder="کلمه مورد نظر خود را وارد کنید" />
                        </div>
                        <div class="input-field third-wrap">
                            <button class="btn-search rounded" type="submit">جستجو</button>
                        </div>
                    </div>
                </form>
            </div>
            {{-- end search box --}}
        </div>
    </div>
    {{-- content --}}
    <section id="blog" class="padd-section wow fadeInUp">
        <div class="container-fluid">
            @yield('content')
        </div>
    </section>

    <!--Hero Section-->
    {{-- <section id="hero" class="wow fadeIn">
        <div class="hero-container">
            <img src="/img/hero-img.png" alt="Hero Imgs">
        </div>
    </section><!-- #hero --> --}}

    <!-- Screenshots Section-->
    {{-- <section id="screenshots" class="padd-section text-center wow fadeInUp">
        <div class="container">
            <div class="section-title text-center">
                <h2>App Gallery</h2>
                <p class="separator">Integer cursus bibendum augue ac cursus .</p>
            </div>
        </div>
        <div class="container">
            <div class="owl-carousel owl-theme">

                <div><img src="/img/screen/1.jpg" alt="img"></div>
                <div><img src="/img/screen/2.jpg" alt="img"></div>
                <div><img src="/img/screen/3.jpg" alt="img"></div>
                <div><img src="/img/screen/4.jpg" alt="img"></div>
                <div><img src="/img/screen/5.jpg" alt="img"></div>
                <div><img src="/img/screen/6.jpg" alt="img"></div>
                <div><img src="/img/screen/7.jpg" alt="img"></div>
                <div><img src="/img/screen/8.jpg" alt="img"></div>
                <div><img src="/img/screen/9.jpg" alt="img"></div>
            </div>
        </div>
    </section> --}}

    <!--==========================
    Video Section
  ============================-->

    <!-- <section id="video" class="text-center wow fadeInUp">
    <div class="overlay">
      <div class="container-fluid container-full">

        <div class="row">
          <a href="#" class="js-modal-btn play-btn" data-video-id="s22ViV7tBKE"></a>
        </div>

      </div>
    </div>
  </section> -->

    <!--==========================
    Team Section
  ============================-->
    {{-- <section id="team" class="padd-section text-center wow fadeInUp">

        <div class="container">
            <div class="section-title text-center">

                <h2>Team Member</h2>
                <p class="separator">Integer cursus bibendum augue ac cursus .</p>

            </div>
        </div>

        <div class="container">
            <div class="row">

                <div class="col-md-6 col-md-4 col-lg-3">
                    <div class="team-block bottom">
                        <img src="/img/team/1.jpg" class="img-responsive" alt="img">
                        <div class="team-content">
                            <ul class="list-unstyled">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                            <span>manager</span>
                            <h4>Kimberly Tran</h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-md-4 col-lg-3">
                    <div class="team-block bottom">
                        <img src="/img/team/2.jpg" class="img-responsive" alt="img">
                        <div class="team-content">
                            <ul class="list-unstyled">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                            <span>manager</span>
                            <h4>Kimberly Tran</h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-md-4 col-lg-3">
                    <div class="team-block bottom">
                        <img src="/img/team/3.jpg" class="img-responsive" alt="img">
                        <div class="team-content">
                            <ul class="list-unstyled">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                            <span>manager</span>
                            <h4>Kimberly Tran</h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-md-4 col-lg-3">
                    <div class="team-block bottom">
                        <img src="/img/team/4.jpg" class="img-responsive" alt="img">
                        <div class="team-content">
                            <ul class="list-unstyled">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                            <span>manager</span>
                            <h4>Kimberly Tran</h4>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!--==========================
    Testimonials Section
  ============================-->

    <section id="testimonials" class="padd-section text-center wow fadeInUp">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-8">

                    <div class="testimonials-content">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                            <div class="carousel-inner" role="listbox">

                                <div class="carousel-item  active">
                                    <div class="top-top">

                                        <h2>Our Users Speack volumes us</h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled it to
                                            make a type
                                            specimen book. It has survived not only five centuries.</p>
                                        <h4>Kimberly Tran<span>manager</span></h4>

                                    </div>
                                </div>

                                <div class="carousel-item ">
                                    <div class="top-top">

                                        <h2>Our Users Speack volumes us</h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled it to
                                            make a type
                                            specimen book. It has survived not only five centuries.</p>
                                        <h4>Henderson<span>manager</span></h4>

                                    </div>
                                </div>

                                <div class="carousel-item ">
                                    <div class="top-top">

                                        <h2>Our Users Speack volumes us</h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled it to
                                            make a type
                                            specimen book. It has survived not only five centuries.</p>
                                        <h4>David Spark<span>manager</span></h4>

                                    </div>
                                </div>

                            </div>

                            <div class="btm-btm">

                                <ul class="list-unstyled carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                </ul>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!--==========================
    Pricing Table Section
  ============================-->
    <section id="pricing" class="padd-section text-center wow fadeInUp">

        <div class="container">
            <div class="section-title text-center">

                <h2>Meet With Price</h2>
                <p class="separator">Integer cursus bibendum augue ac cursus .</p>

            </div>
        </div>

        <div class="container">
            <div class="row">

                <div class="col-md-6 col-lg-3">
                    <div class="block-pricing">
                        <div class="table">
                            <h4>basic</h4>
                            <h2>$29</h2>
                            <ul class="list-unstyled">
                                <li><b>4 GB</b> Ram</li>
                                <li><b>7/24</b> Tech Support</li>
                                <li><b>40 GB</b> SSD Cloud Storage</li>
                                <li>Monthly Backups</li>
                                <li>Palo Protection</li>
                            </ul>
                            <div class="table_btn">
                                <a href="#" class="btn"><i class="fa fa-shopping-cart"></i> Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="block-pricing">
                        <div class="table">
                            <h4>PERSONAL</h4>
                            <h2>$29</h2>
                            <ul class="list-unstyled">
                                <li><b>4 GB</b> Ram</li>
                                <li><b>7/24</b> Tech Support</li>
                                <li><b>40 GB</b> SSD Cloud Storage</li>
                                <li>Monthly Backups</li>
                                <li>Palo Protection</li>
                            </ul>
                            <div class="table_btn">
                                <a href="#" class="btn"><i class="fa fa-shopping-cart"></i> Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="block-pricing">
                        <div class="table">
                            <h4>BUSINESS</h4>
                            <h2>$29</h2>
                            <ul class="list-unstyled">
                                <li><b>4 GB</b> Ram</li>
                                <li><b>7/24</b> Tech Support</li>
                                <li><b>40 GB</b> SSD Cloud Storage</li>
                                <li>Monthly Backups</li>
                                <li>Palo Protection</li>
                            </ul>
                            <div class="table_btn">
                                <a href="#" class="btn"><i class="fa fa-shopping-cart"></i> Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="block-pricing">
                        <div class="table">
                            <h4>profeesional</h4>
                            <h2>$29</h2>
                            <ul class="list-unstyled">
                                <li><b>4 GB</b> Ram</li>
                                <li><b>7/24</b> Tech Support</li>
                                <li><b>40 GB</b> SSD Cloud Storage</li>
                                <li>Monthly Backups</li>
                                <li>Palo Protection</li>
                            </ul>
                            <div class="table_btn">
                                <a href="#" class="btn"><i class="fa fa-shopping-cart"></i> Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--========================== Blog Section  ============================-->
    <section id="blog" class="padd-section wow fadeInUp">

        <div class="container">
            <div class="section-title text-center">

                <h2>Latest posts</h2>
                <p class="separator">Integer cursus bibendum augue ac cursus .</p>

            </div>
        </div>

        <div class="container">
            <div class="row">

                <div class="col-md-6 col-lg-4">
                    <div class="block-blog text-left">
                        <a href="#"><img src="/img/blog/blog-image-1.jpg" alt="img"></a>
                        <div class="content-blog">
                            <h4><a href="#">whats isthe difference between good and bat typography</a></h4>
                            <span>05, juin 2017</span>
                            <a class="pull-right readmore" href="#">read more</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="block-blog text-left">
                        <a href="#"><img src="/img/blog/blog-image-2.jpg" class="img-responsive" alt="img"></a>
                        <div class="content-blog">
                            <h4><a href="#">whats isthe difference between good and bat typography</a></h4>
                            <span>05, juin 2017</span>
                            <a class="pull-right readmore" href="#">read more</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="block-blog text-left">
                        <a href="#"><img src="/img/blog/blog-image-3.jpg" class="img-responsive" alt="img"></a>
                        <div class="content-blog">
                            <h4><a href="#">whats isthe difference between good and bat typography</a></h4>
                            <span>05, juin 2017</span>
                            <a class="pull-right readmore" href="#">read more</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section> --}}

    <!--========================== Newsletter Section ============================-->
    <section id="newsletter" class="newsletter text-center wow fadeInUp">
        <div class="overlay padd-section">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-md-9 col-lg-6">
                        <form class="form-inline" method="POST" action="#">
                            <input type="email" class="form-control " placeholder="آدرس ایمیل" name="email">
                            <button type="submit" class="btn btn-default"><i class="fa fa-location-arrow"></i>اشتراک در
                                خبرنامه</button>
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

    <!--========================== Contact Section ============================-->
    <section id="contact" class="padd-section wow fadeInUp" style="direction:rtl">

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
                                <textarea class="form-control" name="message" rows="5" data-rule="required"
                                    data-msg="Please write something for us"
                                    placeholder="پیام خود را در این قسمت بنویسید"></textarea>
                                <div class="validation"></div>
                            </div>
                            <div class="text-center"><button type="submit">ارسال پیام</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- #contact -->

    <!--==========================Footer============================-->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-4">
                    <div class="footer-logo text-right">
                        <a class="navbar-brand" href="#">...کتابخانه</a>
                        <p>کتابخانه ... محلی برای اشتراک کتابهای ناب با شماست. ما همچون شما علاقه مند به منابع معتبر و
                            ارزشمند ادبی هستیم. امیدواریم ساعات خوشی را در کنا ر یکدیگر سپری کنیم.</p>
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
