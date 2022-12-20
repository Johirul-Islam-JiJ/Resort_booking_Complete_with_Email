@extends('home')

@section('content')

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    @if (isset($category))
                        <div class="card-header"> Update Category
                            <a class="btn btn-success btn-sm float-right" href="{{ route('categories.index') }}">Back</a>
                        </div>
                    @else
                        <div class="card-header"> Create Category
                            <a class="btn btn-success btn-sm float-right" href="{{ route('categories.index') }}">Back</a>
                        </div>
                    @endif
                    <div class="card-body">

                        @if (isset($category))
                            <form method="POST" action="{{ route('categories.update', $category->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                            @else
                                <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
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

                        @if (isset($category))
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control mb-3" id="name" name="name"
                                    value="{{ $category->name }}">
                            </div>
                        @else
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control mb-3" id="name" name="name"
                                    value="{{ old('name') }}">
                            </div>
                        @endif


                        @if (isset($category))
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
