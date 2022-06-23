@extends('layouts.app')

@section('title','Create')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Create New Comparison</h1>
                    </div>
                    <div class="card-content p-2">
                        <form action="{{ route('comparison.store') }}" method="POST">
                            @csrf
                            @include('comparison.form')
                            <button class="btn btn-primary">Create Comparison</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection