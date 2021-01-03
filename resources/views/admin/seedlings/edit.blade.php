@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/js/plugins/dropzone/dist/min/dropzone.min.css') }}"/>
@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> {{ $pageTitle }} - {{ $subTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row user">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                    <li class="nav-item"><a class="nav-link" href="#images" data-toggle="tab">Images</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <div class="tile">
                        <form action="{{ route('admin.seedlings.update') }}" method="POST" role="form">
                            @csrf
                            <h3 class="tile-title">Seedling Information</h3>
                            <hr>
                            <div class="tile-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="myan_name">Myanmar Name</label>
                                            <input
                                                class="form-control @error('myan_name') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter attribute myan_name"
                                                id="myan_name"
                                                name="myan_name"
                                                value="{{ old('myan_name', $seedling->myan_name) }}"
                                            />
                                            <input type="hidden" name="seedling_id" value="{{ $seedling->id }}">
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('myan_name') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="eng_name">English Name</label>
                                            <input
                                                class="form-control @error('eng_name') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter attribute eng_name"
                                                id="eng_name"
                                                name="eng_name"
                                                value="{{ old('eng_name', $seedling->eng_name) }}"
                                            />
                                            <input type="hidden" name="seedling_id" value="{{ $seedling->id }}">
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('eng_name') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="botany_name">Botany Name</label>
                                            <input
                                                class="form-control @error('botany_name') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter attribute botany_name"
                                                id="botany_name"
                                                name="botany_name"
                                                value="{{ old('botany_name', $seedling->botany_name) }}"
                                            />
                                            <input type="hidden" name="seedling_id" value="{{ $seedling->id }}">
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('botany_name') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="cultivateTitle">CultivateTitle</label>
                                            <input
                                                class="form-control @error('cultivateTitle') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter attribute cultivateTitle"
                                                id="cultivateTitle"
                                                name="cultivateTitle"
                                                value="{{ old('cultivateTitle', $seedling->cultivateTitle) }}"
                                            />
                                            <input type="hidden" name="seedling_id" value="{{ $seedling->id }}">
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('cultivateTitle') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="soilTitle">SoilTitle</label>
                                            <input
                                                class="form-control @error('soilTitle') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter attribute soilTitle"
                                                id="soilTitle"
                                                name="soilTitle"
                                                value="{{ old('soilTitle', $seedling->soilTitle) }}"
                                            />
                                            <input type="hidden" name="seedling_id" value="{{ $seedling->id }}">
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('soilTitle') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="growTitle">GrowTitle</label>
                                            <input
                                                class="form-control @error('growTitle') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter attribute growTitle"
                                                id="growTitle"
                                                name="growTitle"
                                                value="{{ old('growTitle', $seedling->growTitle) }}"
                                            />
                                            <input type="hidden" name="seedling_id" value="{{ $seedling->id }}">
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('growTitle') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="medicineTitle">MedicineTitle</label>
                                            <input
                                                class="form-control @error('medicineTitle') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter attribute medicineTitle"
                                                id="medicineTitle"
                                                name="medicineTitle"
                                                value="{{ old('medicineTitle', $seedling->medicineTitle) }}"
                                            />
                                            <input type="hidden" name="seedling_id" value="{{ $seedling->id }}">
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('medicineTitle') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="duration">Duration</label>
                                            <input
                                                class="form-control @error('duration') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter attribute duration"
                                                id="duration"
                                                name="duration"
                                                value="{{ old('duration', $seedling->duration) }}"
                                            />
                                            <input type="hidden" name="seedling_id" value="{{ $seedling->id }}">
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('duration') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="origin">Origin</label>
                                            <input
                                                class="form-control @error('origin') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter attribute origin"
                                                id="origin"
                                                name="origin"
                                                value="{{ old('origin', $seedling->origin) }}"
                                            />
                                            <input type="hidden" name="seedling_id" value="{{ $seedling->id }}">
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('origin') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="race">Race</label>
                                            <input
                                                class="form-control @error('race') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter seedling race"
                                                id="race"
                                                name="race"
                                                value="{{ old('race', $seedling->race) }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('race') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="type_id">Type</label>
                                            <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror">
                                                <option value="0">Select a type</option>
                                                @foreach($types as $type)
                                                    @if ($seedling->type_id == $type->id)
                                                        <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                                                    @else
                                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('type_id') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="categories">Categories</label>
                                            <select name="categories[]" id="categories" class="form-control" multiple>
                                                @foreach($categories as $category)
                                                    @php $check = in_array($category->id, $seedling->categories->pluck('id')->toArray()) ? 'selected' : ''@endphp
                                                    <option value="{{ $category->id }}" {{ $check }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="price">Price</label>
                                            <input
                                                class="form-control @error('price') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter seedling price"
                                                id="price"
                                                name="price"
                                                value="{{ old('price', $seedling->price) }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('price') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="sale_price">Special Price</label>
                                            <input
                                                class="form-control"
                                                type="text"
                                                placeholder="Enter seedling special price"
                                                id="sale_price"
                                                name="sale_price"
                                                value="{{ old('sale_price', $seedling->sale_price) }}"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="quantity">Quantity</label>
                                            <input
                                                class="form-control @error('quantity') is-invalid @enderror"
                                                type="number"
                                                placeholder="Enter seedling quantity"
                                                id="quantity"
                                                name="quantity"
                                                value="{{ old('quantity', $seedling->quantity) }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('quantity') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="weight">Weight</label>
                                            <input
                                                class="form-control"
                                                type="text"
                                                placeholder="Enter seedling weight"
                                                id="weight"
                                                name="weight"
                                                value="{{ old('weight', $seedling->weight) }}"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="cultivate">Cultivate</label>
                                    <textarea name="cultivate" id="cultivate" rows="8" class="form-control">{{ old('cultivate', $seedling->cultivate) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="soil">Soil</label>
                                    <textarea name="soil" id="soil" rows="8" class="form-control">{{ old('soil', $seedling->soil) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="grow">Grow</label>
                                    <textarea name="grow" id="grow" rows="8" class="form-control">{{ old('grow', $seedling->grow) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="medicine">Medicine</label>
                                    <textarea name="medicine" id="medicine" rows="8" class="form-control">{{ old('medicine', $seedling->medicine) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input"
                                                   type="checkbox"
                                                   id="status"
                                                   name="status"
                                                   {{ $seedling->status == 1 ? 'checked' : '' }}
                                                />Status
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input"
                                                   type="checkbox"
                                                   id="featured"
                                                   name="featured"
                                                   {{ $seedling->featured == 1 ? 'checked' : '' }}
                                                />Featured
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="tile-footer">
                                <div class="row d-print-none mt-2">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Seedling</button>
                                        <a class="btn btn-danger" href="{{ route('admin.seedlings.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane" id="images">
                    <div class="tile">
                        <form action="{{ route('admin.seedlings.images.upload') }}" method="POST" role="form" enctype="multipart/form-data">
                            @csrf
                            <h3 class="tile-title">seedling Images</h3>
                            <hr>
                            <div class="tile-body">
                                <div class="form-group">
                                    <input type="hidden" name="seedling_id" value="{{ $seedling->id }}">
                                    @csrf
                                    <label class="control-label">seedling Image</label>
                                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                                    @error('image') {{ $message }} @enderror
                                </div>
                            </div>
                            <div class="tile-footer">
                                <div class="row d-print-none mt-2">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Upload Images</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                            @if ($seedling->images)
                                <hr>
                                <div class="row">
                                    @foreach($seedling->images as $image)
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <img src="{{ asset($image->full) }}" id="brandLogo" class="img-fluid" alt="img">
                                                    <a class="card-link float-right text-danger" href="{{ route('admin.seedlings.images.delete', $image->id) }}">
                                                        <i class="fa fa-fw fa-lg fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/bootstrap-notify.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/app.js') }}"></script>
    <script>
        Dropzone.autoDiscover = false;

        $( document ).ready(function() {
            $('#categories').select2();

            let myDropzone = new Dropzone("#dropzone", {
                paramName: "image",
                addRemoveLinks: false,
                maxFilesize: 4,
                parallelUploads: 2,
                uploadMultiple: false,
                url: "{{ route('admin.seedlings.images.upload') }}",
                autoProcessQueue: false,
            });
            myDropzone.on("queuecomplete", function (file) {
                window.location.reload();
                showNotification('Completed', 'All seedling images uploaded', 'success', 'fa-check');
            });
            $('#uploadButton').click(function(){
                if (myDropzone.files.length === 0) {
                    showNotification('Error', 'Please select files to upload.', 'danger', 'fa-close');
                } else {
                    myDropzone.processQueue();
                }
            });
            function showNotification(title, message, type, icon)
            {
                $.notify({
                    title: title + ' : ',
                    message: message,
                    icon: 'fa ' + icon
                },{
                    type: type,
                    allow_dismiss: true,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                });
            }
        });
    </script>
@endpush
