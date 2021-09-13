<div class="py-1 bg-primary">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                        <span class="text">052-4417944</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                        <span class="text">nadavg1000@gmail.com</span>
                    </div>
                    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                        <span class="text">3-5 Business days delivery &amp; Free Returns</span>
                    </div>
                </div>
            </div>
        </div>
      </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html">Nadav's fruit & vegtebales shop</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="{{url('/')}}" class="nav-link">Home</a></li>
          <li class="nav-item active"><a href="{{url('/shop')}}" class="nav-link">shop</a></li>
          
          <li class="nav-item cta cta-colored"><a href="{{url('/cart')}}" class="nav-link"><span class="icon-shopping_cart"></span>[{{Session::has('cart')?
          Session::get('cart')->totalQty:0}}]</a></li>

              @if(Session::has('client'))
              <li class="nav-item active"><a href="{{url('/logout')}}" class="nav-link"><span class="fa fa-user"></span>Logout</a></li>
                @else
                <li class="nav-item active"><a href="{{url('/login')}}" class="nav-link"><span class="fa fa-user"></span>Login</a></li>
                @endif
        </ul>
      </div>
    </div>
  </nav>
<!-- END nav -->
