  <header id="header" class="fixed-top ">
      <div class="container d-flex align-items-center justify-content-between">
          <h1 class="logo"><a href="index.html">Techie</a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html" class="logo"><img src="{{ asset('frontend') }}/assets/img/logo.png" alt="" class="img-fluid"></a>-->

          <nav id="navbar" class="navbar">
              <ul>
                  <li>
                      <a class="nav-link scrollto" onclick="goToHome(this)" href="javascript:void(0);"
                          data-url="{{ url('/') }}">Home</a>
                  </li>
                  <li>
                      <a href="javascript:void(0);" class="nav-link scrollto" onclick="goToAbout(this)"
                          data-url="{{ url('/') }}">About</a>
                  </li>
                  <li>
                      <a href="javascript:void(0);" class="nav-link scrollto" onclick="goToFeature(this)"
                          data-url="{{ url('/') }}">Feature</a>
                  </li>
                  <li>
                      <a href="javascript:void(0);" class="nav-link scrollto" onclick="goToFaq(this)"
                          data-url="{{ url('/') }}">Faq</a>
                  </li>
                  <li><a class="getstarted scrollto" href="{{ route('login') }}">Login</a></li>
              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
          </nav>
          <!-- .navbar -->

      </div>
  </header>
