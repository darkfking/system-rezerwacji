@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h2 class="float-left">Lista rezerwacji</h2>
    
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                    Dodaj rezerwację
                </button>

                <a href="{{ route('addition.create') }}" class="btn btn-warning float-right mr-1">Zarządzaj usługami</a>
                <a href="{{ route('cars.create') }}" class="btn btn-success float-right mr-1">Dodaj samochód</a>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Wybierz samochód do rezerwacji</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            @foreach ($cars as $car)
                                <?php
                                    $booki = '/booking/'.$car->id;
                                ?>
                                <a href="{{ $booki }}">{{ $car->marka }} {{ $car->model }}</a>
                              
                            @endforeach
                        </div>
                      </div>
                    </div>
                  </div>  

                   
            </div>
        </div>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Samochód</th>
                <th scope="col">Początek</th>
                <th scope="col">Koniec</th>
                <th scope="col">Dane</th>
                <th scope="col">Akcja</th>
                <th scope="col">Usuń</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($booking as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>
                            @foreach ($cars as $car)
                                @if ($book->carId == $car->id)
                                {{$car->marka}} {{$car->model}}
                                    
                                @endif
                            @endforeach
                        </td>
                        <td>{{ $book->start }} - {{ $book->start_h }}</td>
                        <td>{{ $book->finish }} - {{ $book->finish_h }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="{{'#'.$book->id}}">
                                {{ $book->imie }} {{ $book->nazwisko }}
                            </button>

                            <div class="modal fade" id="{{$book->id}}" tabindex="-1" aria-labelledby="daneLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="{{'#'.$book->id}}">Dane klienta</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h2>Dane klienta</h2>
                                            <b>Imię: </b>{{ $book->imie }} <br>
                                            <b>Nazwisko: </b>{{ $book->nazwisko }} <br>

                                            <b>Kod pocztowy i miejscowość: </b> {{ $book->kodPocztowy }} {{ $book->miejscowosc }} <br>
                                            <b>Adres: </b> {{ $book->adres }} <br>

                                            @if($book->firma != "")
                                                <h2>Dane firmy</h2>
                                                <b>Nazwa firmy: </b> {{ $book->firma }} <br>
                                                <b>NIP: </b> {{ $book->nip }} <br>
                                            
                                            @endif
                                            <h2>Dane kontaktowe</h2>
                                            <b>Telefon: </b> {{ $book->telefon }} <br>
                                            <b>E-mail: </b> {{ $book->email }}

                                            @if($book->addition != "") 
                                                <h2>Usługi dodatkowe</h2>
                                                {{ $book->addition }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </td>
                        <td>
                            

                            <a href="{{ route('booking.edit', $book) }}" class="btn btn-primary">Edytuj</a>
                        </td>
                        <td>
                            {!! Form::model($book, ['route' => ['booking.delete', $book], 'method' => 'DELETE']) !!}
                                <button class="btn btn-danger">Anuluj</button>
                            {!! Form::close() !!} 
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection