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
                        <h3>
                            Booking List <span> </span>
                            <a href="{{ route('homepage') }}" class="btn btn-primary btn-sm float-end">Back</a>
                        </h3>
                    </div>

                    <table class=" table ">
                        <thead>
                            <tr>
                                <th scope="col">SI.</th>
                                <th scope="col">Resort name</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">CheckIn</th>
                                <th scope="col">CheckOut</th>
                                {{-- <th scope="col">Status</th> --}}
                                {{-- <th scope="col">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $booking->resort->name }}</td>
                                    <td>{{ $booking->name }}</td>
                                    <td>{{ $booking->email }}</td>
                                    <td>{{ $booking->phone }}</td>
                                    <td>{{ $booking->checkin }}</td>
                                    <td>{{ $booking->checkout }}</td>
                                    {{-- <td>{{ $booking->deleted_at ? 'Inactive' : 'Active' }}</td> --}}

                                    {{-- <td>
                                        @if ($resort->deleted_at)
                                            <a title="restore" class=" mb-1 btn btn-success px-3 btn-sm" id="trash"
                                                href="{{ route('resorts.restore', $resort->id) }}"><i
                                                    class="fas fa-trash-restore"></i>
                                            </a>


                                            <a title="delete" class=" px-3 btn btn-danger btn-sm "
                                                href="{{ route('resorts.force-delete', $resort->id) }}">
                                                <i class="fa fa-trash "></i></a>
                                        @else
                                            <a title="edit" class="mb-1 px-3 btn btn-primary btn-sm "
                                                href="{{ route('resorts.edit', $resort->id) }}"><i class="fa fa-edit "></i></a>

                                            <form action="{{ route('resorts.destroy', ['resort' => $resort->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button title="Trash" class=" px-3 btn btn-danger btn-sm ">
                                                    <i class="fa fa-trash "></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <span>
                {{ $bookings->links() }}
            </span>
        </div>
    </div>
@endsection
