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
            <th>Book</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        </thead>

        @foreach($order_details as $order_detail)
            <tr>
                <td><a href="{{route('product.show', ['id'=>$order_detail->product_id])}}">
                        {{$order_detail->getBook()->title}}
                    </a></td>
                <td>{{$order_detail->amount}}</td>
                <td>{{$order_detail->getSubTotal()}}.00 €</td>
            </tr>
        @endforeach
    </table>

    <nav>
        <ul class="pagination pagination-rounded mb-0">
            {{$order_details->links()}}
        </ul>
    </nav>

@endsection

@section('styles')
    <style>
        table thead{
            background-color: #0b3937;
            color: white;
        }
    </style>
@stop
