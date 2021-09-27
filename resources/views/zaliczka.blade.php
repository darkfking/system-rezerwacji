@extends('layouts.app')

@section('content')
{!! Form::open(['route' => 'zaliczka_payment']) !!}   
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Wpłać zaliczkę (1 DOBRA - 100zł)</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            {!! Form::label('Imię i nazwisko') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}  
        </div>

        <div class="col-md-6">
            {!! Form::label('Adres e-mail') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!} 
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            {!! Form::label('Liczba dni wynajmu') !!}
            {!! Form::number('days', null, ['class' => 'form-control']) !!} 
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">
            <button class="btn btn-success btn-block">Zapłać</button>
        </div>
    </div>
</div>
{!! Form::close() !!}
@endsection