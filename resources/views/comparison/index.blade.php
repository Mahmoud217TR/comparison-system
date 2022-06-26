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
                        <th>Options</th>
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
                        <td class="d-sm-flex justify-content-around">
                            <a href="{{ route('comparison.show', $comparison) }}" class="btn btn-sm btn-primary my-1 mx-sm-1" title='show'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                </svg>
                            </a>
                            <a href="{{ route('comparison.edit', $comparison) }}" class="btn btn-sm btn-success my-1 mx-sm-1" title='edit'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                </svg>
                            </a>
                            <form action="{{ route('comparison.destroy', $comparison) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-sm btn-danger my-1 mx-sm-1" title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                    </svg>
                                </button>
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