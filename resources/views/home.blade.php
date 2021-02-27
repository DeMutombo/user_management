@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4>Welcome {{ auth()->user()->name }}</h4>
            <h5>This is your Dashboard</h5>
        </div>
    </div>
</div>
@endsection

