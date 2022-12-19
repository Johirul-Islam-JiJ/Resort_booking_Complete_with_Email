@extends('home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            User List
                            <span class="mr-3">
                                <a class="btn btn-primary btn-sm float-end" href="{{ route('users.create') }}">Add User
                                </a>
                            </span>
                            <a href="{{ route('home') }}" class="btn btn-primary btn-sm float-end">Back
                            </a>
                        </h3>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">SI.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->deleted_at ? 'Inactive' : 'Active' }}</td>
                                    <td>
                                        @if ($user->deleted_at)
                                            <a title="Restore" class="btn btn-success btn-sm px-3"
                                                href={{ route('users.restore', $user->id) }}>
                                                <i class="fas fa-trash-restore"></i>
                                            </a>

                                            <a title="Delete" class="btn btn-warning btn-sm px-3"
                                                href={{ route('users.forceDelete', $user->id) }}>
                                                <i class="fa fa-trash "></i>
                                            </a>
                                        @else
                                            <form action="{{ route('users.destroy', ['user' => $user->id]) }}"
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
                    {{ $users->links() }}
                </span>
            </div>
        </div>
    </div>
@endsection
