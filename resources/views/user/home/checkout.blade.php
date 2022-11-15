@extends('user.layouts.master-user')
@section('title', 'Shakespeare and Company')


@section('content')
<form>
    <div class="form-container">
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
    <a href=""><button type="submit" id="order-btn">Place Order</button></a>

</form>


@endsection

@section('styles')
    <style>

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
            width: 80%;
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

