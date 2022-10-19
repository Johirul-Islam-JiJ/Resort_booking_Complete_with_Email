@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            Edit Resort
                            <a href="{{ route('resorts.index') }}" class="btn btn-primary btn-sm float-end">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('resorts.update', $resorts->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $resorts->id }}">
                            <div class=" row input-group col-md-12 mb-3">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ $resorts->name }}" id="name" aria-describedby="name">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="location"
                                        class="form-label @error('location') is-invalid @enderror">Location</label>
                                    <input type="text" name="location" value="{{ $resorts->location }}"
                                        class="form-control" id="location" aria-describedby="location">
                                    @error('location')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>

                            <div class=" row input-group col-md-12 mb-3">
                                <div class="col-md-6 mb-3">
                                    <label for="image"
                                        class="form-label @error('image') is-invalid @enderror">Image</label>
                                    <input type="file" name="image" class="form-control" id="image">
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <img src="{{ $resorts->image }}" width="80px" height="80px" alt="">
                                </div>
                            </div>

                            <div class=" row input-group col-md-12 mb-3">
                                <div class=" col-md-6 mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea type="text" name="description" cols="30" rows="4"
                                        class="form-control
                                        @error('description') is-invalid @enderror"> {{ $resorts->description }}
                                    </textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class=" col-md-6 mb-3">
                                    <label for="price"
                                        class="form-label @error('price') is-invalid @enderror">Price</label>
                                    <input type="text" name="price" value="{{ $resorts->price }}" class="form-control"
                                        id="price">
                                    @error('price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
