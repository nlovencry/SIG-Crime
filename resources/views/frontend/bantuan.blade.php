@extends('frontend/layouts.template')

@section('content')

<section id="contact" class="contact">
    <div class="container">
        <div class="row" style="margin-top: 50px">
            
            <div class="section-title" data-aos="fade-up">
                <h2>Bantuan</h2>
                <p>Berikut Merupakan Langkah-Langkah Menggunakan Aplikasi</p>
                <h4>
                <b>SIG CRIME</b>
                </h4>
            </div>
            <center>
                <div class="container" style="padding-left: 100px">
                    
                    <div class="col-lg-12" data-aos="fade-right">
                        <p style="text-align: left">
                            1.Buka website SIG CRIME, kemudian klik tombol mulai atau bisa masuk menuju menu "Klastering" yang ada pada menu diatas.
                        </p>
                        <img src={{ asset('frontend/assets/img/bantuan1.png') }} class="img-fluid animated"
                    alt="" width="800px">
                    <p style="text-align: left">
                        2.Setelah berhasil menuju halaman klasterisasi, maka masukkan jumlah pemetaan/pengelompokan daerah yang ada di Kabupaten Jember, lalu tekan tombol cluster. Perlu diperhatikan, jumlah minimum 2, dan 4 untuk jumlah maksimum
                    </p>
                    <img src={{ asset('frontend/assets/img/bantuan1.png') }} class="img-fluid animated"
                alt="" width="800px">
                <p style="text-align: left">
                    3. Sistem akan secara otomatis mengelompokkan daerah yang ada di Kabupaten Jember sesuai jumlah masukan pengguna, untuk kasus ini adalah 4 (Sangat rawan, Rawan, Sedang, Tidak Rawan). Setelah sistem selesai melakukan prosesnya, maka akan diperoleh data kelompok daerah rawan tersebut yang kemudian akan ditampilkan dalam bentuk peta/maps.
                </p>
                <img src={{ asset('frontend/assets/img/bantuan1.png') }} class="img-fluid animated"
            alt="" width="800px">


                    </div>
                </div>
            </div>
            </center>
                
                
              
        </div>
    </div>
</section><!-- End Contact Section -->

