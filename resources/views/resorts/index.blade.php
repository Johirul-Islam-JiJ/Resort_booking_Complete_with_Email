@extends('home')

@section('styles')
    <style>
        .w-5 {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <form action="" method="GET">
                                    <div class="form-group">
                                        <input type="search" name="search" id="search" class="form-control"
                                            value='' placeholder="Search By Name, email, price ">
                                    </div>
                                    <button class="btn-primary btn-sm">Search</button>
                                </form>
                            </div>

                            <div class="col-md-4">
                                <div class="float-end"><a class="btn btn-success btn-sm"
                                        href="{{ route('resorts.create') }}">Add
                                        Resort</a> <a href="{{ url('home') }}" class="btn btn-primary btn-sm ">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">SI.</th>
                                <th scope="col">R.Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Location</th>
                                <th scope="col">Price</th>
                                <th scope="col">Image</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($resorts as $resort)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $resort->name }}</td>
                                    <td>{{ $resort->description }}</td>
                                    <td>{{ $resort->location }}</td>
                                    <td>{{ $resort->price }}</td>
                                    <td>
                                        <img src="{{ $resort->image }}" width="80px" height="80px" alt=""
                                            class="img-fluid">
                                    </td>
                                    <td>{{ $resort->deleted_at ? 'Inactive' : 'Active' }}</td>

                                    <td>
                                        @if ($resort->deleted_at)
                                            <a title="restore" class=" mb-1 btn btn-success px-3 btn-sm"
                                                href="{{ route('resorts.restore', $resort->id) }}">
                                                <i class="fas fa-trash-restore"></i>
                                            </a>
                                            <a title="delete" class=" px-3 btn btn-danger btn-sm "
                                                href="{{ route('resorts.force-delete', $resort->id) }}">
                                                <i class="fa fa-trash "></i>
                                            </a>
                                        @else
                                            <a title="edit" class="mb-1 px-3 btn btn-primary btn-sm "
                                                href="{{ route('resorts.edit', $resort->id) }}">
                                                <i class="fa fa-edit "></i>
                                            </a>

                                            <form action="{{ route('resorts.destroy', ['resort' => $resort->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button title="Trash" class=" px-3 btn btn-danger btn-sm ">
                                                    <i class="fa fa-trash "></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <span class="float-end">
                    {{ $resorts->links() }}
                </span>
            </div>
        </div>
    </div>
@endsection
