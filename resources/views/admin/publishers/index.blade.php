@extends('admin.layouts.master-admin')
@section('content-admin')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Publishers</h4>
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

    <div class="row mb-2">
        <div class="col-sm-4">
            <a href="{{route('publishers.create')}}" class="add-publisher-button"><i class="mdi mdi-plus-circle mr-2"></i> Add Publisher</a>
        </div>
    </div>


    <table class="table table-centered table-striped mb-0 text-center" style="margin-top: 2rem ">
        <thead class="thead">
        <tr>
            <th>#</th>
            <th>Name</th>

        </tr>
        </thead>

        @foreach($publishers as $publisher)
            <tr>
                <td>{{ $publisher->id}}</td>
                <td>{{ $publisher->name }}</td>
{{--                <td>--}}
{{--                    <form action="{{ route('$publishers.edit', $publisher) }}" method="GET">--}}
{{--                        @method('Edit')--}}
{{--                        <button class="btn btn-outline-info">Edit</button>--}}
{{--                    </form>--}}
{{--                </td>--}}
{{--                <td>--}}
{{--                    <form action="{{ route('$publishers.destroy', $publisher) }}" method="POST">--}}
{{--                        @csrf--}}
{{--                        @method('Delete')--}}
{{--                        <button class="btn btn-outline-danger">Delete</button>--}}
{{--                    </form>--}}
{{--                </td>--}}




{{--            </tr>--}}
        @endforeach
    </table>

    <nav>
        <ul class="pagination pagination-rounded mb-0">
            {{$publishers->links()}}
        </ul>
    </nav>

@endsection

@section('styles')
    <style>
        table thead{
            background-color: #0b3937;
            color: white;
        }

        .add-publisher-button{
            text-transform: uppercase;
            font-weight: 500;
            font-size: 1rem;
            letter-spacing: .1em;
            height: 40px;
            border: 2px solid #0b3937;
            background-color: #0b3937;
            padding: 0.5rem 1.5rem!important;
            margin-top: 3rem;
            color: white!important;
            margin-bottom: 5rem;
            cursor: pointer;
            transition: .3s all 1ms;
        }
        .add-publisher-button:hover{
            background-color: #234c4b;
        }
    </style>
@stop
