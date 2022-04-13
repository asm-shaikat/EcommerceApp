<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this pageadmin/ -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
    <style>
        .fform {
            width: 700px;
            height: 500px;
            margin-top: 20px;

        }

        .marginn {
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
                <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                    <div class="ps-lg-1">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                            <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
                        <button id="bannerClose" class="btn border-0 p-0">
                            <i class="mdi mdi-close text-white me-0"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- admins sidebar -->
        @include('admin.sidebar')
        @include('admin.navbar')
        <div class="container-fluid page-body-wrapper">

            <!-- admins navbar -->
            <div style="height: 50px; width:110px;">
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @else(session()->has('error'))
            <div class="alert alert-success">
                {{ session()->get('error') }}
            </div>
            @endif
            </div>
            <div class="fform container">
                <form action="{{ url('/updateProducts1/'.$products->id) }}" method="POST" enctype="multipart/form-data">
                  
                @csrf
                    <h3 class="bg-purple text-center" style="background-color: purple; padding: 10px;border-radius: 10px;">ADD PRODUCTS</h3>

                    <div class="marginn"><label for="Product">Product Title:</label>
                        <input type="text" name="title" class="form-control " placeholder="Enter products title" style="color: red;" value="{{$products->title}}">
                    </div>

                    <div class="marginn"><label for="Price">Product's price:</label>
                        <input type="number" name="price" class="form-control" placeholder="Enter products price" style="color: red;" value="{{$products->price}}">
                    </div>

                    <div class="marginn"><label for="Amount">Products Amount:</label>
                        <input type="number" name="amount" class="form-control" placeholder="Enter products amount" style="color: red;" value="{{$products->amount}}">
                    </div>

                    <div class="marginn"><label for="file">Product's picture</label><br>
                        <label for="file">Old picture</label>
                        <img src="{{$products->pictures}}" style="margin-bottom: 10px;" alt="" width="100px" height="100px">
                        <input type="file" name="image[]" class="form-control " placeholder="Enter products picture" style="color: red;" multiple>
                    </div>

                    <div class="marginn"><label for="Description">Products Description</label> 
                        <input type="text" class="form-control" name="description" id="" placeholder="Description" style="color: red;" value="{{$products->description}}">
                </div>
                <div class="marginn"></div>
                    <button type="submit" class="btn btn-success container">Submit</button>
                </form>
            </div>

        </div>
    </div>
    @include('admin.script');
</body>

</html>