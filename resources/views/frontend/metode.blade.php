@extends('frontend/layouts.template')

@section('content')

<section id="contact" class="contact">
    <div class="container">
        <div class="row" style="margin-top: 10%">
            
            <div class="section-title" data-aos="fade-up">
                <h2>Basis Pengetahuan</h2>
                <p>Berikut Merupakan Informasi mengenai metode yang digunakan untuk penelitian.</p>
                <h4>
                <b>SIG CRIME</b>
                </h4>
            </div>
                <div class="container" style="padding-left: 100px">
                    <div class="row">
                        <div class="col-lg-4" data-aos="fade-right">
                            <img src={{ asset('frontend/assets/img/kmeans.png') }} class="img-fluid animated"
                        alt="" width="400px">
                        </div>
                        <div class="col-lg-8" data-aos="fade-right">
                            <h2>K-Means Klustering</h2>
                            <p style="text-align: justify">
                                Klastering merupakan proses dalam membagi data yang semulanya tidak berlabel menjadi sekumpulan data yang membentuk kelompok berdasarkan kemiripan yang dimiliki oleh data tersebut dengan data lainnya. Menurut Larose dalam (Rahmat B.C.T.I. et al., 2017) mengatakan bahwa clustering berfokus pada proses pengelompokan data berdasarkan kemiripan attribute/value dari data tersebut, dimana cluster itu sendiri merupakan kumpulan data yang memiliki kemiripan atau tidak dengan data yang lain.
                            </p>
                        </div>
                        <div class="col-lg-12" style="text-align: justify">
                            <p style="margin-top: 20px">
                                Misalkan K adalah jumlah klaster, C merupakan label klaster, dan P merupakan dataset. Proses klasterisasi harus memenuhi kriteria berdasarkan Persamaan (1), (2), dan (3) (Rahmat B.C.T.I. et al., 2017).
                            </p>
                            <center>
                                <img src={{ asset('frontend/assets/img/mtd1.png') }} class="img-fluid animated"
                                alt="" width="400px">
                            </center>
                            <p style="margin-top: 20px">
                                Algoritma K – Means adalah algoritma pengelompokan data berdasarkan titik pusat cluster (centroid) paling dekat dengan data. Centroid awal didapatkan dengan cara acak (centroid random), yang kemudian akan diperbaharui melalui proses iterasi. Tujuan K – Means adalah pengelompokan data yang memaksimalkan kesamaan data yang dikelompokkan dan meminimalkan kesamaan data antara cluster. Persamaan fungsi jarak digunakan dalam cluster. Maksimalkan kesamaan data berdasarkan jarak terpendek antara data ke titik pusat. Langkah pertama adalah proses pengelompokan data menggunakan algoritma K – Means merupakan titik awal untuk membentuk centroid Cj pembentukan titik awal centroid dihasilkan secara acak. Jumlah centroid Cj dinaikkan berdasarkan jumlah cluster yang telah ditentukan sebelumnya. Setelah K centroid terbentuk, baru kemudian menghitung jarak tiap data Xi dengan centroid ke-j sampai k dinotasikan dengan d(Xi, Cj). Terdapat beberapa ukuran jarak yang digunakan sebagai parameter untuk kemiripan suatu instance data, salah satunya adalah jarak euclidean. Perhitungan jarak Euclidean seperti pada Persamaan 4 (Rahmat C.T.I. et al., 2017).
                            </p>
                            <center>
                                <img src={{ asset('frontend/assets/img/mtd2.png') }} class="img-fluid animated"
                                alt="" width="400px">
                        </div>
                    </div>
                    </div>
                </div>
                
              
        </div>
    </div>
</section><!-- End Contact Section -->

