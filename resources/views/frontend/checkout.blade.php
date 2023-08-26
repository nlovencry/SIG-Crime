@extends('frontend/layouts.template')

@section('content')

<!DOCTYPE html>
<html>

<head>
    <title>Payment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/payment.css')}}">
</head>

<body>
    <main class="page payment-page">
        <section class="payment-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2>Pembayaran</h2>
                    <p>Lakukan Pembayaran sesuai dengan nominal yang tertera lalu upload bukti pembayaran di form bukti
                        pembayaran ke Nomer Rekening  
                        <br>0917867484 
                        <br>Atas Nama Anju Alicia Johan
                        </p>
                </div>
                <form action="{{route('checkout.update', $checkout->id)}}" method="POST" enctype="multipart/form-data">
                    <div class="products">
                        <h3 class="title">Checkout</h3>
                        @foreach ($transaction as $item)
                        <div class="item">
                            <span class="price">{{$item->kerusakan->harga}}</span>
                            <p class="item-name">{{$item->kerusakan->jenis_kerusakan}}</p>
                            <p class="item-description">Harga Tidak Termasuk Sparepart</p>
                        </div>
                        @endforeach
                        <div class="total">Total<span class="price">{{$transaction_total->total}}</span></div>
                    </div>
                    <div class="card-details">
                        <h3 class="title">Form Bukti Pembayaran</h3>

                            {{csrf_field()}}
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-sm-7">
                                    <label for="card-holder">Upload Bukti Pembayaran</label>
                                    <input type="file" name="bukti_pembayaran"/>
                                </div>
                                <div class="form-group col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-block">Proses</button>
                                </div>
                            </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
