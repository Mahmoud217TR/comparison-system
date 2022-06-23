@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Welcome {{ auth()->user()->name }}
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item text-center">
                            <a href="{{ route('comparison.create') }}" class="btn btn-primary">Create a new Add</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
