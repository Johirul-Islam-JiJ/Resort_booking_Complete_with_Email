{{--


@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Edit User
                        <a href="{{ url('view-user') }}"  class="btn btn-primary btn-sm float-end">Back</a>
                    </h3>
                </div>

                <div class="card-body">
                    <form action="/edit-user" method="POST">
                        @csrf

                         <input type="hidden" name="id" value="{{ $users['id'] }}">
                        <div class="mb-3">
                          <label for="name" class="form-label" >Name</label>
                          <input type="text" name="name" class="form-control"  value="{{ $users['name'] }}" id="name">

                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"  value="{{ $users['email'] }}" id="email">
                          </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
