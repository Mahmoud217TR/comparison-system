@extends('layouts.app')

@section('title',"Your Comparisons")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <tr>
                        <th>#</th>
                        <th>Comparison</th>
                        <th>Items</th>
                        <th>Show</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach ($comparisons as $key=>$comparison)
                    <tr>
                        <td>
                            {{ ($comparisons->currentPage()-1)*($comparisons->perPage())+$key+1 }}
                        </td>
                        <td>
                            {{ $comparison->title }}
                        </td>
                        <td>
                            {{ $comparison->items_count }}
                        </td>
                        <td>
                            <a href="{{ route('comparison.show', $comparison) }}" class="btn btn-sm btn-primary">Show</a>
                        </td>
                        <td>
                            <a href="{{ route('comparison.edit', $comparison) }}" class="btn btn-sm btn-success">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('comparison.destroy', $comparison) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <ul class="pagination  justify-content-center">
                    @if($comparisons->currentPage() > 1)
                        <li class="page-item">
                            <a class="page-link" href="{{ $comparisons->previousPageUrl() }}">Previous</a>
                        </li>
                    @endif
                    <li class="page-item active">
                        <span class="page-link"> {{ $comparisons->currentPage() }} </span>
                    </li>
                    @if($comparisons->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $comparisons->nextPageUrl() }}">Next</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endsection