@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url()->previous() }}" class="btn btn-primary">Wróć</a>
    <h2>Dodaj nowy samochód do oferty</h2>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="card shadow">
        <div class="card-body">
            {!! Form::open(['route' => 'cars.store']) !!}
            @csrf
            <div class="row">
                <div class="col-6">
                    {!! Form::label('marka', 'Podaj marke:') !!}
                    {!! Form::text('marka','', ['class'=> 'form-control']) !!}
                </div>

                <div class="col-6">
                    {!! Form::label('model', 'Podaj model:') !!}
                    {!! Form::text('model','', ['class'=> 'form-control']) !!}
                </div>
                
            </div>

            <div class="row">
                <div class="col-4">
                    {!! Form::label('silnik', 'Silnik:') !!}
                    {!! Form::text('silnik','', ['class'=> 'form-control']) !!}
                </div>
                <div class="col-4">
                    {!! Form::label('moc', 'Moc (KM):') !!}
                    {!! Form::number('moc','', ['class'=> 'form-control']) !!}
                </div>
                <div class="col-4">
                    {!! Form::label('liczbaMiejsc', 'Liczba miejsc:') !!}
                    {!! Form::number('liczbaMiejsc','', ['class'=> 'form-control']) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    {!! Form::label('opis', 'Opis:') !!}
                    {!! Form::textarea('opis','', ['class'=> 'form-control']) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    {!! Form::label('zdjecie', 'Zdjęcie (URL):') !!}
                    {!! Form::text('zdjecie','', ['class'=> 'form-control']) !!} 
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    {!! Form::label('cena', 'Cena 1-3 dni') !!}
                    {!! Form::text('cena','', ['class'=> 'form-control']) !!} 
                </div>

                <div class="col-4">
                    {!! Form::label('cena1', 'Cena 4-7 dni') !!}
                    {!! Form::text('cena1','', ['class'=> 'form-control']) !!} 
                </div>

                <div class="col-4">
                    {!! Form::label('cena2', 'Cena 8-14 dni') !!}
                    {!! Form::text('cena2','', ['class'=> 'form-control']) !!} 
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    {!! Form::submit('Dodaj', ['class' => 'btn btn-success btn-block mt-2']) !!}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
        
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <h2>Moje samochody</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Nazwa</th>
                    <th scope="col">Cena</th>
                    <th scope="col">Silnik</th>
                    <th scope="col">Moc</th>
                    <th scope="col">Liczba miejsc</th>
                    <th scope="col">Usuń</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($cars as $car)
                    <tr>
                        <td>{{ $car->marka }}</td>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->silnik }}</td>
                        <td>{{ $car->moc }}</td>
                        <td>{{ $car->liczbaMiejsc }}</td>
                        <td>
                            {!! Form::model($car, ['route' => ['cars.delete', $car], 'method' => 'DELETE']) !!}
                                <button class="btn btn-danger">Usuń</button>
                            {!! Form::close() !!} 
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> 
    
</div>

@endsection