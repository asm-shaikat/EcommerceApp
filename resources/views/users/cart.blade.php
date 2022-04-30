<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products | RedStore</title>
    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="{{ url('/')}}"><img src="{{ asset('images/logo.png')}}" alt="logo" width="125px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="{{ url('/')}}">Home</a></li>
                    <li><a href="{{ url('/prodct') }}">Products</a></li>                    
                    <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="{{ url('/account')}} >Account</a></li>
                </ul>
            </nav>
            <a href="{{ url('/cart')}} ><img src="{{ asset('images/cart.png')}}" width="30px" height="30px"></a>
            <img src="images/menu.png')}}" class="menu-icon" onclick="menutoggle()">
        </div>
    </div>

    <!-- Cart items details -->
    <div class="small-container cart-page">
        <table>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
            @foreach($info as $info)
            <?php $x=0;?>
            <tr>
                <td>
                    <div class="cart-info">
                        <!-- <img src="{{ asset('images/buy-1.jpg')}}"> -->
                        <div>
                            <p>{{$info->title}}</p>
                            <small>Price: {{$info->price}}</small>
                            <br>
                            <a href="{{ url('/removeFromCart/'.$info->id) }}">Remove</a>
                        </div>
                    </div>
                </td>
                <td>{{$info->amount}}</td>
                <td>{{$a=$info->amount*$info->price}}</td>
            </tr>
            @endforeach
        </table>
        <!-- $x=x+$info->amount*$info->price; -->
        <div class="total-price">
            <table>
           
                <tr>
                    <td>Total</td>
                    <td>{{$sum}}</td>
                </tr>
            </table>
        </div>
        <a href="{{ url('/example1') }}" style="margin-left: 500px;"><button type="submit" class="btn btn-success">Confirm Order</button></a>
    </div>
    
    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p>Download App for Android and ios mobile phone.</p>
                    <div class="app-logo">
                        <img src="{{ asset('images/play-store.png')}}">
                        <img src="{{ asset('images/app-store.png')}}">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="{{ asset('images/logo-white.png')}}">
                    <p>Our Purpose Is To Sustainably Make the Pleasure and Benefits of Sports Accessible to the Many.
                    </p>
                </div>
                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Follow Us</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Instagram</li>
                        <li>Youtube</li>
                    </ul>
                </div>
            </div>
            <hr>
           
        </div>
    </div>

    <!-- javascript -->

    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";
        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px"
            }
            else {
                MenuItems.style.maxHeight = "0px"
            }
        }
    </script>

</body>

</html>
