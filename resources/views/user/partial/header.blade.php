<div id="app-header">
    <div id="menu-primary">
        <form id="search-bar" action="{{@route('home.index')}}">
            <div id="search-input">
                <input type="text" id="search-input-field" placeholder="Search books" name="q"/>
                <img src="https://cdn-icons-png.flaticon.com/512/622/622669.png">
            </div>
        </form>
        <a href = "{{route('cart.index')}}" id="shopping-cart-container">
            <img src="{{asset('img/cart.svg')}}">
            <span id="cart-count" class="cart-count">{{Cart::count()}}</span>
        </a>
        @if (session()->has('name'))
                <div id="login-button" href="">{{session()->get('name')}}
                    <div id="menu-account">
                        <a href="{{route('account.index')}}">Account</a>
                        @if (session()->get('level') === 0)
                        <a href="{{route('books.index')}}">Dashboard</a>
                        @endif
                        <a href="{{route('logout')}}">Sign Out</a>
                    </div>
                </div>

        @else
            <a id="login-button" href="{{route('login')}}">Sign In</a>
        @endif


    </div>
    <div id="menu-secondary">
        <div class="menu">
            <p>Books</p>
            <p>Tote Bags</p>
            <p>Yearly Subscription</p>
            <p>Gifts</p>
        </div>
        <a href="{{route('home.index')}}">
            <img id="menu-logo" src="{{asset('img/logo-shakespeare-and-company.svg')}}">
        </a>
        <div class="menu">
            <p>Podcasts</p>
            <p>Events</p>
            <p>History</p>
            <p>Café</p>
            <p>Contact</p>
        </div>
    </div>
</div>

<script>
    const login_button = document.getElementById('login-button');
    const menu_account = document.getElementById('menu-account');

    document.addEventListener('click', function(event){
        if (!menu_account.contains(event.target) && !login_button.contains(event.target)){
            menu_account.style.display = 'none';
        }
    })

    login_button.addEventListener('click', function(){
        if (menu_account.style.display === 'none'){
            menu_account.style.display = 'flex';
        }else{
            menu_account.style.display = 'none';
        }
    });
</script>

<style>
    #menu-account{
        display: none;
        position: absolute;
        flex-direction: column;
        top: 3rem;
        right: -2rem;
        background-color: white;
        height: 20px;
        width: 100px;
        padding: 1.5rem;
        justify-content: center;
        align-items: flex-start;
        cursor: default;
        line-height: 0.3rem;
    }


    #menu-account a{
        margin: 10px 0;
    }

    #app-header {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    #menu-primary{
        display: flex;
        flex-direction: row;
        background-color: #f0efea;
        width: 100%;
        align-items: center;
        justify-content: flex-end;
    }


    #login-button{
        background: none;
        border: none;
        outline: none;
        letter-spacing: .1rem;
        cursor: pointer;
        font-size: 11px;
        height: 50px;
        padding: 0 20px;
        line-height: 50px;
    }

    #search-bar{
        background-color: white;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        border: none;
        padding: 10px;
        margin: 16px 20px;
    }

    #search-input input{
        background: none;
        border: unset;
        outline: none;
        width: 600px;
        font-family: 'EB Garamond', serif;
        font-size: 20px;
    }

    #search-bar img{
        width: 12px;
        cursor: pointer;
    }

    #shopping-cart-container{
        position: relative;
        margin-right: 20px;
        cursor: pointer;
    }

    #shopping-cart-container img{
        width: 40px;
    }

    #shopping-cart-container span{
        background-color: black;
        padding: 3px 7px;
        color: white;
        border-radius: 50%;
        position: absolute;
        top: -10px;
        right: -10px;
        font-size: 12px;
    }

    #login-button {
        text-transform: uppercase;
        margin-right:100px;
        cursor: pointer;
        position: relative;
    }

    #menu-secondary {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        margin-top:20px;
    }

    #menu-secondary a{
        width: 14%;
    }

    #menu-logo{
        width: 100%;
        cursor: pointer;
    }

    #menu-secondary .menu{
        display: flex;
        flex-direction: row;
        margin: 0px 80px;
        align-items: center;
    }

    #menu-secondary .menu p{
        text-transform: uppercase;
        margin: 0px 10px;
        letter-spacing: .1em;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;

    }

</style>
