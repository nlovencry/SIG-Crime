@extends('frontend/layouts.template')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="contact" class="contact">

        <div class="container">
            <div class="row">
                <div id="klaster">
                    <div class="section-title" data-aos="fade-up" style="margin-top: 50px">
                        <h2>Klastering</h2>
                        SIG CRIME - Jember
                    </div>
                    <form action="{{ route('hasil') }}" method="post" style="margin-top: 100px">
                        @csrf
                        <div class="form-group">
                            <label for="inputKlaster" class="form-label">Masukkan jumlah klaster</label>
                            <div class="row">
                                <div class="col-md-6 col-lg-2">
                                    <select class="form-select" name="select_years" id="select_years">
                                        <option value="all">Semua</option>
                                        <option value="two_years">2 Tahun</option>
                                        <option value="one_years">1 Tahun</option>
                                        <option value="three_months">3 Bulan</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-lg-8">
                                    <input type="number" class="form-control" id="klaster" name="klaster" min="2"
                                        max="3" placeholder="Min 2 , Max 3">
                                </div>
                                <div class="col-md-6 col-lg-2">
                                    <button class="btn btn-primary" id="tombol" type="submit">Klastering</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </section>

    <div class="container ">
        <h1 class="text-center">Dataset Kriminalitas 2020 - 2021</h1>
        <table class="table table-striped table-hover table-bordered mt-5" id="tabel">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Wilayah</th>
                    <th>Curat</th>
                    <th>Curas</th>
                    <th>Curanmor</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kecamatan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->curat }}</td>
                        <td>{{ $item->curas }}</td>
                        <td>{{ $item->curanmor }}</td>
                        <td>{{ $item->curat + $item->curas + $item->curanmor }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- End Hero -->



    {{-- Pengenalan --}}
@endsection
