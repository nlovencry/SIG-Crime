@extends('frontend/layouts.template')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    @if (session()->has('message'))
                        <div class="container">
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        </div>
                    @endif
                    <h1 data-aos="fade-up">Selamat Datang di SIG Crime</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Mulai klustering pemetaan kriminalitas pada Kota Jember</h2>
                    <div data-aos="fade-up" data-aos-delay="800">
                        <a href="{{ route('klastering') }}" class="btn-get-started scrollto">Mulai</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
                        <img src={{ asset('frontend/assets/img/Police-car-cuate.png') }} class="img-fluid animated"
                            alt="">
                </div>
            </div>
        </div>

    </section>
    <!-- End Hero -->

    {{-- Pengenalan --}}




    {{-- akhir pengenalan --}}

    <!-- Cara menggunakan SIG CRIME -->
    <div class="order">
        <div class="box" data-aos="zoom-in-right" data-aos-delay="200">
            <section id="team" class="team section-bg">
                <div class="container">
                    <div class="section-title" data-aos="fade-up">
                        <h2>Cara Mengguanakan SIG Crime</h2>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-12" data-aos="fade-up">
                            <div class="text-center">
                                <img src="https://seekmi.com/images/icons/Hand.png" />
                                <div class="card-body">
                                    Pilih Klastering
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12" data-aos="fade-up">
                            <div class="text-center">
                                <img src="{{ asset('frontend/assets/img/input1.png') }}" />
                                <div class="card-body">
                                    Masukan Jumlah Klaster
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12" data-aos="fade-up">
                            <div class="text-center">
                                <img src="https://seekmi.com/images/icons/Location.png" />
                                <div class="card-body">
                                    Data Akan Muncul Di Peta
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- End Cara menggunakan -->
    


    <!-- ======= Mengapa Section ======= -->
    <section id="alasan" class="faq">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Mengapa SIG Crime?</h2>
            </div>
            <div class="row">
                <div class="col-md-4 animate-box" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-box">
                        <div class="row">
                            <div class="col-4">
                                <span class="feature-icon">
                                    <i class="bi bi-hand-thumbs-up"></i>
                                </span>
                            </div>
                            <div class="col-8">
                                <div class="feature-text">
                                    <h3>Terpercaya</h3>
                                    <p align="justify">Data yang diberikan sesuai dengan data dari polres yang sudah
                                        tervalidasi</p>
                                    <!-- <p><a href="#">Learn More</a></p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 animate-box" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-box">
                        <div class="row">
                            <div class="col-4">
                                <span class="feature-icon">
                                    <i class="bi bi-person-check-fill"></i>
                                </span>
                            </div>
                            <div class="col-8">
                                <div class="feature-text">
                                    <h3>Kemudahan</h3>
                                    <p align="justify">Cukup dengan menggunakan browser dapat mengetahui pemetaan
                                        kriminalitas.</p>
                                    <!-- <p><a href="#">Learn More</a></p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 animate-box" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-box">
                        <div class="row">
                            <div class="col-4">
                                <span class="feature-icon">
                                    <i class="bi bi-tags"></i>
                                </span>
                            </div>
                            <div class="col-8">
                                <div class="feature-text">
                                    <h3>Simple</h3>
                                    <p align="justify">Website memiliki tampilan yang menarik dan penggunaan website juga
                                        tergolong mudah.</p>
                                    <!-- <p><a href="#">Learn More</a></p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </section><!-- End Mengapa Section -->

    <!-- ======= FAQ Section ======= -->
    <section id="faq" class="testimonials section-bg">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>FAQ</h2>
                <p>Frequently Asked Questions</p>
            </div>

            <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Apa itu Website SIG Crime - Jember?</h3>
                                <p style="text-align: justify">
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Website SIG Crime - Jember merupakan sebuah website yang berisi sejumlah informasi terkait pemetakan daerah rawan kriminalitas yang ada di Kabupaten Jember.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Data kriminalitas dari tahun berapa yang digunakan sebagai acuan di dalam sistem ini?</h3>
                                <p style="text-align: justify">
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Data yang digunakan yakni data sejak tahun 2020 hingga tahun 2021.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Metode/algoritma apa yang diterapkan ke dalam sistem?</h3>
                                <p style="text-align: justify">
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Metode/algoritma yang digunakan pada SIG CRIME - Jember ini menggunakan metode K - Means Clustering.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Parameter/variabel apa saja yang digunakan untuk menentukan daerah rawan kecelakaan?</h3>
                                <p style="text-align: justify">
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Ada 3 parameter/variabel yang digunakan pada sistem ini, yakni Pencurian kendaraan bermotor (Curanmor), Pencurian Dengan Kekerasan (Curas), dan Pencurian Dengan Pemberatan (Curat).
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Bagaimana cara mengoperasikan apabila ingin mengetahui pemetaan daerah rawan krimininalitas?</h3>
                                <p style="text-align: justify">
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Terdapat menu bantuan, yang mana pada halaman tersebut terdapat langkah - langkah cara mengoperasikan fitur klastering pada website ini.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->
                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Bagaimana apabila saya terdapat pertanyaan yang ingin saya tanyakan?</h3>
                                <p style="text-align: justify">
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Apabila ada pertanyaan/pesan yang ingin disampaikan, bisa menghubungi melalui email yang tertera pada menu Author.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->


                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End FAQ Section -->
    <!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>Contact Us</h2>
        </div>

        <div class="row" style="padding-left: 10%">

            <div class="col-lg-5 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-about">
                    <h3>SIG Crime</h3>
                    <p align="justify">SIG Crime adalah website pemetaan tentang kriminalitas di kota jember.
                        Pada website memiliki fitur Klustering, Basis data, Faq, Bantuan dan Author.
                        Pada Klustering menggunakan 3 parameter dengan jenis kriminalitas : Pencurian Kendaraan Bermotor,
                        Pencurian Dengan Kekerasan dan Pencurian Dengan Pemberataan.
                        Pada Basis Data terdapat data-data kriminalitas yang terjadi di kota jember.
                        Pada Faq terdapat pertanyaan yang sering ditanyakan oleh user.
                        Pada Bantuan terdapat panduan penggunaan website.
                        Pada Author terdapat informasi tentang pembuat website.</p>
                    <div class="social-links">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                <div class="info" style="padding-top: 10px">
                    </br>
                    <div>
                        <i class="ri-map-pin-line" style="margin-left:10%"></i>
                        <p>Jember, Jawa Timur, 68121</p>
                    </div>

                    <div>
                        <i class="ri-mail-send-line" style="margin-left:10%"></i>
                        <p>fathur.rahman12300@gmail.com</p>
                    </div>
                    <div>
                        <i class="ri-phone-line" style="margin-left:10%"></i>
                        <a href="https://wa.me/6287864705666">
                            <p>0878-6470-5666</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3" data-aos="fade-up" data-aos-delay="200">
                {{-- <img src="#"> --}}
                <img src="{{ asset('frontend/assets/img/logo-sig.png') }}" class="img-contact" width="200px">
            </div>
        </div>
    </div>
    </div>
    </div>
</section><!-- End Contact Section -->


    </main><!-- End #main -->
@endsection
