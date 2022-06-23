@extends('layouts.app')

@section('title','Edit '.$comparison->title)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Edit {{ $comparison->title }}</h1>
                    </div>
                    <div class="card-content p-2">
                        <form action="{{ route('comparison.update',$comparison) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            @include('comparison.form')
                            <button class="btn btn-success">Update Comparison</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection