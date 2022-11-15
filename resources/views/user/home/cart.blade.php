@extends('user.layouts.master-user')
@section('title', 'Shakespeare and Company')


@section('content')
    @if (Cart::count() > 0)
<div class="cart-container">

    <table class="cart-table">
        @foreach($carts as $book)
            <tr class="book-row">
                <th class="book-notice">
                    <img src="{{$book->options->image}}">
                    <div class="book-information">
                        <h1>{{$book->name}}</h1>
                        <h2>{{$book->options->author}}</h2>
                        <p>Isbn : {{$book->options->isbn}}</p>
                    </div>
                </th>
                <th class="book-detail">
                    <div class="price-label">Price</div>
                    <div class="price">{{$book->price}}.00 €</div>
                </th>
                <th class="book-detail">
                    <div class="price-label">Quantity</div>
                    <div class="price quantity-change">
                        <a href="{{route('cart.decrease', ['id'=>$book->rowId])}}">-</a>
                        {{$book->qty}}
                        <a href="{{route('cart.add', ['id'=>$book->id])}}">+</a>
                    </div>
                </th>
                <th class="book-detail">
                    <div class="price-label">Total</div>
                    <div class="price">{{$book->price * $book->qty}}.00 €</div>
                </th>
                <th>
                    <a href="{{route('cart.remove', ['id'=>$book->rowId])}}"><img style="width: 25px" src="https://cdn-icons-png.flaticon.com/512/1828/1828939.png"></a>
                </th>
            </tr>
        @endforeach
    </table>
    <div class="checkout-container">
        <div class="row">
            <div class="checkout-label">Number of items</div>
            <div class="checkout-price">{{Cart::count()}}</div>
        </div>
        <div class="row">
            <div class="checkout-label">SUB TOTAL TTC (€)</div>
            <div class="checkout-price">{{$subtotal}}€</div>
        </div>
        <a href="{{route('checkout.index')}}"><button id="checkout-btn">Proceed to checkout</button></a>
    </div>
</div>
    @else
        <h2>Your cart is empty</h2>
    @endif
@stop

@section('styles')
    <style>
        h2 {
            margin: 2rem auto;
            font-size: 2rem;
            font-family: "EBGaramond",serif;
            text-align: center;
        }

        .row{
            display: flex;
            align-items: center;
            margin: 1rem 0;
        }

        .cart-container{
            display: flex;
            margin-left: 5rem;
            margin-top: 5rem;
        }

        .checkout-container{
            flex-basis: 40%;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-left: -5rem;
        }

        table{
            flex-basis: 100%;
        }

        .book-row{
            display: flex;
            flex-direction: row;
            margin: 1.5rem 0;
        }
        .book-notice{
            display: flex;
            flex-direction: row;
            width: 35%;
        }

        .book-notice img{
            width: 120px;
        }

        .book-information{
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-left: 1rem;
        }

        .book-information h1, .book-information h2{
            font-family: 'EB Garamond', serif;
            margin: 0;
        }

        .book-information h1{
            font-weight: 400;
            font-size: 2rem;
        }

        .book-information h2{
            text-transform: uppercase;
            font-weight: 300;
            font-size: 1.5rem;
            margin-top: 4px;
        }

        .book-information p{
            font-weight: 400;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin: 0;
            margin-top: 16px;
        }

        .book-detail{
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            margin-left: 2rem;
        }

        .price-label, .checkout-label, #checkout-btn{
            text-transform: uppercase;
            font-weight: 500;
            font-size: 1rem;
            letter-spacing: .1em;
        }

        .checkout-label{
            margin-right: 2rem;
        }

        .price, .checkout-price{
            font-weight: 500;
            font-size: 1.5rem;
            letter-spacing: .1em;
        }

        .price{
            margin-top: 20px;
        }

        .quantity-change{
            display: flex;
            width: 100%;
            justify-content: space-between;
        }

        .quantity-change a{
            cursor: pointer;
        }

        #checkout-btn{
            border: 2px solid #0b3937;
            background-color: #0b3937;
            color: white;
            padding: 0.5rem 1.5rem!important;
            margin-top: 2rem;
            cursor: pointer;
            transition: .3s all 1ms;
        }

        #checkout-btn:hover{
            background-color: #234c4b;
        }
    </style>
@stop


