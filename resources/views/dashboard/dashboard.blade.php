@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <h1>Hai!!! {{ Auth::user()->name }}</h1>
    </div>
    <div class="row">
        <h2>welcome to Dashbaord</h2>
    </div>
@endsection




