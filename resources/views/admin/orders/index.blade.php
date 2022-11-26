@extends('admin.layouts.master-admin')
@section('content-admin')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Users</h4>
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




    <table class="table table-centered table-striped mb-0 text-center">
        <thead class="thead">
        <tr>
            <th>#</th>
            <th>User's Name</th>
            <th>Customer's Name</th>
            <th>Company</th>
            <th>Address</th>
            <th>City</th>
            <th>Country</th>
            <th>Phone Number</th>
            <th>Cash</th>
            <th>Status</th>
            <th>Verify</th>
            <th>View</th>
            <th>Delete</th>
        </tr>
        </thead>

        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id}}</td>
                <td>{{ $order->getUserName() }}</td>
                <td>{{ $order->full_name }}</td>
                <td>{{ $order->company }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->city }}</td>
                <td>{{ $order->country }}</td>
                <td>{{ $order->phone_number }}</td>
                <td>{{ $order->total }}</td>
                <td>{{ $order->getStatus() }}</td>

                @if ($order->status === 0)
                <td>
                    <a href="{{route('orders.verify', ['order' => $order])}}">
                        <button class="btn btn-outline-info">Verify</button>
                    </a>
                </td>
                @else
                    <td>
                        <a href="{{route('orders.redo', ['order' => $order])}}">
                            <button class="btn btn-outline-info">Redo</button>
                        </a>
                    </td>
                @endif

                <td>
                    <a href="{{ route('orders.show', ['order' => $order])}}">
                        <button class="btn btn-outline-info">View</button>
                    </a>
                </td>


                <td>
                    <form action="{{route('orders.destroy', $order)}}" method="POST">
                        @csrf
                        @method('Delete')
                        <button class="btn btn-outline-danger">Delete</button>
                    </form>
                </td>


            </tr>
        @endforeach
    </table>

    <nav>
        <ul class="pagination pagination-rounded mt-3">
            {{$orders->links()}}
        </ul>
    </nav>

@endsection

@section('styles')
    <style>
        table thead {
            background-color: #0b3937;
            color: white;
        }

        .page-item.active .page-link{
            background-color: #f0efea!important;
            color: black !important;
        }
    </style>
@stop
