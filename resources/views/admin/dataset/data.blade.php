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
                        <h5>Table</h5>
                        <h5 style="float: right;"><a href="{{ route('dataset.create', $id) }}"
                                class="btn btn-primary">Tambah</a></h5>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Curat</th>
                                        <th>Curas</th>
                                        <th>Curanmor</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                @foreach ($dataset as $item)
                                    <tbody>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->curat }}</td>
                                        <td>{{ $item->curas }}</td>
                                        <td>{{ $item->curanmor }}</td>
                                        

                                        <td>
                                            <a href="{{ route('dataset.edit', ['id' => Request::segment(3), 'data_id' => $item->id]) }}"
                                                class="btn btn-warning">Edit</a>
                                            {{-- <form action="{{ route('kecamatan.destroy', $item->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form> --}}
                                        </td>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->

@include('admin.partials.footer')
