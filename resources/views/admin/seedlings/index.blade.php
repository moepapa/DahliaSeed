@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="app-menu__icon fas fa-seedling"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <a href="{{ route('admin.seedlings.create') }}" class="btn btn-primary pull-right">Add seedling</a>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="tile">
                <div class="tile-body table-responsive">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th class="text-center"> ID </th>
                            <th class="text-center"> Images </th>
                            <th class="text-center"> Name </th>
                            <th class="text-center"> Duration </th>
                            <th class="text-center"> Created Date </th>
                            <th class="text-center"> Categories </th>
                            <th class="text-center"> Price </th>
                            <th class="text-center"> Stock </th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger">Action <i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($seedlings as $seedling)
                                <tr>
                                    <td>{{ $seedling->id }}</td>
                                    <td>
                                        @if ($seedling->images)
                                            <div class="row">
                                                @foreach($seedling->images as $image)
                                                    <div class="col-md-6">
                                                        <div class="card">
                                                            <img src="{{ asset($image->full) }}" id="brandLogo" class="img-fluid" alt="img">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ $seedling->myan_name }}</td>
                                    <td>{{ $seedling->duration }}</td>
                                    <td>{{ $seedling->created_at->toFormattedDateString() }}</td>
                                    <td>
                                        @foreach($seedling->categories as $category)
                                            <span class="badge badge-info">{{ $category->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ config('settings.currency_symbol') }}{{ $seedling->price }}</td>
                                    <td class="text-center">
                                        @if ($seedling->quantity == 0)
                                            <span class="badge badge-danger">Unavailable</span>
                                        @elseif ($seedling->quantity < 6)
                                            <span class="badge badge-info">only {{ $seedling->quantity }} left</span>
                                        @else
                                            <span class="badge badge-success">{{ $seedling->quantity }} available</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.seedlings.edit', $seedling->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.seedlings.delete', $seedling->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                            <a href="{{ route('admin.seedlings.show', $seedling->id) }}" class="btn btn-sm btn-primary">View</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
