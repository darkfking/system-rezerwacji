@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Panel użytkownika') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @can('isAdmin')
                        Witaj Adminie złoty
                    @elsecan('isCustomer')
                        <h1>Twoje rezerwacje</h1>
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Samochód</th>
                                <th scope="col">Początek</th>
                                <th scope="col">Koniec</th>
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
                                    </tr>
                                @endforeach
                            </tbody>
                          </table>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
