@include('admin.partials.head')

@include('admin.partials.navbar')

@include('admin.partials.header')
<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Kecamatan</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-list"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('kecamatan.index') }}">Kecamatan</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Tambah</h5>
                        <h5 style="float: right;"><a href="{{ route('kecamatan.index') }}"
                                class="btn btn-warning">Kembali</a></h5>
                    </div>
                    <div class="card-body table-border-style">
                        <form action="{{ route('kecamatan.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan nama"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="geojson">Geojson</label>
                                <input type="text" class="form-control" name="geojson" placeholder="Masukkan geojson"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="latitude">Latitude</label>
                                <input type="text" class="form-control" name="latitude"
                                    placeholder="Masukkan latitude" required>
                            </div>
                            <div class="form-group">
                                <label for="longtitude">Longtitude</label>
                                <input type="text" class="form-control" name="longtitude"
                                    placeholder="Masukkan longtitude" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->

@include('admin.partials.footer')
