{{-- L27: MAKING THE PROFILE DESIGN --}}
@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>{{ $user->name }}</h1>
            <h3>{{ $user->email }}</h3>
        </div>
    </div>


@stop