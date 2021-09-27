@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-12">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <a href="{{ url()->previous() }}" class="btn btn-primary">Wróć</a>
            <h2>Dodaj usługę dodatkową</h2>
        </div>
    </div>
    {!! Form::open(['route' => 'addition.store']) !!}

    <div class="row">
        <div class="col-12">
            {!! Form::label('Wprowadź usługę') !!} <br>
            {!! Form::text('addition', null, ['class' => 'form-control', 'placeholder' => 'Usługa dodatkowa']) !!}             
        </div>
    </div>

    <div class="row">
        <div class="col-12 mt-3">
            {!! Form::label('Wprowadź cenę') !!} <br>
            {!! Form::number('price', null, ['class' => 'form-control', 'placeholder' => 'Cena usługi']) !!}             
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            {!! Form::submit('Dodaj usługe', ['class' => 'btn btn-success btn-block mt-5',]) !!}
        </div>
    </div>
    {!! Form::close() !!}

    <div class="row mt-5">
        <div class="col-12">
            <h2>Aktywne usługi</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Nazwa</th>
                    <th scope="col">Cena</th>
                    <th scope="col">Usuń</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($additions as $add)
                    <tr>
                        <td>{{ $add->addition }}</td>
                        <td>{{ $add->price }} zł</td>
                        <td>
                            {!! Form::model($add, ['route' => ['addition.delete', $add], 'method' => 'DELETE']) !!}
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