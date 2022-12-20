@extends('home')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Sub Category</div>

                <div class="card-body">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">S.I</th>
                                <th scope="col">Sub Category Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sub_categories as $sub_category)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $sub_category->name }}</td>
                                <td>{{ $sub_category->category->name }}</td>
                                <td>
                                    <a href="{{ route('sub-categories.edit', $sub_category->id) }}">Edit</a>

                                    <form action="{{ route('sub-categories.destroy', $sub_category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    <a class="btn btn-success" href="{{ route('sub-categories.create') }}">Create category</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
