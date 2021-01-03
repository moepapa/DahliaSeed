@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> {{ $pageTitle }}</h1>
            <p>Seedling ID: &nbsp{{ $subTitle }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <section class="invoice">
                    <div class="row mb-4">
                        <div class="col-6">
                            <h4 class="page-header">Seedling Name: {{ $seedling->myan_name }}</h4>
                        </div>
                        <div class="col-6">
                            <h5 class="text-right">Created Date: {{ $seedling->created_at->toFormattedDateString() }}</h5>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="tile">
                <section class="invoice">
                    <div class="row invoice-info">
                        <div class="col-1"></div>
                        <div class="col-6">
                            <h4 class="page-header">Seedling Details</h4><br><br>
                            <b>Seedling ID:</b> {{ $seedling->id }}<br><br>
                            <b>Myanmar Name:</b> {{ $seedling->myan_name }}<br><br>
                            <b>English Name:</b> {{ $seedling->eng_name }}<br><br>
                            <b>Botany Name:</b> {{ $seedling->botany_name }}<br><br>
                            <b>Race:</b> {{ $seedling->race }}<br><br>
                            <b>Duration:</b> {{ $seedling->duration }}<br><br>
                            <b>Origin:</b> {{ $seedling->origin }}<br><br>
                            <b>Created Date:</b> {{ $seedling->created_at->toFormattedDateString() }}<br><br>
                            <b>Type:</b> {{ $seedling->type->name }}<br><br>
                            <b>Categories:</b> @foreach($seedling->categories as $category) 
                                <span class="badge badge-info">{{ $category->name }}</span> 
                                @endforeach<br><br>
                            <b>Weight:</b> {{ $seedling->weight }} kg<br><br>
                            <b>Stock:</b> 
                                @if ($seedling->quantity == 0)
                                    <span class="badge badge-danger">Unavailable</span>
                                @elseif ($seedling->quantity < 6)
                                    <span class="badge badge-info">only {{ $seedling->quantity }} left</span>
                                @else
                                    <span class="badge badge-success">{{ $seedling->quantity }} available</span>
                                @endif <br><br>
                            <b>Price:</b> {{ config('settings.currency_symbol') }}{{ $seedling->price }}<br><br>
                            <b>Status:</b> @if ($seedling->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Not Active</span>
                                        @endif<br><br>
                        </div>
                        <div class="col-5">
                            <h4 class="page-header">Images</h4><br>
                            @if ($seedling->images)
                            <br>
                                <div class="row">
                                    @foreach($seedling->images as $image)
                                        <div class="col-12 col-sm-4 col-md-4">
                                            <img src="{{ asset($image->full) }}" id="brandLogo" class="img-fluid" alt="img">
                                        </div>
                                    @endforeach
                                </div>
                            @endif 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <b>Cultivate Title:</b> {{ $seedling->cultivateTitle }}<br>
                            {{ $seedling->cultivate }}<br><br>
                            <b>Soil Title:</b> {{ $seedling->soilTitle }}<br>
                            {{ $seedling->soil }}<br><br>
                            <b>Grow Title:</b> {{ $seedling->growTitle }}<br>
                            {{ $seedling->grow }}<br><br>
                            <b>Medicine Title:</b> {{ $seedling->medicineTitle }}<br>
                            {{ $seedling->medicine }}<br>
                        </div>
                        <div class="col-1"></div>
                    </div>
                </section>
            </div>
    </div>
    <div class="row">
        <a class="btn btn-success ml-5" href="{{ route('admin.seedlings.index') }}">Back</a>
    </div>
@endsection
