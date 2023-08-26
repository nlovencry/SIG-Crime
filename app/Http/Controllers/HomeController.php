<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Models\Klastering;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }

    public function maps()
    {
        return view('frontend.maps');
    }
    public function metode()
    {
        return view('frontend.metode');
    }
    public function author()
    {
        return view('frontend.author');
    }
    public function bantuan()
    {
        return view('frontend.bantuan');
    }

    public function klastering()
    {
        $kecamatan = DB::table('kecamatans')
            ->join('datasets', 'kecamatans.id', '=', 'datasets.kecamatan_id')
            ->select('kecamatans.*', DB::raw('sum(curat) as curat'), DB::raw('sum(curas) as curas'), DB::raw('sum(curanmor) as curanmor'))
            ->groupBy('datasets.kecamatan_id')
            ->get();
        //kalkulasi curan,curas,curat
        // return json_encode($kecamatan);
        return view('frontend.klastering', compact('kecamatan'));
    }

    public function hasil()
    {
        $years = $_POST['select_years'];
        $jumlah_centroid = intval($_POST['klaster']);
        // $jumlah_centroid = 3;
        $this->Klastering = new Klastering();
        $data = $this->Klastering->getData($years);
        // return response()->json($data);

        // Proses untuk mendapatkan centroid random
        //Metode K-Means
        $centroid = $this->Centroid_Random($data, $jumlah_centroid);
        $cluster = $this->clustering($data, $centroid);
        $new_centroid = $this->newCentroid($data, $cluster, $centroid);

        $iterasi = 1;
        // Proses pengclusteran dan penentuan cetntroid baru akan di ulang sampai tidak -
        // ada perubahan titik pada centroid baru dengan centroid sebelumnya
        // perulangan sampai menemukan iterasi yang sama dengan sebelumnya
        while ($new_centroid != $centroid) {
            $iterasi++;
            $centroid = $new_centroid;
            $cluster = $this->clustering($data, $centroid);
            $new_centroid = $this->newCentroid($data, $cluster, $centroid);
        }

        // Proses mendapatkan id_kecamatan berdasarkan hasil cluster sesuai kelompok centroidnya
        $multi_cluster = array();
        foreach ($cluster as $row_m_cluster => $m_cluster) {
            $multi_cluster[$m_cluster][] = $row_m_cluster;
        }

        // Proses untuk mendapatkan total nilai dari tiap centroid supaya bisa di sorting
        $jumlah_per_centroid = [];
        foreach ($centroid as $row_m_centroid => $m_centroid) :
            $jumlah = array_sum($m_centroid);
            array_push($jumlah_per_centroid, $jumlah);
        endforeach;
        // Proses untuk mengurutkan hasil centroid berdasarkan dari nilai yang tertinggi
        $short_cluster = $jumlah_per_centroid;
        rsort($short_cluster);
        //rshort untuk mengurutkan descending

        // Proses untuk mendapatkan index=>keynya dari cluster centroid perhitungannya sama seperti $jumlah_per_centroid
        $short_cluster_index = [];
        $dafault = 1;
        foreach ($jumlah_per_centroid as $key => $value) {
            $short_cluster_index[$dafault] = $value;
            $dafault++;
        }

        // Setelah didapatkan index=>keynya, kemudian ditampung kedalam variable $index_arr agar bisa di panggil di view
        $index_arr = [];
        foreach ($short_cluster as $kunci => $sc) {
            foreach ($short_cluster_index as $key => $value) {
                if ($value == $sc) {
                    array_push($index_arr, $key);
                }
            }
        }


        $hasil = array();
        $hasil['jumlah_centroid'] = $jumlah_centroid;
        $hasil['jumlah_data'] = $this->Klastering->hitungBaris();
        $hasil['jumlah_iterasi'] = $iterasi;
        $hasil['centroid'] = $centroid;
        $hasil['cluster'] = $cluster;
        $hasil['index_arr'] = $index_arr;
        $hasil['multi_cluster'] = $multi_cluster;
        $hasil['kecamatan'] = $this->Klastering->getNama();
        $hasil['jumlah_per_centroid'] = $jumlah_per_centroid;
        $hasil['short_cluster'] = $short_cluster;
        $hasil['data_kecamatan'] = $this->Klastering->getKecamatan();
        $hasil['data_kec'] = $this->Klastering->getRel($years);
        $no = 1;

        // return view('frontend.maps', compact('hasil'));
        return view('frontend.maps', [
            'hasil' => $hasil,
            'jumlah_centroid' => $hasil['jumlah_centroid'],
            'jumlah_iterasi' => $hasil['jumlah_iterasi'],
            'index_arr' => $hasil['index_arr'],
            'multi_cluster' => $hasil['multi_cluster'],
            'kecamatan' => $hasil['kecamatan'],
            'no' => $no,
            'data_kecamatan' => $hasil['data_kecamatan'],
            'data_kec' => $hasil['data_kec']
        ]);
    }

    public function Centroid_Random($data, $jumlah_centroid)
    {
        //Karena Index dimulai dari 0. maka jumlah index jumlah data - 1
        $index_data = count($data) - 1;
        // Deklarasi Variable array
        $centroid_random = array();
        $angka = array();
        $data_centroid = array();

        // Perulangan untuk memuat data Centroid Random
        for ($i = 0; $i < $jumlah_centroid; $i++) {
            $angka = rand(0, $index_data);
            // Pada perulangan ini mencari nilai random untuk index centroid random
            // Dilakukan Validasi menggunakan perulangan do while
            //untuk memastikan tidak ada angka yang sama
            do {
                $angka = rand(0, $index_data);
                // Jika Angka sama akan dilakukan perulangan lagi
            } while (in_array($angka, $centroid_random));
            // Perulangan akan terus terjadi JIKA
            // Nilai pada array angka sama dengan Nilai array Centroid_Random
            $centroid_random[$i] = $angka;
            // Jika Nilai belum ada maka masuk ke $centroid_random
        }

        // Setelah mencari index dengan angka random
        // saatnya Mencari data berdasarkan index yang didapat
        foreach ($centroid_random as $key_CRandom => $value_CRandom) {
            //Untuk memisahkan index dengan Value
            $data_centroid[$key_CRandom] = $data[$value_CRandom];
            // Memasukkan value Centroid random ke Data Centroid
        }

        return $data_centroid;
    }

    public function clustering($data, $centroid)
    {
        // Menghutung jarak setiap data dengan centroid
        // lalu jarak tersebut di simpan kedalan variable $jarak_centroid.
        foreach ($data as $row_m_data => $m_data) {
            foreach ($centroid as $row_m_centroid => $m_centroid) {
                // mendefinisikan jarak awal sebelum perhitungan setiap data = 0
                // agar tidak terjadi salah perhitungan pada looping berikutnya.
                // $jarak_centroid = [];
                $jarak_centroid[$row_m_data][$row_m_centroid] = 0.0;
                $jarak = 0.0;

                foreach ($m_centroid as $row_single_centroid => $single_centroid) {
                    $single_data = $m_data->$row_single_centroid;
                    $jarak += pow(($single_data - $single_centroid), 2);
                }
                $hasil = round(sqrt($jarak), 2);
                $jarak_centroid[$row_m_data][$row_m_centroid] = $hasil;
            }
        }

        // Setelah melakukan perhitungan jarak, maka ditentukan lah jarak terdekat dari -
        // setiap data dengan setiap centroid.
        // jarak rata rata data dari setiap nilai yang paling dekat dengan centroid -
        // yang ada akan di simpan ke dalam var new_centroid lalu di kembalikan kedalam
        // variable yang memanggil fungsi clustering().
        foreach ($jarak_centroid as $m_jarak) { // Menghitung jarak terdekat
            $nearest_cluster[] = array_search(min($m_jarak), $m_jarak);
        }
        return $nearest_cluster;
    }

    function newCentroid($data, $cluster, $centroid)
    {
        // setiap data yang memiliki cluster yang sama akan di masukkan ke dalam $multi_cluster -
        // sesuai index nya masing masing, index disini menggantikan nilai cluster yang di tuju -
        // oleh setiap data.
        $multi_cluster = array();
        foreach ($cluster as $row_m_cluster => $m_cluster) {
            $multi_cluster[$m_cluster][] = $row_m_cluster;
        }

        // pada pemrosesan sebelumnya dapat terlihat bahwa data yang di simpan akan berurutkan -
        // cluster berapa yag di miliki oleh data pertama, maka dari itu data tersebut harus -
        // di urutkan terlebih dahulu menggunakan fungsi ksort(),
        // ksort() = mengurutkan secara ascending berdasarkan nilai key yang dimiliki.
        ksort($multi_cluster);

        // proses dibawah berfungsi untuk menghitung centroid baru sesuai dengan -
        // metode k-means, lalu nilai dari centroid baru disimpan kedalam var $centroid_baru
        // di kembalikan kedalam variable yang memanggil fungsi new_centroid()
        $centroid_baru = array();
        foreach ($multi_cluster as $row_m_multi_cluster => $m_multi_cluster) {
            foreach ($centroid[0] as $row_m_centroid => $_m_centroid) { // hanya agar looping sebanyak jumlah kecamatan
                $temp_centroid = 0;

                foreach ($m_multi_cluster as $n_multi_cluster) {
                    $temp_centroid += $data[$n_multi_cluster]->$row_m_centroid;
                }
                $temp_centroid = round($temp_centroid / count($m_multi_cluster), 2);
                $centroid_baru[$row_m_multi_cluster][$row_m_centroid] = $temp_centroid;
            }
        }
        return $centroid_baru;
    }
}
