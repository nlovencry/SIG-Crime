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
                            <h5 class="m-b-10">Jenis</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-list"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('jenis.index') }}">Jenis</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit</h5>
                        <h5 style="float: right;"><a href="{{ route('jenis.index') }}"
                                class="btn btn-warning">Kembali</a></h5>
                    </div>
                    <div class="card-body table-border-style">
                        <form action="{{ route('jenis.update', $jenis->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan nama"
                                    required value="{{ $jenis->nama }}">
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
