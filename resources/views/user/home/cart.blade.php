@extends('user.layouts.master-user')
@section('title', 'Shakespeare and Company')


@section('content')
    @if (Cart::count() > 0)
<div class="cart-container">

    <div class="cart-table">
        @foreach($carts as $book)
            <?php $book_id_order[] = $book->id ?>
            <div class="book-row">
                <div class="book-notice">
                    <a href="{{route('product.show', ['id'=>$book->id])}}"><img src="{{$book->options->image}}"></a>
                    <div class="book-information">
                        <a href="{{route('product.show', ['id'=>$book->id])}}"><h1>{{$book->name}}</h1></a>
                        <h2>{{$book->options->author}}</h2>
                        <p>Isbn : {{$book->options->isbn}}</p>
                    </div>
                </div>
                <div class="book-detail">
                    <div class="price-label">Price</div>
                    <div class="price">{{$book->price}}.00 €</div>
                </div>
                <div class="book-detail">
                    <div class="price-label">Quantity</div>
                    <div class="price quantity-change">
                        <a href="{{route('cart.decrease', ['id'=>$book->rowId])}}">-</a>
                        {{$book->qty}}
                        <a href="{{route('cart.add', ['id'=>$book->id])}}">+</a>
                    </div>
                </div>
                <div class="book-detail">
                    <div class="price-label">Total</div>
                    <div class="price">{{$book->price * $book->qty}}.00 €</div>
                </div>
                <div>
                    <a href="{{route('cart.remove', ['id'=>$book->rowId])}}"><img style="width: 25px" src="https://cdn-icons-png.flaticon.com/512/1828/1828939.png"></a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="checkout-container">
        <div class="address-container">
            <div class="address-label">Delivery address</div>
            <p>Company</p>
            <p>First Last Name</p>
            <p>Address</p>
            <p>312312 City</p>
            <p>Country</p>
            <p>32130123</p>
            <button id="add-btn">Add an address</button>
            @if (session()->has('id'))
            <button id="select-btn">Select an address</button>
            @endif
        </div>
        <div class="row">
            <div class="checkout-label">Number of items</div>
            <div class="checkout-price">{{Cart::count()}}</div>
        </div>
        <div class="row">
            <div class="checkout-label">SUB TOTAL TTC (€)</div>
            <div class="checkout-price">{{$subtotal}}€</div>
        </div>
        <button onclick="addOrder();" id="checkout-btn">Payment</button>
    </div>
</div>

<form id="form-address" style="display: none;">
    @csrf
    <div class="form-header">
        <h2>Edit an address</h2>
        <img id="close-form-btn" src="https://cdn-icons-png.flaticon.com/512/660/660252.png">
    </div>
    <div  class="form-container">
        <div class="form-row">
            <div class="form-input">
                <input name="first_name" type="text" placeholder="">
                <div class="form-label">First name</div>
            </div>
            <div class="form-input">
                <input name="last_name" type="text" placeholder="">
                <div class="form-label">Full last name</div>
            </div>
        </div>
        <div class="form-input">
            <input name="company" type="text" placeholder="">
            <div class="form-label">Company</div>
        </div>
        <div class="form-input">
            <input name="address" type="text" placeholder="">
            <div class="form-label">Address</div>
        </div>
        <div class="form-row">
            <div class="form-input">
                <input name="postal_code" type="text" placeholder="">
                <div class="form-label">Postal Code</div>
            </div>
            <div class="form-input">
                <input name="city" type="text" placeholder="">
                <div class="form-label">City</div>
            </div>
            <div class="form-input">
                <input name="country" type="text" placeholder="">
                <div class="form-label">Country</div>
            </div>
        </div>
        <div class="form-input">
            <input name="phone_number" type="text" placeholder="">
            <div class="form-label">Phone number</div>
        </div>
    </div>
    <button type="button" id="save-btn">Save</button>
</form>
@if (session()->has('id'))
<div id="select-addresses-container" class="select-addresses-container" style="display: none;">
    <div class="form-header">
        <h2>Select an address</h2>
        <img id="close-address-btn" src="https://cdn-icons-png.flaticon.com/512/660/660252.png">
    </div>
    <div class="select-addresses-grid">
        @foreach($addresses as $address)
            <div class="select-address-container">
                <p>{{$address['company']}}</p>
                <p>{{$address->getFullName()}}</p>
                <p>{{$address['address']}}</p>
                <p>{{$address->getFullCity()}}</p>
                <p>{{$address['country']}}</p>
                <p>{{$address['phone_number']}}</p>
                <button onclick="selectAddress({{$address}})" class="select-address-btn">Select</button>
            </div>
        @endforeach
    </div>
</div>
@endif
@else
    <h2>Your cart is empty</h2>
@endif
@stop

@section('styles')
    <style>
        .select-addresses-grid{
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-column-gap: 80px;
            grid-row-gap: 60px;
            padding: 0;
            margin: 20px;
        }

        .select-address-container{
            border: 4px solid grey;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .select-address-container p{
            font-family: "EBGaramond",serif;
            font-weight: 100;
            font-size: 1.2rem;
            font-feature-settings: "onum";
            font-variant-numeric: oldstyle-nums;
            margin: 4px 0;
        }

        .select-addresses-container{
            overflow: scroll;
        }

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
            width: 100%;
            margin: 5rem auto;
            justify-content: center;
        }

        .cart-table{
            flex-basis: 60%;
            display: flex;
            flex-direction: column;
        }

        .checkout-container{
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .book-row{
            display: flex;
            width: 100%;
            flex-direction: row;
            margin: 1.5rem 0;
        }
        .book-notice{
            display: flex;
            flex-direction: row;
            width: 45%;
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
            text-align: left;
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
            margin-right: 1rem;
        }

        .price-label, .checkout-label, .address-label,
        #checkout-btn, #select-btn, #add-btn, #save-btn{
            text-transform: uppercase;
            font-weight: 500;
            font-size: 1rem;
            letter-spacing: .1em;
        }

        .address-label{
            margin-bottom: 1rem;
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

        #checkout-btn, #select-btn{
            border: 2px solid #0b3937;
            background-color: #0b3937;
            color: white;
            padding: 0.5rem 1.5rem!important;
            margin-top: 2rem;
            cursor: pointer;
            transition: .3s all 1ms;
        }

        #select-btn,#add-btn{
            margin: 6px 0;
        }

        #checkout-btn:hover, #select-btn:hover{
            background-color: #234c4b;
        }

        #add-btn, #save-btn, .select-address-btn{
            border: 2px solid black;
            background-color: transparent;
            padding: 6px 14px;
            text-transform: uppercase;
            transition: all .3s cubic-bezier(.25,.8,.5,1);
            cursor: pointer;
        }

        .address-container{
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            padding: 10px 25px;
            background-color: #f0efea;
        }

        .address-container p{
            font-family: "EBGaramond",serif;
            font-weight: 100;
            font-size: 1.2rem;
            font-feature-settings: "onum";
            font-variant-numeric: oldstyle-nums;
            margin: 4px 0;
        }

        .form-header{
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .form-header img{
            width: 30px;
            height: 30px;
            cursor: pointer;
        }

        .form-header h2, .select-addresses-container h2{
            font-size: 2rem;
            font-family: "Swiss721",sans-serif;
            font-weight: 400;
            margin: 0;
        }

        #form-address, .select-addresses-container{
            width: 89%;
            height: 80%;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f0efea;
            z-index: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 3rem;
        }

        .form-container{
            display: flex;
            flex-direction: column;
            width: 100%;
            margin: auto;
        }

        .form-row{
            display: flex;
            flex-direction: row;
            width: 100%;
        }

        .form-row .form-input{
            margin-right: 1.5rem;
            flex-basis: 50%;
        }

        .form-row .form-input:last-child{
            margin-right: 0;
        }

        .form-input{
            margin: 1rem 0;
        }

        .form-input input {
            border: none;
            border-bottom: 1px solid grey;
            width: 100%;
            font-size: 1.3rem;
            font-family: 'EB Garamond', serif;
            background-color: transparent;
        }

        .form-input input:focus-visible {
            border: none;
            outline: none;
            border-bottom: 2px solid black;
        }

        .form-input .form-label{
            position: relative;
            top: -1.8rem;
            transition: all 0.3s ease;
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;
            font-size: 1.3rem;
            font-family: 'EB Garamond', serif;
            color: grey;
        }
    </style>
@stop

@section('scripts')
    @if (Cart::count() > 0)
    <script>
        const inputs = document.querySelectorAll('.form-input input');
        const form_labels = document.querySelectorAll('.form-input .form-label');
        const form_address = document.getElementById('form-address');
        const close_form_btn = document.getElementById('close-form-btn');
        const close_address_btn = document.getElementById('close-address-btn');
        const add_btn = document.getElementById('add-btn');
        const save_btn = document.getElementById('save-btn');
        const select_btn = document.getElementById('select-btn');
        const address_p = document.querySelectorAll('.address-container p');
        const select_addresses_container = document.getElementById('select-addresses-container');



        add_btn.addEventListener('click', function(){
            form_address.style.display = 'flex';
        });

        save_btn.addEventListener('click', function(){
            form_address.style.display = 'none';
            inputs.forEach(function(item){
                item.blur();
            })

            address_p[0].innerHTML = inputs[2].value;
            address_p[1].innerHTML = inputs[0].value + " " + inputs[1].value;
            address_p[2].innerHTML = inputs[3].value;
            address_p[3].innerHTML = inputs[4].value + " " + inputs[5].value;
            address_p[4].innerHTML = inputs[6].value;
            address_p[5].innerHTML = inputs[7].value;
        });

        close_form_btn.addEventListener('click', function(event){
            form_address.style.display = 'none';
            inputs.forEach(function(item){
                item.value = "";
                item.blur();
            })
        });

        select_btn.addEventListener('click', function(event){
            select_addresses_container.style.display = 'block';
        });

        close_address_btn.addEventListener('click', function(event){
            select_addresses_container.style.display = 'none';
        });

        function selectAddress(address){
            address_p[0].innerHTML = address['company']
            address_p[1].innerHTML = address['first_name'] + " " + address['last_name'];
            address_p[2].innerHTML = address['address'];
            address_p[3].innerHTML = address['postal_code'] + " " + address['city'];
            address_p[4].innerHTML = address['country'];
            address_p[5].innerHTML = address['phone_number'];
            select_addresses_container.style.display = 'none';
        }

        function addOrder(){
            $.ajax({
                type: "POST",
                url: "order/add",
                data:{
                    _token: "{{csrf_token()}}",
                    company: address_p[0].innerHTML,
                    full_name :address_p[1].innerHTML,
                    address: address_p[2].innerHTML,
                    city: address_p[3].innerHTML,
                    country: address_p[4].innerHTML,
                    phone_number: address_p[5].innerHTML,
                    user_id: {{session()->get('id')}},
                    total: {{$subtotal}},
                    //Fix this issue
                    book_id_order: {{json_encode($book_id_order)}}
                },
                success: function() {
                    {{--window.location.href = "{{route('home.index')}}";--}}
                }
            })
        }

        inputs.forEach(function(item){
            item.addEventListener('focus', function(){
                let form_label = this.parentElement.querySelector('.form-label');
                form_label.style.top = '-3.3rem';
                form_label.style.fontSize = '1rem'
                form_label.style.color = 'black';
            });

            item.addEventListener('blur', function(){
                let form_label = this.parentElement.querySelector('.form-label');
                if (item.value === "") {
                    form_label.style.top = '-1.8rem';
                    form_label.style.fontSize = '1.3rem'
                }
                form_label.style.color = 'grey';
            });
        })

        form_labels.forEach(function(item){
            item.addEventListener('click', function(){
                this.parentElement.querySelector('input').focus();
            });
        })

    </script>
    @endif
@stop


