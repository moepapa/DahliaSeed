@extends('site.app')
@section('title', $seedling->myan_name)
@section('content')
    <section class="section-pagetop bg-white">
        <div class="container clearfix">
            <h2 class="title-page">{{ $seedling->myan_name }}</h2>
        </div>
    </section>

    <div class="container">
        @if(session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <section class="section-content bg padding-y" id="site">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12">
                    <div class="card">
                        <div class="row no-gutters">
                            <aside class="col-12 col-sm-12 col-md-6 border-right">
                                <article class="gallery-wrap">
                                    @if ($seedling->images->count() > 0)
                                        <div class="img-big-wrap">
                                            <div class="padding-y">
                                                <a href="{{ asset($seedling->images->first()->full) }}" data-fancybox="">
                                                    <img src="{{ asset($seedling->images->first()->full) }}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="img-big-wrap">
                                            <div>
                                                <a href="https://via.placeholder.com/176" data-fancybox=""><img src="https://via.placeholder.com/176"></a>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($seedling->images->count() > 0)
                                        <div class="img-small-wrap">
                                            @foreach($seedling->images as $image)
                                                <div class="item-gallery">
                                                    <img src="{{ asset($image->full) }}" alt="" height="200" width="150">
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </article>
                            </aside>
                            <aside class="col-12 col-sm-12 col-md-6">
                                <article class="p-5">
                                    <h3 class="titleName mb-3">{{ $seedling->myan_name }}</h3><br>
                                    <dl class="row">
                                        <dt class="col-6 col-sm-6 col-md-4">အင်္ဂလိပ်အမည်</dt>
                                        <dd class="col-6 col-sm-6 col-md-8">- {{ $seedling->eng_name }}</dd>
                                        <dt class="col-6 col-sm-6 col-md-4">ရုက္ခဗေဒအမည်</dt>
                                        <dd class="col-6 col-sm-6 col-md-8">- {{ $seedling->botany_name }}</dd>
                                        <dt class="col-6 col-sm-6 col-md-4">သက်တမ်း</dt>
                                        <dd class="col-6 col-sm-6 col-md-8">- {{ $seedling->duration }}</dd>
                                        <dt class="col-6 col-sm-6 col-md-4">အမျိုးအစား</dt>
                                        <dd class="col-6 col-sm-6 col-md-8">- {{ $seedling->type->name }}</dd>
                                        <dt class="col-6 col-sm-6 col-md-4">အလေးချိန်</dt>
                                        <dd class="col-6 col-sm-6 col-md-8">- {{ $seedling->weight }} kg</dd>
                                        <dt class="col-6 col-sm-6 col-md-4">မျိုးရင်း</dt>
                                        <dd class="col-6 col-sm-6 col-md-8">- {{ $seedling->race }}</dd>
                                        <dt class="col-6 col-sm-6 col-md-4">မူရင်းဒေသ</dt>
                                        <dd class="col-6 col-sm-6 col-md-8">- {{ $seedling->origin }}</dd>
                                        <dt class="col-6 col-sm-6 col-md-4">ပျိုးပင်အရေအတွက်</dt>
                                        <dd class="col-6 col-sm-6 col-md-8">
                                            @if ($seedling->quantity == 0)
                                            - <span class="badge badge-danger">Unavailable</span>
                                            @elseif ($seedling->quantity < 6)
                                            - <span class="badge badge-info">only {{ $seedling->quantity }} left</span>
                                            @else
                                            - <span class="badge badge-success">{{ $seedling->quantity }} available</span>
                                            @endif
                                        </dd>
                                        <dt class="col-6 col-sm-6 col-md-4">ဈေးနှုန်း</dt>
                                        <dd class="col-6 col-sm-6 col-md-8">- {{ $seedling->price }} ks</dd>
                                    </dl>
                                    <div class="mb-3">
                                        @if ($seedling->sale_price > 0)
                                            <var class="price h3 text-danger">
                                                <span class="currency">{{ config('settings.currency_symbol') }}</span><span class="num" id="seedlingPrice">{{ $seedling->sale_price }} ks</span>
                                                <del class="price-old"> {{ config('settings.currency_symbol') }}{{ $seedling->price }} ks</del>
                                            </var>
                                        @else
                                            <var class="price h3 text-success">
                                                <span class="currency">{{ config('settings.currency_symbol') }}</span><span class="num" id="seedlingPrice">{{ $seedling->price }}</span>
                                            </var>
                                        @endif
                                    </div>
                                    <hr>
                                    <form action="{{ route('seedling.add.cart') }}" method="POST" role="form" id="addToCart">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <dl class="dlist-inline">
                                                    <dt>Quantity: </dt>
                                                    <dd>
                                                        <input class="form-control" type="number" min="1" value="1" max="{{ $seedling->quantity }}" name="qty" style="width:70px;">
                                                        <input type="hidden" name="seedlingId" value="{{ $seedling->id }}">
                                                        <input type="hidden" name="price" id="finalPrice" value="{{ $seedling->sale_price != '' ? $seedling->sale_price : $seedling->price }}">
                                                    </dd>
                                                </dl>
                                            </div>
                                        </div>
                                        <hr>
                                        <button type="submit" class="btn btn-successs"><i class="fas fa-shopping-cart"></i> Add To Cart</button>
                                    </form>
                                </article>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12">
                    <article class="card mt-4">
                        <div class="card-body">
                            <h3 class="title">အသေးစိတ်ဖော်ပြချက်</h3><br>
                            <h4 class="titleName">{!! $seedling->cultivateTitle !!}</h4>
                            <p>{!! $seedling->cultivate !!}</p><br>
                            <h4 class="titleName">{!! $seedling->soilTitle !!}</h4>
                            <p>{!! $seedling->soil !!}</p><br>
                            <h4 class="titleName">{!! $seedling->growTitle !!}</h4>
                            <p>{!! $seedling->grow !!}</p><br>
                            <h4 class="titleName">{!! $seedling->medicineTitle !!}</h4>
                            <p>{!! $seedling->medicine !!}</p><br>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>
@stop
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#addToCart').submit(function (e) {
                if ($('.option').val() == 0) {
                    e.preventDefault();
                    alert('Please select an option');
                }
            });
            $('.option').change(function () {
                $('#seedlingPrice').html("{{ $seedling->sale_price != '' ? $seedling->sale_price : $seedling->price }}");
                let extraPrice = $(this).find(':selected').data('price');
                let price = parseFloat($('#seedlingPrice').html());
                let finalPrice = (Number(extraPrice) + price).toFixed(2);
                $('#finalPrice').val(finalPrice);
                $('#seedlingPrice').html(finalPrice);
            });
        });
    </script>
@endpush
