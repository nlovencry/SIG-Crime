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
                            <h5 class="m-b-10">Dataset</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-list"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('dataset.index') }}">Dataset</a></li>
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
                        <h5 style="float: right;"><a href="{{ route('dataset.index') }}"
                                class="btn btn-warning">Kembali</a></h5>
                    </div>
                    {{-- //get id from url --}}
                    <div class="card-body table-border-style">
                        <form action="{{ route('dataset.store', Request::segment(3)) }}" method="POST">
                            @csrf
                            <input type="hidden" name="kecamatan_id" value="{{ Request::segment(3) }}">
                            <div class="form-group">
                                <label for="curat">Curat</label>
                                <input type="number" name="curat" class="form-control" id="curat"
                                    placeholder="Curat">
                            </div>
                            <div class="form-group">
                                <label for="curas">Curas</label>
                                <input type="number" name="curas" class="form-control" id="curas"
                                    placeholder="Curas">
                            </div>
                            <div class="form-group">
                                <label for="curanmor">Curanmor</label>
                                <input type="number" name="curanmor" class="form-control" id="curanmor"
                                    placeholder="Curanmor">
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
