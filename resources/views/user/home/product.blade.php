@extends('user.layouts.master-user')
@section('title', $book->title)

@section('content')
<div id="book-container">
    <div id="book-cover">
        <img src="{{$book->image}}">
    </div>
    <div id="book-information">
        <h2>{{$book->title}}</h2>
        <a href="{{@route('home.index')}}?author={{$book->author}}"><h3>{{$book->author}}</h3></a>

        <p>{{$book->price}}.00 €</p>
        <div id="description">{{$book->getSummaryDescription()}}</div>
        <div id="book-detail">
            <span>Publisher: {{$book->publisher()}}</span>
            <span>Pages Quantity: {{$book->page_quantity}}</span>
            <span>Isbn: {{$book->isbn}}</span>
        </div>

    </div>
    <div id="add-to-cart-container">
        <p>Available Online</p>
        <img src="{{asset('img/cart.svg')}}">
        <a href="{{route('cart.add', ['id'=>$book->id])}}" id="add-to-cart-button">Add to cart</a>
        <span>We ship worldwide</span>
    </div>
</div>
@stop

@section('scripts')
@stop

@section('styles')
<style>
    #book-container {
        display: flex;
        flex-direction: row;
        margin: 0 5.5rem;
        margin-top: 6rem;
    }

    #book-cover {
        width: 30%;
        height: 23rem;
        background-repeat: no-repeat;
        background-size: contain;
        background-image: url({{asset('img/BOOK-MOCK.jpg')}});
        position: relative;
    }

    #book-cover img {
        bottom: 6%;
        width: 52%;
        margin-left: -40.5%;
        position: absolute;
        left: 50%;
    }

    #book-information {
        width: 40%;
    }

    #book-information h2, #book-information h3, #add-to-cart-container span, #book-information #description{
        font-family: 'EB Garamond', serif;
        margin: 0;
    }

    #book-information h2 {
        font-size: 2.2rem;
        font-weight: 400;
    }

    #book-information h3 {
        margin-top: 1rem;
        font-size: 1.2rem;
        font-weight: 400;
        color: #0b3937;
        text-transform: uppercase;
        cursor: pointer;
    }


    #book-information p {
        font-size: 1.2rem;
        margin: 0;
        margin-top: 20px;
        letter-spacing: .1em;
    }

    #book-information #description{
        font-size: 21px;
        margin-top: 20px;
    }


    #book-detail {
        display: flex;
        flex-direction: column;
        margin-top: 3rem;
    }

    #book-detail span{
        text-transform: uppercase;
        color: #718096;
        letter-spacing: .1em;
        font-size: 12px;
    }

    #add-to-cart-container {
        display: flex;
        flex-direction: column;
        border: 2px solid #000;
        padding: 2rem 8rem 2rem 2rem;
        height: 50%;
        width: 12%;
        margin-left: 5rem;
    }

    #add-to-cart-container img {
        width: 40px;
    }

    #add-to-cart-container p {
        text-transform: uppercase;
        color: #388e3c;
        letter-spacing: .1em;
        font-size: 12px;
    }

    #add-to-cart-container #add-to-cart-button {
        cursor: pointer;
        color: white;
        background-color: #0b3937;
        text-transform: uppercase;
        padding: 10px 20px;
        letter-spacing: .1em;
        font-weight: 600;
        border: none;
        margin-top: 20px;
        transition: 0.2s;
    }

    #add-to-cart-container #add-to-cart-button:hover{
        background-color: #f18366;
    }

    #add-to-cart-container span {
        font-size: 16px;
        color: #718096;
        margin-top: 30px;
    }
</style>
@stop

