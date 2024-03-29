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
                        @foreach($addresses as $address)
                            <div class="address-container">
                                <p>{{$address['company']}}</p>
                                <p>{{$address->getFullName()}}</p>
                                <p>{{$address['address']}}</p>
                                <p>{{$address->getFullCity()}}</p>
                                <p>{{$address['phone_number']}}</p>
                                <button onclick="openAddressForm({{$address}});" class="edit-btn">Edit</button>
                                <form action="{{ route('address.destroy', $address) }}" method="POST">
                                    @csrf
                                    @method('Delete')
                                    <button id="delete-btn">Delete</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button id="new-address">New address</button>
            </div>
        </div>
    </div>
</div>
<form id="form-address" method="post" action="{{@route('address.store')}}" style="display: none;">
    @csrf
    <div class="form-header">
        <h2>Edit an address</h2>
        <img id="close-btn" src="https://cdn-icons-png.flaticon.com/512/660/660252.png">
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
            <div style="position: relative;" class="form-input">
                <div class="city-list">
                    <a style="display: none; cursor: default;">No data available</a>
                </div>
                <input id="city-input" name="city" type="text" placeholder="">
                <div class="form-label">City</div>
            </div>
            <div style="position: relative;" class="form-input">
                <div class="district-list">
                    <a style="display: none; cursor: default;">No data available</a>
                </div>
                <input id="district-input" name="district" type="text" placeholder="">
                <div class="form-label">District</div>
            </div>
            <div style="position: relative;" class="form-input">
                <div class="ward-list">
                    <a style="display: none; cursor: default;">No data available</a>
                </div>
                <input id="ward-input" name="ward" type="text" placeholder="">
                <div class="form-label">Ward</div>
            </div>
        </div>
        <div class="form-input">
            <input type="number" name="phone_number" type="text" placeholder="">
            <div class="form-label">Phone number</div>
        </div>
    </div>
    <button id="save-btn">Save</button>
</form>


@endsection

@section('styles')
    <style>
        .city-list, .district-list, .ward-list{
            display: none;
            flex-direction: column;
            background-color: white;
            position: absolute;
            overflow-y: scroll;
            bottom: 4rem;
            right: 0;
            max-height: 300px;
            width: 100%;
            z-index: 2;
        }

        .city-list a, .district-list a, .ward-list a{
            font-size: 16px;
            cursor: pointer;
            font-weight: 400;
            font-family: 'EB Garamond', serif;
            height: 40px;
            line-height: 40px;
            padding-left: 20px;
        }

        .city-list a:hover, .district-list a:hover, .ward-list a:hover{
            background-color: #d6d8da;
        }

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

        .form-input input, .form-input select {
            border: none;
            border-bottom: 1px solid grey;
            width: 100%;
            font-size: 1.3rem;
            font-family: 'EB Garamond', serif;
            background-color: transparent;
        }

        .form-input select{
            outline: none;
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
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
        const inputs = document.querySelectorAll('.form-input input');
        const form_labels = document.querySelectorAll('.form-input .form-label');
        const new_address = document.getElementById('new-address');
        const form_address = document.getElementById('form-address');
        const close_btn = document.getElementById('close-btn')
        const edit_buttons = document.querySelectorAll('.edit-btn');
        const city_list = document.querySelector('.city-list');
        const city_input = document.getElementById('city-input');
        const district_list = document.querySelector('.district-list');
        const district_input = document.getElementById('district-input');
        const ward_list = document.querySelector('.ward-list');
        const ward_input = document.getElementById('ward-input');

        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
            method: "GET",
            responseType: "application/json",
        };

        var promise = axios(Parameter);
        promise.then(function(result) {
            renderCity(result.data);
        });

        function renderCity(data) {


            for (const x of data) {
                var city = document.createElement('a');
                city.innerHTML = x.Name;
                city_list.appendChild(city);
            }


            city_input.addEventListener('blur', function(){
                let done = false;
                city_items.forEach(function(item){
                    if (item.innerHTML === city_input.value){
                        done = true;
                    }
                })
                if (!done){
                    city_input.value = "";
                }
                setTimeout(function(){
                    city_list.style.display = 'none';
                }, 200);
            })

            const city_items = city_list.querySelectorAll('a');
            city_items.forEach(function(item){
                item.addEventListener('click', function(){
                    if (item !== city_items[0]){
                        city_input.value = item.innerHTML;
                        console.log(item.innerHTML);
                        let form_label = city_input.parentElement.querySelector('.form-label');
                        form_label.style.top = '-3.3rem';
                        form_label.style.fontSize = '1rem';
                        form_label.style.color = 'black';
                        city_list.style.display = 'none';
                    }

                    if (city_input.value !== "") {
                        const district_input = document.getElementById('district-input');
                        const result = data.filter(n => n.Name === city_input.value);
                        district_list.innerHTML = "";
                        district_input.value = "";
                        for (const k of result[0].Districts) {
                            var district = document.createElement('a');
                            district.innerHTML = k.Name;
                            district_list.appendChild(district);
                        }

                        const district_items = district_list.querySelectorAll('a');

                        district_items.forEach(function(item){
                            item.addEventListener('click', function(){

                                if (item !== district_items[0]){
                                    console.log(item.innerHTML);
                                    district_input.value = item.innerHTML;
                                    let form_label = district_input.parentElement.querySelector('.form-label');
                                    form_label.style.top = '-3.3rem';
                                    form_label.style.fontSize = '1rem';
                                    form_label.style.color = 'black';
                                    district_list.style.display = 'none';
                                }

                                if (district_input.value !== "") {
                                    const dataCity = data.filter((n) => n.Name === city_input.value);
                                    const ward_input = document.getElementById('ward-input');
                                    const dataWards = dataCity[0].Districts.filter(n => n.Name === district_input.value)[0].Wards;
                                    ward_list.innerHTML = "";
                                    ward_input.value = "";
                                    for (const z of dataWards) {
                                        var ward = document.createElement('a');
                                        ward.innerHTML = z.Name;
                                        ward_list.appendChild(ward);
                                    }

                                    const ward_items = ward_list.querySelectorAll('a');

                                    ward_items.forEach(function(item){
                                        item.addEventListener('click', function(){
                                            console.log("a");
                                            if (item !== district_items[0]){
                                                ward_input.value = item.innerHTML;
                                                let form_label = ward_input.parentElement.querySelector('.form-label');
                                                form_label.style.top = '-3.3rem';
                                                form_label.style.fontSize = '1rem';
                                                form_label.style.color = 'black';
                                                ward_list.style.display = 'none';
                                            }
                                        })
                                    })
                                }
                            })
                        })
                    }
                })
            })
        }



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
            inputs[4].value = address['city'];
            inputs[5].value = address['district'];
            inputs[6].value = address['ward'];
            inputs[7].value = address['phone_number'];
            inputs.forEach(function(item){
                item.focus();
            })
        }

        close_btn.addEventListener('click', function(event){
            form_address.style.display = 'none';
            inputs.forEach(function(item){
                item.value = "";
            })
        });

        inputs.forEach(function(item){
            const city_items = city_list.querySelectorAll('a');
            const district_items = district_list.querySelectorAll('a');
            const ward_items = ward_list.querySelectorAll('a');
            item.addEventListener('focus', function(){
                let form_label = this.parentElement.querySelector('.form-label');
                form_label.style.top = '-3.3rem';
                form_label.style.fontSize = '1rem'
                form_label.style.color = 'black';

                if (item.name === 'city'){
                    city_list.style.display = 'flex';
                    city_items.forEach(function(item) {
                        if (item.innerHTML !== 'No data available') {
                            item.style.display = 'block';
                        }
                        else{
                            item.style.display = 'none';
                        }
                    });
                }
                if (item.name === 'district'){
                    district_list.style.display = 'flex';
                    district_items.forEach(function(item) {
                        if (item.innerHTML !== 'No data available') {
                            item.style.display = 'block';
                        }
                        else{
                            item.style.display = 'none';
                        }
                    });
                }

                if (item.name === 'ward'){
                    ward_list.style.display = 'flex';
                    ward_items.forEach(function(item) {
                        if (item.innerHTML !== 'No data available') {
                            item.style.display = 'block';
                        }
                        else{
                            item.style.display = 'none';
                        }
                    });
                }
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

