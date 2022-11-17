@extends('user.layouts.master-user')
@section('title', 'My account')


@section('content')
<div class="account">
    <div class="account-container">
        <h1>My account</h1>
        <div class="account-info">
            <div class="account-detail">
                <h3>My account details</h3>
                <div class="account-detail-container">
                    <div class="account-email">{{$account->email}}</div>
                    <div class="account-name">{{$account->name}}</div>
                </div>
            </div>
            <div class="account-addresses">
                <h3>My addresses</h3>
                <div class="account-addresses-container">
                    <div class="account-address">Your saved addresses are displayed here.</div>
                    <div class="addresses-grid">
                        <div class="address-container">
                            <p>Company</p>
                            <p>Anh Tuan</p>
                            <p>Address</p>
                            <p>3213321 City</p>
                            <p>Country</p>
                            <p>0941974458</p>
                        </div>
                        <div class="address-container">
                            <p>Company</p>
                            <p>Anh Tuan</p>
                            <p>Address</p>
                            <p>3213321 City</p>
                            <p>Country</p>
                            <p>0941974458</p>
                        </div>
                    </div>
                </div>
                <button id="new-address">New address</button>
            </div>
        </div>
    </div>
</div>

<form id="form-address" style="display: none;">
    <div class="form-header">
        <h2>Edit an address</h2>
        <img id="close-btn" src="https://cdn-icons-png.flaticon.com/512/660/660252.png">
    </div>
    <div  class="form-container">
        <div class="form-row">
            <div class="form-input">
                <input type="text" placeholder="">
                <div class="form-label">First name</div>
            </div>
            <div class="form-input">
                <input type="text" placeholder="">
                <div class="form-label">Full last name</div>
            </div>
        </div>
        <div class="form-input">
            <input type="text" placeholder="">
            <div class="form-label">Company</div>
        </div>
        <div class="form-input">
            <input type="text" placeholder="">
            <div class="form-label">Address</div>
        </div>
        <div class="form-row">
            <div class="form-input">
                <input type="text" placeholder="">
                <div class="form-label">Postal Code</div>
            </div>
            <div class="form-input">
                <input type="text" placeholder="">
                <div class="form-label">City</div>
            </div>
            <div class="form-input">
                <input type="text" placeholder="">
                <div class="form-label">Country</div>
            </div>
        </div>
        <div class="form-input">
            <input type="text" placeholder="">
            <div class="form-label">Phone number</div>
        </div>
    </div>
    <button id="save-btn">Save</button>
</form>


@endsection

@section('styles')
    <style>
        .account-addresses{
            flex-basis: 80%;
        }

        .addresses-grid{
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-column-gap: 24px;
            grid-row-gap: 60px;
            padding: 0;
            margin: 20px;
        }

        .address-container{
            width: 100%;
            border: 4px solid grey;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px 0;
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

        .form-header h2{
            font-size: 2rem;
            font-family: "Swiss721",sans-serif;
            font-weight: 400;
        }

        #form-address{
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

        .account{
            width: 85%;
            margin: auto;
        }

        #save-btn{
            margin: auto;
        }

        .account button, #save-btn{
            border: 2px solid black;
            background-color: transparent;
            padding: 6px 14px;
            font-size: 15px;
            text-transform: uppercase;
            font-family: "Swiss721",sans-serif;
            letter-spacing: .15rem;
            font-weight: 500;
            transition: all .3s cubic-bezier(.25,.8,.5,1);
            margin-top: 0.5rem;
            cursor: pointer;
        }

        .account button:hover, #save-btn:hover{
            background-color: rgba(0, 0,0, 0.1);
        }

        .account-info{
            display: flex;
        }

        .account-info{
            font-family: "EBGaramond",serif;
            font-size: 1.3rem;
        }

        .account-detail{
            flex-basis: 30%;
            margin-right: 16px;
        }

        .account-detail-container, .account-addresses-container{
            background-color: #f2f2f2;
            padding: 16px;
        }


        .account-email{
            font-style: italic;
            margin: 0.3rem 0;
        }

        .account-name{
            font-weight: bold;
            margin: 0.3rem 0;
        }

        #order-btn{
            border: 2px solid #0b3937;
            background-color: #0b3937;
            color: white;
            padding: 0.5rem 1.5rem!important;
            margin-top: 2rem;
            cursor: pointer;
            transition: .3s all 1ms;
            text-transform: uppercase;
            font-weight: 500;
            font-size: 1rem;
            letter-spacing: .1em;
        }

        #order-btn:hover{
            background-color: #234c4b;
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
    <script>
        const inputs = document.querySelectorAll('.form-input input');
        const form_labels = document.querySelectorAll('.form-input .form-label');
        const new_address = document.getElementById('new-address');
        const form_address = document.getElementById('form-address');
        const close_btn = document.getElementById('close-btn')

        new_address.addEventListener('click', function(event){
            form_address.style.display = 'flex';
        })

        close_btn.addEventListener('click', function(event){
            form_address.style.display = 'none';
        })

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
@stop

