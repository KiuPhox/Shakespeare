@extends('user.layouts.master-user')
@section('title', 'Shakespeare and Company')



@section('content')
    <div class="books-grid">
    @foreach($books as $book)
        <div id="books-container">
            <div class="book-card">
                <div class="book-cover">
                    <a href="{{route('product.show', ['id'=>$book->id])}}">
                        <img src="{{$book->image}}">
                    </a>
                </div>
                <div class="book-information">
                    <a href="{{route('product.show', ['id'=>$book->id])}}">
                        <h2>{{$book->title}}</h2>
                    </a>
                    <a href="{{@route('home.index')}}?author={{$book->author}}"><h3>{{$book->author}}</h3></a>

                    <p>{{$book->price}}.00 €</p>
                </div>

                <a href="{{route('cart.add', ['id'=>$book->id])}}" class="add-to-cart-container">
                    <img src="{{asset('img/cart.svg')}}">
                    <span>Add to cart</span>
                </a>
            </div>
        </div>
        @endforeach
    </div>

@stop

@section('styles')
    <style>
        #books-container {
        }

        .books-grid{
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-column-gap: 8px;
            grid-row-gap: 60px;
            padding: 0;
            margin-left: 65px;
            margin-top: 5rem;
        }

        .book-card {
            display: flex;
            flex-direction: column;
        }

        .book-cover {
            width: 100%;
            height: 20rem;
            background-repeat: no-repeat;
            background-size: contain;
            background-image: url({{asset('img/BOOK-MOCK.jpg')}});
            position: relative;
        }

        .book-cover img {
            bottom: 11%;
            width: 40%;
            margin-left: -35%;
            position: absolute;
            left: 50%;
        }

        .book-information {
            display: flex;
            flex-direction: column;
        }

        .book-information h2, .book-information h3 {
            font-family: 'EB Garamond', serif;
            margin: 0;
        }

        .book-information h2 {
            font-size: 2rem;
            font-weight: 400;
            margin-top: 4px;
        }

        .book-information h3 {
            margin-top: 1rem;
            font-size: 1.2rem;
            font-weight: 400;
            text-transform: uppercase;
        }

        .book-cover img, .book-information h2, .book-information h3:hover {
            cursor: pointer;
        }

        .book-information p {
            font-size: 1.2rem;
            margin: 0;
            margin-top: 20px;
            letter-spacing: .1em;
        }

        .add-to-cart-container {
            display: flex;
            flex-direction: row;
            align-items: center;
            margin-top: 30px;
        }

        .add-to-cart-container img {
            width: 36px;
        }

        .add-to-cart-container span {
            margin-left: 10px;
            text-transform: uppercase;
            letter-spacing: .1em;

        }

        .add-to-cart-container:hover {
            cursor: pointer;
        }

        .add-to-cart-container:hover > span {
            text-decoration: underline;
        }
    </style>
@stop


