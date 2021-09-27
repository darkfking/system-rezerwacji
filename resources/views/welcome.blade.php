<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BeskidCar</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pl.min.js"></script>
        <link rel="icon" href="https://beskidcar.pl/wp-content/uploads/2021/05/cropped-flavicon-32x32.jpg">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
        <!-- Styles -->

        <style>
            html {
                scroll-behavior:smooth;
            }
            .btn-danger {
                background-color: #ed1e24 !important;
            }
            .btn-danger:hover {
                background-color: #a80b11 !important;
            }
            .color-danger {
                color: #ed1e24 !important;
            }
            .nav-link {
                color: black !important;
                font-size: 25px;
                font-family: 'Montserrat', sans-serif;
            }
            .nav-link:hover {
                color: #ed1e24 !important;
            }
            .font {
                font-family: 'Montserrat', sans-serif;
            }
            .btn-rotate {
                transform: rotate(90deg); 
            }
            .font-weight {
                font-weight: 700;
            }
            #nav {
                border-bottom: 4px solid #ed1e24;
            }
            .map-responsive {
                overflow:hidden;
                padding-bottom:56.25%;
                position:relative;
                height:0;
            }
            .map-responsive iframe{
                left:0;
                top:0;
                height:100%;
                width:100%;
                position:absolute;
            }
            .no-deco {
                color: #ebebeb;
            }
            .no-deco:hover {
                color: black;
            }
        </style>
    </head>
    
    <body>
        <nav class="navbar navbar-expand-lg navbar-light" id="nav">
            <a class="navbar-brand" href="http://beskidcar.pl"> 
                <img src="../../public/logo.png" alt="" width="20%" height="20%"> 
                <!--<img src="logo.png" alt="" width="20%" height="20%"> -->
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link " href="#">REZERWACJA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#samochod">NASZE SAMOCHODY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#kontakt">KONTAKT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#cennik">CENNIK</a>
                </li>

                
              </ul>
              @if (Route::has('login'))
              
                  @auth
                  @can('isAdmin')
                    <a href="{{ route('booking.admin') }}" class="text-sm text-gray-700 underline">Panel zarządzania</a>
                  @endcan

                  @can('isCustomer')
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Panel zarządzania</a>
                  @endcan
                  
                  @else

                      @if (Route::has('register'))
                          <a href="{{ route('register') }}" class="btn btn-danger btn-lg font-weight">ZAREJESTRUJ SIĘ</a>
                      @endif
                  @endauth
              
                @endif
            </div>
          </nav>
        
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-6 text-center">
                    <h1 class="font">WYBIERZ SWÓJ <br> <h1 class="font color-danger">WYMARZONY SAMOCHÓD</h1> </h1>
                    <p>Aktualnie w ofercie posiadamy samochody z rocznika 2019 w bardzo dobrym stanie technicznym. Samochody są zatankowane do pełna, czyste i gotowe do drogi.</p>
                    <a class="btn btn-danger btn-lg font-weight" href="#samochod">WYBIERZ SAMOCHÓD</a>
                </div>
                <div class="col-md-6"> 
                    <!-- 
                    <img class="img-fluid" src="main1.png" alt="Toyota Proace Verso">
                    <img class="img-fluid" src="../../public/main1.png" alt="Toyota Proace Verso" > -->
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img class="d-block w-100" src="../../public/I30NPerformance3.png" alt="Hyundai I30 N">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="../../public/main1.png" alt="Toyota Proace">
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mt-5 p-5 text-white" style="background: #ed1e24; ">
            <div class="row mt-3 mb-3">
                <div class="col-md-12">
                    <h1 class="font">DLACZEGO BESKIDCAR?</h1>
                    <p>Mamy wiele zalet, ale te są najważniejsze</p>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-3 ">                    
                    <h1> 
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-calendar-date-fill" viewBox="0 0 16 16">
                            <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zm5.402 9.746c.625 0 1.184-.484 1.184-1.18 0-.832-.527-1.23-1.16-1.23-.586 0-1.168.387-1.168 1.21 0 .817.543 1.2 1.144 1.2z"/>
                            <path d="M16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-6.664-1.21c-1.11 0-1.656-.767-1.703-1.407h.683c.043.37.387.82 1.051.82.844 0 1.301-.848 1.305-2.164h-.027c-.153.414-.637.79-1.383.79-.852 0-1.676-.61-1.676-1.77 0-1.137.871-1.809 1.797-1.809 1.172 0 1.953.734 1.953 2.668 0 1.805-.742 2.871-2 2.871zm-2.89-5.435v5.332H5.77V8.079h-.012c-.29.156-.883.52-1.258.777V8.16a12.6 12.6 0 0 1 1.313-.805h.632z"/>
                        </svg>
                    </h1>
                    <h3 class="font">Rezeracja Online</h3>
                    <p>Jako nieliczni w tej branży posiadamy profesjonalny, bezpieczny i wygodny system rezerwacji ONLINE. Nie musisz dzwonić aby pytać o termin, nie musisz wypłacać gotówki. Wszystko załatwisz tutaj!</p>
                </div>

                <div class="col-md-3">
                    <h1>
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-credit-card-fill" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0V4zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7H0zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1z"/>
                        </svg>
                    </h1> 
                    <h3 class="font">Bezpieczne płatności</h3>
                    <p>Płatności sa realizowane dzięki bramce PayNow z mBanku. Dzięki temu nie musisz martwić się o swoje pieniądzę!</p>
                </div>

                <div class="col-md-3">
                    <h1>
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-telephone-inbound-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM15.854.146a.5.5 0 0 1 0 .708L11.707 5H14.5a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 1 0v2.793L15.146.146a.5.5 0 0 1 .708 0z"/>
                        </svg>    
                    </h1> 
                    <h3 class="font">Całodobowe wsparcie</h3>
                    <p>Jeżeli nie znalazłeś tutaj odpowiedzi na swoje pytanie, jesteśmy do Twojej dyspozycji całą dobę! Zadzwoń na jeden z numerów aby uzyskać odpowiedź!</p>
                </div>

                <div class="col-md-3">
                    <h1>
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-cash-coin" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                            <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                            <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                            <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
                        </svg>
                    </h1> 
                    <h3 class="font">Najlepsze ceny</h3>
                    <p>Oferujemy najlepsze ceny idące w parze z jakością swodczonych przez nas usług. Nie znajdziesz w umowie żadnych podejrzanych zapisów, wszystko jest jasne i proste! O nic nie musisz się martwić!</p>
                </div>
            </div>
        </div>

        <div class="container">

            <div id="samochod" class="mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="font">Nasze samochody</h1>
                    </div>
                </div> 

                @foreach ($cars as $car)
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img class="img-fluid rounded float-left" src="{{ $car->zdjecie }}" alt="{{ $car->marka }}" >
                                        </div>
                                        <div class="col-md-6 float-right">
                                            <h3 class="font text-center">{{ $car->marka }} {{ $car->model }}</h3>
                                            <p class="text-center">{{ $car->opis }} <br> <a href="https://beskidcar.pl/toyota-proace/">Zobacz pełen opis</a> <br> <a href="{{route('booking.check', $car->id)}}">Sprawdź wolne terminy</a></p>
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <th>Silnik</th>
                                                    <td>{{ $car->silnik }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Moc</th>
                                                    <td>{{ $car->moc }} KM</td>
                                                </tr>
                                                <tr>
                                                    <th>Liczba miejsc</th>
                                                    <td>{{ $car->liczbaMiejsc }}</td>
                                                </tr>
                                                
                                                </tbody>
                                                
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row mt-3 p-3">
                                        <a href="{{route('booking.create', $car->id)}}" class="btn btn-danger font btn-block" style="font-size: 2em;">Zarezerwuj</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="container-fluid mt-5 p-5 text-white" style="background: #ed1e24; ">

            <div id="kontakt">
                <div class="row">
                    <div class="col-md-6">
                        <div class="map-responsive">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10305.921501581779!2d19.6736674!3d49.7770307!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x48be34a975d5a583!2sBeskid%20Car!5e0!3m2!1spl!2spl!4v1630592681964!5m2!1spl!2spl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <h2 class="font">Kontakt</h2>
                        <h5>Telefon</h5> 
                        <h2>
                            <a href="tel:+48 786 255 681" class="font no-deco">+48 539 333 001</a>  
                        </h2> 
                         
                        <h5>Email</h5>
                        <h2>
                           <a href="mailto:biuro@beskidcar.pl" class="font no-deco">biuro@beskidcar.pl</a> 
                        </h2>

                        <h5>Adres</h5>
                        <h2 class="font no-deco">
                            <p>Budzów centrum</p>
                        </h2>

                        <h5>Dane firmy</h5>
                        <h2 class="font no-deco">
                            X-VISION.PL Mateusz Majerski <br>
                            Baczyn 191, 34-211 Budzów <br>
                            NIP: 5521658673 <br>
                            REGON: 122513558
                        </h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mt-5">
            <div id="cennik">
                <div class="row">
                    @foreach ($cars as $car)
                        @if($car->marka != 'Hyundai')                  
                        <div class="col-md-4">
                            <div class="card text-center">
                                <div class="card-body">
                                <h1 class="card-title">{{ $car->marka }} {{ $car->model }}</h1>
                                <h6 class="card-subtitle mb-2 text-muted">Cennik</h6>
                                <h4>1-3 dni - <b>{{ $car->cena }} zł</b></h4>
                                <h4>4-7 dni - <b>{{ $car->cena1 }} zł</b></h4>
                                <h4>8-14 dni - <b>{{ $car->cena2 }} zł</b></h4>
                                <a href="{{route('booking.create', $car->id)}}" class="btn btn-danger font btn-block mt-3">Zarezerwuj</a>
                                </div>
                            </div>
                        </div>
                        @else 
                        <div class="col-md-4">
                            <div class="card text-center">
                                <div class="card-body">
                                <h1 class="card-title">{{ $car->marka }} {{ $car->model }}</h1>
                                <h6 class="card-subtitle mb-2 text-muted">Cennik</h6>
                                <h4>1 doba - <b>{{ $car->cena }} zł</b></h4>
                                <h4>Weekend - <b>{{ $car->cena1 }} zł</b></h4>
                                <h4>Tydzień - <b>{{ $car->cena2 }} zł</b></h4>
                                <a href="{{route('booking.create', $car->id)}}" class="btn btn-danger font btn-block mt-3">Zarezerwuj</a>
                                </div>
                            </div>
                        </div>
                        @endif

                    @endforeach
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="text-center text-lg-start bg-light text-muted mt-5 pt-3">
            <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4 color-danger font">
                    <i class="fas fa-gem me-3"></i>BeskidCar
                    </h6>
                    <p>
                    Zajmujemy się profesjonalnym wynajmem samochodów osobowych, od busów 9 osobowych i kamperów po sportowe szybkie samochody. Każdy znajdzie coś dla siebie
                    </p>
                </div>
                <!-- Grid column -->
        
                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4 color-danger font">
                        Regulamin i umowy
                    </h6>
                    <p>
                        <a href="{{ route('regulamin') }}" class="text-reset">Regulamin wypożyczalni</a>
                    </p>
                    <p>
                        <a href="../../public/regulamin_systemu_rezerwacji.pdf" class="text-reset">Regulamin systemu rezerwacji</a>
                    </p>
                    <p>
                        <a href="{{ asset('umowa.pdf') }}" class="text-reset">Wzór umowy najmu</a>
                    </p>
                    <p>
                        <a href="../../public/polityka_prywatnosci.pdf" class="text-reset">Polityka prywatności</a>
                    </p>
                    
                    
                </div>
                <!-- Grid column -->
        
                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4 color-danger font">
                    Menu
                    </h6>
                    <p>
                    <a href="#" class="text-reset">O nas</a>
                    </p>
                    <p>
                    <a href="#samochod" class="text-reset">Samochody</a>
                    </p>
                    <p>
                    <a href="#kontakt" class="text-reset">Kontakt</a>
                    </p>
                    
                </div>
                <!-- Grid column -->
        
                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4 color-danger font">
                    Kontakt
                    </h6>
                    <p><i class="fas fa-home me-3"></i> Budzów centrum</p>
                    <p>
                    <i class="fas fa-envelope me-3"></i>
                    <a href="mailto:biuro@beskidcar.pl">biuro@beskidcar.pl</a> 
                    </p>
                    <a href="tel:+48 786 255 681" class="font color-danger">+48 539 333 001</a> 
                </div>
                <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
            </section>
            <!-- Section: Links  -->
        
            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2021 Copyright:
            <a class="text-reset fw-bold" href="http://codeify.pl/">codeify.pl</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->

                
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>    
    </body>
</html>
