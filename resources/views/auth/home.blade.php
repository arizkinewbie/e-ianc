<?php
$title = "Extended Electronic Integrated Antenatal Care | Extended e-iANC";
$desc = "Perkenalkan, Extended e-iANC. Aplikasi Pencatatan Data Pelayanan Kesehatan Ibu dan Anak Secara Real-Time Pertama Di Indonesia.";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Primary Meta Tags -->
    <title><?= $title ?></title>
    <meta name="title" content="<?= $title ?>" />
    <meta name="description" content="<?= $desc ?>" />
    <meta name="image" content="./home/assets/logo.png" />
    <meta name="keyword" content="e-ianc, pelayanan antenatal, ibu hamil, pencatatan data antenatal">
    <meta name="favicon" content="./home/assets/logo.png" />
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://e-ianc.id/" />
    <meta property="og:title" content="<?= $title ?>" />
    <meta property="og:description" content="<?= $desc ?>" />
    <meta property="og:image" content="./home/assets/logo.png" />
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="https://e-ianc.id/" />
    <meta property="twitter:title" content="<?= $title ?>" />
    <meta property="twitter:description" content="<?= $desc ?>" />
    <meta property="twitter:image" content="./home/assets/logo.png" />
    <link rel="shortcut icon" href="./home/assets/logo.png" />
    <link rel="stylesheet" type="text/css" href="./vendor/fontawesome/css/all.css" />
    <link rel="stylesheet" type="text/css" href="./vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="./vendor/bootstrap-icons/bootstrap-icons.css" />
    <link rel="stylesheet" type="text/css" href="./vendor/material-icons/css.css" />
    <link rel="stylesheet" type="text/css" href="./home/css/dashboard.css" />
    <link rel="stylesheet" type="text/css" href="./home/css/index.css" />

</head>

<body>
    <!-- HEADER -->
    <header class="header">
        <nav class="header__nav">
            <div class="header__container">
                <!-- Logo -->
                <a href="#">
                    <img src="./home/assets/logo.png" alt="logo" class="header__logo" />
                </a>

                <!-- Header links -->
                <div class="header__links">
                    <ul class="header__links-container">
                        <li><a href="#" class="header__link">Beranda</a></li>
                        <li><a href="#about" class="header__link">Tentang</a></li>
                        <li><a href="#faq" class="header__link">FAQ</a></li>
                        <li><a href="#footer" class="header__link">Kontak</a></li>
                        <li><a href="./login" class="header__link">Masuk</a></li>

                    </ul>
                </div>
                <a href="./login" class="header__play-store button button--secondary">Masuk</a>

                <!-- Header cta -->


            </div>
        </nav>
    </header>

    <!-- MAIN -->
    <main>
        <!-- HERO -->
        <section class="hero">
            <div class="hero__container overlay">
                <div class="hero__copy">
                    <div class="hero__text">
                        <h1>Selamat Datang</h1>
                        <h1 style="color: #E98295;">di Extended e-iANC</h1>
                        <p>Aplikasi pencatatan data pelayanan antenatal secara real-time</p>
                    </div>
                    <div class="card-body">
                        <div class="card-body dashboard">
                            <a href="./register" class="btn btn-primary btn-lg">Pandaftaran Akun Extended e-iANC</a><br><br>
                            <a href="/user-guide.pdf" class="btn btn-outline-secondary btn-lg" download>Panduan Pengguna <i>(User Guide)</i></a>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <!-- ADVANTAGES -->
        <section class="advantages">
            <div id="about" class="container advantages__container">
                <div class="advantages__copy">
                    <h2>
                        Perkenalkan, Extended e-iANC.
                        <span>Aplikasi Pencatatan Data Pelayanan Kesehatan Ibu dan Anak </span>
                        <span>Secara Real-Time Pertama Di Indonesia.</span>
                    </h2>
                    <p>
                        Extended e-iANC adalah sebuah aplikasi yang dapat digunakan oleh bidan dalam melakukan pencatatan data pelayanan antenatal yang secara real time dapat menghasilkan visualisasi grafik pertumbuhan berat badan Ibu hamil, skrining risiko kehamilan dan kohort ibu secara elektronik serta Surat Keterangan Kelahiran (SKK).
                    </p>
                </div>
                <div class="advantages__items">
                    <article class="advantages__item">
                        <img src="./home/assets/advantages-kecerdasan-buatan.svg" alt="" />
                        <div>
                            <h3>Inovasi pencatatan data pelayanan Kesehatan Ibu dan Anak</h3>
                            <p>Extended e-iANC dapat melakukan pencatatan data pelayanan Kesehatan Ibu dan Anak secara Real-TIme.</p>
                        </div>
                    </article>
                    <article class="advantages__item">
                        <img src="./home/assets/advantages-kesehatan-cepat.svg" alt="" />
                        <div>
                            <h3>Pencatatan data secara real-time</span></h3>
                            <p>Temukan data pelayanan Kesehatan Ibu dan Anak real-time secara cepat dan mudah dibaca.</p>
                        </div>
                    </article>
                    <article class="advantages__item">
                        <img src="./home/assets/advantages-kualitas-pelayanan.svg" alt="" />
                        <div>
                            <h3>Mengubah pelayanan secara digitalisasi</h3>
                            <p>Extended e-iANC membantu meningkatkan kualitas pelayanan dalam pencatatan data pelayanan Kesehatan Ibu dan Anak.</p>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- VISION & MISSION -->
        <section class="faq" id="faq">
            <div class="container objectives__container">
                <div class="objectives__copy">
                    <img src="./home/assets/icon-quote-mark.svg" alt="" />
                    <h2>Frequently Asked Questions (FAQ)</h2>
                </div>

                <div class="objectives__group">
                    <article class="objectives__vision">
                        <div>
                            <img src="./home/assets/icon-quote-mark.svg" alt="" />
                            <p>
                                Menghasilkan Informasi Kesehatan Ibu dan Anak Berkualitas Dalam Rangka Menurunkan Angka Kematian Ibu dan Bayi di Indonesia
                            </p>
                        </div>
                    </article>

                    <article class="objectives__mission">
                        <div class="accordion">
                            <!-- Accordion 1 -->
                            <div class="accordion__item">
                                <button type="button" class="accordion__button">
                                    <h4 class="accordion__question">Apa Keuntungan Menggunakan Extended e-iANC?</h4>
                                    <div class="accordion__icon">
                                        <img src="./home/assets/icon-expand.svg" alt="Expand icon" />
                                    </div>
                                </button>
                                <div class="accordion__collapse">
                                    <div class="accordion__body">
                                        <p class="accordion__answer">
                                            Extended e-iANC memberikan keuntungan efisiensi pencatatan data pelayanan antenatal, cek data secara real-time, dan visualisasi data yang mudah dibaca.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Accordion 2 -->
                            <div class="accordion__item">
                                <button type="button" class="accordion__button">
                                    <h4 class="accordion__question">Bagaimana Cara Mengakses ke dalam Extended e-iANC?</h4>
                                    <div class="accordion__icon">
                                        <img src="./home/assets/icon-expand.svg" alt="Expand icon" />
                                    </div>
                                </button>
                                <div class="accordion__collapse">
                                    <div class="accordion__body">
                                        <p class="accordion__answer">
                                            pengguna dapat mengakses setelah memiliki akun yang sudah terdaftar dengan aplikasi.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Accordion 3 -->
                            <div class="accordion__item">
                                <button type="button" class="accordion__button">
                                    <h4 class="accordion__question">Apakah Extended e-iANC Dapat Diakases Melalui Berbagai Perangkat?</h4>
                                    <div class="accordion__icon">
                                        <img src="./home/assets/icon-expand.svg" alt="Expand icon" />
                                    </div>
                                </button>
                                <div class="accordion__collapse">
                                    <div class="accordion__body">
                                        <p class="accordion__answer">
                                            Ya, Extended e-iANC dapat diakses melalui berbagai perangkat, seperti laptop, komputer, tablet, dan ponsel pintar.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- SLOGAN -->
        <section class="slogan">
            <div class="container slogan__container">
                <h3>Extended <span>e-iANC</span>, Bidan capai Kualitas Informasi Kesehatan Ibu dan Anak</h3>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <div id="footer" class="container footer__container">
            <div class="footer__company">
                <img src="./home/assets/logo.png" alt="logo" class="footer__logo" width="200" />
                <p class="footer__copyright"><?php
                                                echo '© ', date('Y');
                                                ?>
                    <a href="" style="font-size: 16px">Extended Electronic Integrated Antenatal Care (Extended e-iANC)</a>
                </p>
                <div class="footer__supporters">
                    <p style="font-size: 16px">Didukung oleh:</p>
                    <ul>
                        <li>
                            <img src="./home/assets/ueu.png" alt="UEU logo" width="200" />
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer__links">
                <!-- Links grop 1 -->
                <div class="footer__links-group">
                    <h5>Tentang</h5>
                    <ul>
                        <li><a href="#" class="footer__link">Fitur</a></li>
                        <li><a href="#" class="footer__link">Partner</a></li>
                    </ul>
                </div>

                <!-- Links group 2 -->
                <div class="footer__links-group">
                    <h5>Dukungan</h5>
                    <ul>
                        <li><a href="" class="footer__link">Pusat bantuan</a></li>
                        <li><a href="" class="footer__link">Syarat dan ketentuan</a></li>
                        <li>
                            <a href="" class="footer__link">Pemberitahuan privasi</a>
                        </li>
                        <li><a href="" class="footer__link">Atribusi data</a></li>
                        <li><a href="" class="footer__link">Pengaturan cookie</a></li>
                    </ul>
                </div>

                <!-- links group 3 -->
                <div class="footer__links-group">
                    <h5>Hubungi kami</h5>
                    <ul>
                        <li><a href="" class="footer__link">Website</a></li>
                        <li><a href="" class="footer__link">Facebook</a></li>
                        <li><a href="" class="footer__link">X</a></li>
                        <li><a href="" class="footer__link">Instagram</a></li>
                        <li><a href="" class="footer__link">LinkedIn</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="./home/app/js/index.js"></script>
</body>

</html>