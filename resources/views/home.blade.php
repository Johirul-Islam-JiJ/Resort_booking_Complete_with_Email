@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body text-center">
                    Hello  {{ Auth::user()->name }}, Welcome to Admin Pannel!!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
