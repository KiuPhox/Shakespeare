@extends('user.layouts.master-user')
@section('title', 'My account')


@section('content')
<div class="account">
    <div class="account-container">
        <h1>My order details</h1>
        <div class="table-container">
            <table>
                <thead>
                <tr>
                    <th>Book</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($order_details as $order_detail)
                    <tr>
                        <td><a href="{{route('product.show', ['id'=>$order_detail->product_id])}}">
                                {{$order_detail->getBook()->title}}
                            </a></td>
                        <td>{{$order_detail->amount}}</td>
                        <td>{{$order_detail->getSubTotal()}}.00 €</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="table-pagination"></div>
        </div>
    </div>
</div>
@endsection

@section('styles')
    <style>
        .account{
            width: 85%;
            margin: auto;
        }

        table{
            width: 100%;
            text-align: center;
            font-family: "EBGaramond",serif;
            font-size: 1.2rem;
        }
        table thead{
            background-color: #0b3937;
        }

        th, td{
            padding: 20px 0px;
        }

        th {
            color: white;
            font-weight: normal;
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
        const edit_buttons = document.querySelectorAll('.edit-btn');

        new_address.addEventListener('click', function(event){
            form_address.style.display = 'flex';
            form_address.action = "{{@route('address.store')}}";
            inputs.forEach(function(item){
                item.blur();
            })
        });

        function openAddressForm(address){
            form_address.style.display = 'flex';
            form_address.action = "address/update/" + address['id'];

            inputs[0].value = address['first_name'];
            inputs[1].value = address['last_name'];
            inputs[2].value = address['company'];
            inputs[3].value = address['address'];
            inputs[4].value = address['postal_code'];
            inputs[5].value = address['city'];
            inputs[6].value = address['country'];
            inputs[7].value = address['phone_number'];

            inputs.forEach(function(item){
                item.focus();
            })
        }

        // edit_buttons.forEach(function(item, index){
        //     item.addEventListener('click', function(event){
        //         form_address.style.display = 'flex';
        //         form_address.method = 'get';
        //     });
        // });

        close_btn.addEventListener('click', function(event){
            form_address.style.display = 'none';
            inputs.forEach(function(item){
                item.value = "";
                item.blur();
            })
        });

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

