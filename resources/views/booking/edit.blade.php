@extends('layouts.app')

@section('content')
@foreach ($car as $item)
<body style="
    background: url({{$item->zdjecie}}) !important;
    -webkit-background-size: 100%; 
    -moz-background-size: 100%; 
    -o-background-size: 100%; 
    background-size: 100%; 
    -webkit-background-size: cover; 
    -moz-background-size: cover; 
    -o-background-size: cover; 
    background-size: cover;
    background-repeat:no-repeat;
    background-attachment: fixed;
    background-position:center;">
@endforeach
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                {!! Form::model($book, ['route' => ['booking.update', $book], 'method' => 'PUT']) !!}
                <div class="card-header">
                    @foreach ($car as $item)
                       Zarezerwuj {{ $item->marka }} {{ $item->model }}
                       {!! Form::hidden('carId', $item->id) !!}
                    @endforeach
                </div>

                <div class="card-body"> 
                    <div class="row">
                        <div class="col-12">
                            <h3>Wybierz termin</h3>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-8">
                            {!! Form::label('Data rozpoczęcia') !!} <br>
                            {!! Form::text('start', null, ['class' => 'datepicker form-control','data-date-format' => 'yyyy/mm/dd', 'id' => 'start', 'placeholder' => 'Wybierz date']) !!}    
                        
                        </div>
                        <div class="col-md-4">
                            {!! Form::label('Godzina rozpoczęcia') !!} <br>
                            {!! Form::select('start_h', [
                                '0:00' => '0:00', 
                                '1:00' => '1:00', 
                                '2:00' => '2:00', 
                                '3:00' => '3:00',
                                '4:00' => '4:00',
                                '5:00' => '5:00',
                                '6:00' => '6:00',
                                '7:00' => '7:00',
                                '8:00' => '8:00',
                                '9:00' => '9:00',
                                '10:00' => '10:00',
                                '11:00' => '11:00',
                                '12:00' => '12:00',
                                '13:00' => '13:00',
                                '14:00' => '14:00',
                                '15:00' => '15:00',
                                '16:00' => '16:00',
                                '17:00' => '17:00',
                                '18:00' => '18:00',
                                '19:00' => '19:00',
                                '20:00' => '20:00',
                                '21:00' => '21:00',
                                '22:00' => '22:00',
                                '23:00' => '23:00',
                            ], null, ['class' => 'form-control']); !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            {!! Form::label('Data zakończenia') !!} <br>
                            {!! Form::text('finish', null, ['class' => 'datepicker form-control','data-date-format' => 'yyyy/mm/dd', 'id' => 'finish', 'placeholder' => 'Wybierz date']) !!}    
                        </div>
                        <div class="col-md-4">
                            {!! Form::label('Godzina zakończenia') !!} <br>
                            {!! Form::select('finish_h', [
                                '0:00' => '0:00', 
                                '1:00' => '1:00', 
                                '2:00' => '2:00', 
                                '3:00' => '3:00',
                                '4:00' => '4:00',
                                '5:00' => '5:00',
                                '6:00' => '6:00',
                                '7:00' => '7:00',
                                '8:00' => '8:00',
                                '9:00' => '9:00',
                                '10:00' => '10:00',
                                '11:00' => '11:00',
                                '12:00' => '12:00',
                                '13:00' => '13:00',
                                '14:00' => '14:00',
                                '15:00' => '15:00',
                                '16:00' => '16:00',
                                '17:00' => '17:00',
                                '18:00' => '18:00',
                                '19:00' => '19:00',
                                '20:00' => '20:00',
                                '21:00' => '21:00',
                                '22:00' => '22:00',
                                '23:00' => '23:00',
                                ], null, ['class' => 'form-control']); !!}
                        </div>
                    </div>
                   <hr>
                    <div class="row">
                        <div class="col-12 mt-4">
                            <h3>Uzupełnij dane</h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <h5>Dane firmy (jeżeli posiadasz)</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('Nazwa firmy') !!}
                            {!! Form::text('firma', null, ['class' => 'form-control']) !!}  
                        </div>

                        <div class="col-md-6">
                            {!! Form::label('NIP') !!}
                            {!! Form::text('nip', null, ['class' => 'form-control']) !!} 
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mt-2">
                            <h5>Dane personalne</h5>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('Imię*') !!}
                            {!! Form::text('imie', null, ['class' => 'form-control']) !!}  
                        </div>

                        <div class="col-md-6">
                            {!! Form::label('Nazwisko*') !!}
                            {!! Form::text('nazwisko', null, ['class' => 'form-control']) !!} 
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3">
                            {!! Form::label('Kod pocztowy*') !!}
                            {!! Form::text('kodPocztowy', null, ['class' => 'form-control']) !!} 
                        </div>
                        <div class="col-9">
                            {!! Form::label('Miejscowość*') !!}
                            {!! Form::text('miejscowosc', null, ['class' => 'form-control']) !!} 
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            {!! Form::label('Adres*') !!}
                            {!! Form::text('adres', null, ['class' => 'form-control']) !!} 
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12 mt-4">
                            <h3>Dane kontaktowe</h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            {!! Form::label('Telefon*') !!}
                            {!! Form::text('telefon', null, ['class' => 'form-control']) !!} 
                        </div>
                    

                    
                        <div class="col-6">
                            {!! Form::label('E-mail*') !!}
                            {!! Form::text('email', null, ['class' => 'form-control']) !!} 
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mt-4">
                            <h3>Akceptacja warunków</h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">                  
                            {!! Form::checkbox('prawojazdy', 'tak') !!}
                            Mam powyżej 21 lat oraz posiadam ważne i aktualne prawo jazdy*
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">                  
                            {!! Form::checkbox('regulamin', 'tak') !!}
                            Akceptuje regulamin*
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 text-center mt-2">
                            <p class="koszt" id="koszt" style="color:green;"></p>
                        </div>
                    </div>
                         
                    
                    

                    

                    

                    
                    
                    

                    {!! Form::hidden('userId', auth()->user()->id) !!}
                    {!! Form::hidden('key', 'secret') !!}
                    {!! Form::hidden('status', '1') !!}
                    
                    @can('isAdmin')
                        {!! Form::submit('Zapisz zmiany', ['class' => 'btn btn-success btn-block mt-5',]) !!}
                    @endcan

                    @can('isCustomer')
                        {!! Form::submit('Przejdź do płatności', ['class' => 'btn btn-success btn-block mt-5', 'id' => 'pay']) !!}
                    @endcan
                        

                    {!! Form::close() !!}
                    
                    <!--<input name="start" class="datepicker" data-date-format="yyyy/mm/dd" value="Wybierz date początkową">
                    <input name="finish" class="datepicker" data-date-format="yyyy/mm/dd" value="Wybierz date końcową">
                    --> 
                </div>
            </div>
        </div>
    </div>
</div>
@foreach ($booking as $dates)
    <?php
        $begin = new DateTime($dates->start);
        $end = new DateTime($dates->finish);
        $end = $end->modify( '+1 day' ); 

        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($begin, $interval ,$end);

        foreach($daterange as $date){
            $disable = $date->format("Y-m-d");
            echo "<input type='hidden' name='disabled[]' value='$disable'><br>";
        }
    ?>
@endforeach
<script>
    $(document).ready(function(){
        $.fn.datepicker.defaults.language = 'pl';
        
    });

    
        var disabled = $("input[name='disabled[]']").map(function(){return $(this).val();}).get();
        $('.datepicker').datepicker({
            datesDisabled: disabled,
            language: 'pl'
        });

        document.getElementById("przelicz").addEventListener("click", function() {
            var input = document.getElementById("start").value;
            var input1 = document.getElementById("finish").value;

            var d = new Date(input);
            var d1 = new Date(input1);
            var days = d1 - d;
            var time = (days /  (60*60*24*1000))+1;
            var cost = time*180;
            console.log(time);

            var k = document.getElementById("koszt").innerHTML = 'Zarezerwuj '+time+' dni';
            var c = document.getElementById("pay").value = 'Zapłać '+cost+' zł';
            console.log(k);
        });

        
    

</script>

@endsection