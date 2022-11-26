@extends('admin.layouts.master-admin')
@section('content-admin')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Books</h4>
        </div>
    </div>
</div>

<caption>
    <div class="app-search dropdown d-none d-lg-block mb-3 mt-3">
        <form>
            <div class="input-group">
                <input type="search" name="q" class="form-control dropdown-toggle" placeholder="Search..." id="top-search">
                <span class="mdi mdi-magnify search-icon"></span>
                <div class="input-group-append">
                    <button class="btn" style="background-color: #f0efea" type="submit">Search</button>
                </div>
            </div>

        </form>
    </div>
</caption>





</a>
<table class="table table-centered table-striped mb-0 text-center" >
    <thead class="thead">
    <tr>

        <th>#</th>
        <th>Title</th>
        <th>Author</th>
        <th>Description</th>
        <th>Image</th>
        <th>Price</th>
        <th>Publisher</th>
        <th>Publication Date</th>
        <th>Page Quantity</th>
        <th>Quantity</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>

    @foreach($books as $book)
        <tr >
            <td >{{ $book->id}}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->getSummaryDescription() }}</td>
            <td><img height="150" src="{{ $book->image }}"></td>
            <td>{{ $book->price }}</td>
            <td>{{ $book->publisher() }}</td>
            <td>{{ $book->getPublicationDate()}}</td>
            <td>{{ $book->page_quantity }}</td>
            <td>{{ $book->quantity }}</td>
            <td>
                <form action="{{ route('books.edit', $book) }}" method="GET">
                    @method('Edit')
                    <button class="btn btn-outline-info">Edit</button>
                </form>
            </td>
            <td>
                <form action="{{ route('books.destroy', $book) }}" method="POST">
                    @csrf
                    @method('Delete')
                    <button  class="btn btn-outline-danger">Delete</button>
                </form>
            </td>


        </tr>
    @endforeach
</table>

<nav class="pagination-nav">
    <ul class="pagination pagination-rounded mb-5 mt-5">
        {{$books->links()}}
    </ul>
    <a href="{{route('books.create')}}" class="add-book-button"><i class="mdi mdi-plus-circle mr-2"></i> Add Products</a>
</nav>
@stop
@section('styles')
<style>
    table thead{
        background-color: #0b3937;
        color: white;
    }

    .page-item.active .page-link{
        background-color: #f0efea!important;
        color: black !important;
    }

    .add-book-button{
        text-transform: uppercase;
        font-weight: 500;
        font-size: 1rem;
        letter-spacing: .1em;
        height: 40px;
        border: 2px solid #0b3937;
        background-color: #0b3937;
        padding: 0.5rem 1.5rem!important;
        margin-top: 2rem;
        color: white!important;
        margin-bottom: 2rem;
        cursor: pointer;
        transition: .3s all 1ms;
    }

    .add-book-button:hover{
        background-color: #234c4b;
    }

    .pagination-nav{
        display : flex;
        justify-content : space-between;
        align-items: center;
    }

    .table td{ height: 14px };
</style>
@stop


