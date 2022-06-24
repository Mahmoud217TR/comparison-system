@extends('layouts.app')

@section('title',"Your Comparisons")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <tr>
                        <th>Comparison</th>
                        <th>Items</th>
                        <th>Show</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach ($comparisons as $comparison)
                    <tr>
                        <th>
                            {{ $comparison->title }}
                        </th>
                        <th>
                            {{ $comparison->items_count }}
                        </th>
                        <th>
                            <a href="{{ route('comparison.show', $comparison) }}" class="btn btn-sm btn-primary">Show</a>
                        </th>
                        <th>
                            <a href="{{ route('comparison.edit', $comparison) }}" class="btn btn-sm btn-success">Edit</a>
                        </th>
                        <th>
                            <form action="{{ route('comparison.destroy', $comparison) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </th>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection