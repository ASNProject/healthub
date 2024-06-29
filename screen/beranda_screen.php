<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'> 
    <link rel="stylesheet" href="../style_new.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Beranda</title>
</head>
<body>
    <div class="container-fluid">
        <!-- Navbar -->
        <div class="container">
            <nav class="navbar">
                <div class="navbar-header">
                    <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="logo_item">
                        <div id="healtHub"><span id="health">Health</span><span id="hub">Hub</span></div>
                    </div>
                </div>
                <div id="navbarCollapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="beranda_screen.php">Beranda</a></li>
                        <li><a href="data_pasien_screen.php">Data Pasien</a></li>
                        <li><a href="chart_screen.php">Monitoring</a></li>
                    </ul>
                </div>
            </nav>
        </div>

        <!-- Content -->
        <div class="container">
            <div class=" content-area">
                <div class="row">
                    <div class="col-lg-6 col-xs-12 content-image">
                        <div class="content-box">Health Monitoring System</div>
                        <div class="content-text1">"Empower Your Health Journey with HealthHub: Where IoT Meets Wellness!"</div>
                        <p class="content-description">HealtHub adalah sistem inovatif yang mengintegrasikan teknologi Internet of Things (IoT) untuk mengoptimalkan pengalaman kesehatan Anda. Dengan pendekatan yang holistik, HealthHub menyediakan monitoring kesehatan yang canggih dan terintegrasi, memungkinkan Anda untuk secara aktif mengelola kondisi kesehatan Anda dengan lebih efektif. Sistem ini tidak hanya mengumpulkan data vital seperti suhu tubuh dan tingkat oksigen, tetapi juga memberikan analisis mendalam yang membantu dalam memantau dan meningkatkan kualitas hidup Anda secara keseluruhan. Dengan HealthHub, Anda dapat meraih kesejahteraan optimal dengan pemahaman yang lebih baik tentang kondisi kesehatan Anda, menghadirkan masa depan yang lebih sehat dan lebih baik.</p>
                        <div class=" container content-feature">
                            <h3 style="font-weight:bold;">Fitur HealtHub</h3>
                            <div class="row">
                                <div class="col-lg-5 col-md-5" style="margin: 10px">
                                    <div class="row">
                                        <div class="col-lg-4 content-box-icon">
                                            <img src="../assets/img/temperature.png" alt="" style="position: absolute; left: -6px; bottom: -6px;">
                                        </div>
                                        <div class="col-lg-8">
                                            <p class="content-box-title">Detak Jantung</p>
                                            <p class="content-box-subtitle">Menghitung detak jantung secara realtime</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5" style="margin: 10px">
                                    <div class="row">
                                        <div class="col-lg-4 content-box-icon">
                                            <img src="../assets/img/oxygen.png" alt="" style="position: absolute; left: -2px; bottom: -4px;">
                                        </div>
                                        <div class="col-lg-8">
                                            <p class="content-box-title">Saturation</p>
                                            <p class="content-box-subtitle">Menghitung saturasi oksigen dalam tubuh</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5" style="margin: 10px">
                                    <div class="row">
                                        <div class="col-lg-4 content-box-icon">
                                            <img src="../assets/img/thermometer.png" alt="" style="position: absolute; left: 12px; bottom: 12px;">
                                        </div>
                                        <div class="col-lg-8">
                                            <p class="content-box-title">Suhu Tubuh</p>
                                            <p class="content-box-subtitle">Menghitung suhu tubuh secara berkala</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="width: 100%; text-align: center;">
                            <a href="chart_screen.php" class="content-button">
                                Mulai Sekarang <i class="fa fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xs-12 content-image">
                        <img src="../assets/img/background-removebg-preview.png" alt="" class="image-background">
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12">
                        <ul class="address">
                            <span>Alamat</span>
                            <li>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt unde facilis cumque repellat eveniet non ullam saepe voluptate perspiciatis? Fugit vero eaque mollitia optio repellendus magnam quasi, at itaque atque?</p>
                            </li>
                            <li>
                                <p>081234567890</p>
                            </li>
                            <li>
                                <p>healthhub@gmail.com</p>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <ul class="contact">
                            <span>Kontak</span>
                            <li>
                                <a href="#">Beranda</a>
                            </li>
                            <li>
                                <a href="#">Tentang</a>
                            </li>
                            <li>
                                <a href="#">Blog</a>
                            </li>
                            <li>
                                <a href="#">Kontak</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <ul class="social">
                            <span>Sosial Media</span>
                            <li>
                                <a href="#"><i class="fa fa-facebook fa-2x"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram fa-2x"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer> 
    </div>
</body>
</html>
