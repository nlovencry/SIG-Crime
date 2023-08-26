@extends('frontend/layouts.template')

@section('content')
<!-- ======= Hero Section ======= -->
<section>
<div class="container my-5">
    {{-- <form action="controller" method="get" class="d-md-flex d-sm-block justify-content-between"> <input type="hidden" name="command" value="select-orders">
        <h1 class="h5 align-self-center col-3">Search Order</h1>
        <div class="btn-group align-self-center col-12 col-sm-12 col-md-8 col-lg-6"> <select name="searchType" class="btn btn-outline-dark col-3 col-sm-3">
                <option value="orderId">Order ID</option>
                <option value="created">Created</option>
                <option value="customer">Customer</option>
                <option value="status">Status</option>
            </select> <input type="search" name="searchBy" class="col-6 col-sm-6"> <input type="submit" value="Search" class="btn btn-outline-dark col-3 col-sm-3"> </div>
    </form> --}}
    <div class="d-md-flex d-none justify-content-md-between justify-content-sm-center align-content-center border-bottom border-2 my-2 bg-dark text-light p-3 rounded-3">
        <div class="col-2 text-sm-center text-md-start align-self-center">
            <h1 class="h5 fw-bold">#</h1>
        </div>
        <div class="col-2 align-self-center">
            <h1 class="h5 fw-bold">Invoice</h1>
        </div>
        <div class="col-3 align-self-center">
            <h1 class="h5 fw-bold">Merk Hp</h1>
        </div>
        <div class="col-2 align-self-center">
            <h1 class="h5 fw-bold">Kerusakan</h1>
        </div>
        <div class="col-2 align-self-center">
            <h1 class="h5 fw-bold">Status</h1>
        </div><div class="col-2 align-self-center">
            <h1 class="h5 fw-bold">Action</h1>
        </div>
    </div>
    @foreach ($transaction as $row)
    <div class="d-md-flex d-sm-block justify-content-md-between justify-content-sm-center text-center border-bottom border-2 my-2 bg-light p-2 rounded-3">
        <div class="col-md-2 text-sm-center text-md-start align-self-center my-2">
            <th scope="row">{{$loop->iteration}}</th>
        </div>
        <div class="col-md-2 text-sm-center text-md-start align-self-center my-2">
            <td>{{$row->invoice}}</td>
        </div>
        <div class="col-md-3 text-sm-center text-md-start align-self-center my-2">
            td>{{$row->merk}}</td>
        </div>
        <div class="col-md-3 text-sm-center text-md-start align-self-center my-2">
            <td>{{$row->kerusakan->jenis_kerusakan}}</td>
        </div>
        <div class="col-md-3 text-sm-center text-md-start align-self-center my-2">
            <td>{{$row->status}}</td>
        </div>
        <div class="col-md-3 text-sm-center text-md-start align-self-center my-2">
            @if($row->status == 'pending')
                    <a href="{{url('/checkout', $row->id)}}">bayar</a>
                    @endif
        </div>
    </div>
    @endforeach
    </div>
    </div>
    </div>
</div>
</section>
