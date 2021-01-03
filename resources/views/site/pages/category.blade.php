@extends('site.app')
@section('title', $category->name)
@section('content')
<section class="section-pagetop bg-white">
    <div class="container clearfix">
        <h2 class="title-page">{{ $category->name }}</h2>
    </div>
</section>
<section class="section-content bg padding-y">
    <div class="container">
        <div id="code_prod_complex">
            <div class="row">
                @forelse($category->seedlings as $seedling)
                    <div class="col-md-3">
                        <figure class="card card-product">
                            @if ($seedling->images->count() > 0)
                            {{-- <div>{{  var_dump( asset($seedling->images->first()->full)) }}</div> --}}
                                <div class="img-wrap padding-y"><img src="{{ asset($seedling->images->first()->full) }}" alt=""></div>
                            @else
                                <div class="img-wrap padding-y"><img src="https://via.placeholder.com/176" alt=""></div>
                            @endif
                            <figcaption class="info-wrap">
                                <h4 class="title"><a href="{{ route('seedling.show', $seedling->slug) }}">{{ $seedling->myan_name }}</a></h4>
                            </figcaption>
                            <div class="bottom-wrap">
                                <div class="row">
                                    <div class="col-12 col-sm-8 col-md-8">
                                        @if ($seedling->sale_price != 0)
                                            <div class="price-wrap h5">
                                                <span class="price"> {{ config('settings.currency_symbol').$seedling->sale_price }} </span>
                                                <del class="price-old"> {{ config('settings.currency_symbol').$seedling->price }}</del>
                                            </div>
                                        @else
                                            <div class="price-wrap h5">
                                                <span class="price"> {{ config('settings.currency_symbol').$seedling->price }} </span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-12 col-sm-4 col-md-4">
                                        @if ($seedling->quantity == 0)
                                            <span class="badge badge-danger">Unavailable</span>
                                        @elseif ($seedling->quantity < 6)
                                            <span class="badge badge-info">only {{ $seedling->quantity }} left</span>
                                        @else
                                            <span class="badge badge-success">{{ $seedling->quantity }} available</span>
                                        @endif
                                    </div>
                                </div>

                                <br>
                                <a href="{{ route('seedling.show', $seedling->slug) }}" class="btn btn-sm btn-success float-right"><i class="fas fa-eye"></i>&nbsp;&nbsp; View Detail</a>
                            </div>
                        </figure>
                    </div>
                @empty
                    <p>No seedlings found in {{ $category->name }}.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>

@stop
