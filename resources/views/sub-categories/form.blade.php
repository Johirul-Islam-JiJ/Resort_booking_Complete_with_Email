@extends('home')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">

                    <div class="card-header">
                        @if (isset($subCategory))
                            Update Sub Category
                        @else
                            Create Sub Category
                        @endif
                        <a class="btn btn-success btn-sm float-right" href="{{ route('sub-categories.index') }}">Back</a>
                    </div>
                    <div class="card-body">

                        @if (isset($subCategory))
                            <form method="POST" action="{{ route('sub-categories.update', $subCategory->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                            @else
                                <form method="POST" action="{{ route('sub-categories.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (isset($subCategory))
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control mb-3" id="name" name="name"
                                    value="{{ $subCategory->name }}">
                            </div>
                        @else
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control mb-3" id="name" name="name"
                                    value="{{ old('name') }}">
                            </div>
                        @endif

                        @if (isset($subCategory))
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-select form-control mb-3" name="category_id" id="category_id">
                                <option selected>Select Category...</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id}}">{{ $category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        @else
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-select form-control mb-3" name="category_id" id="category_id">
                                <option selected>Select Category...</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif


                        @if (isset($subCategory))
                            <button type="submit" class="btn btn-primary">Update</button>
                        @else
                            <button type="submit" class="btn btn-primary">Submit</button>
                        @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
