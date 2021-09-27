@extends('layouts.app')

@section('content')
@foreach ($car as $item)
<body style="
    background: url({{$item->zdjecie}}) !important;
    background-size: cover !important;
    width: 100% !important;
    height: 100% !important;  
    font-family: 'Nunito', sans-serif;
    background-size: cover !important;
    background-repeat:no-repeat !important;
    background-attachment: fixed !important;
    background-position:center; !important">
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
        @foreach ($car as $item)
        @if($item->marka == 'Hyundai')
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning" role="alert">
                    Aby zarezerwować weekend (piątek godzina 18:00 do poniedziałku godziny 9:00) w cenie <b>899 zł</b> wybierz w kalendarzu dwa dni weekendowe
    
                </div>
            </div>
        </div>
        @endif
        <div class="col-md-8">
            <div class="card shadow">
                {!! Form::open(['route' => 'booking.store']) !!}           
                <div class="card-header">
                   
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
                            {!! Form::text('start', null, ['class' => 'datepicker form-control refresh required','data-date-format' => 'yyyy/mm/dd', 'id' => 'start', 'placeholder' => 'Wybierz date']) !!}    
                        
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
                            ], null, ['class' => 'form-control refresh']); !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            {!! Form::label('Data zakończenia') !!} <br>
                            {!! Form::text('finish', null, ['class' => 'datepicker form-control refresh required','data-date-format' => 'yyyy/mm/dd', 'id' => 'finish', 'placeholder' => 'Wybierz date']) !!}    
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
                                ], null, ['class' => 'form-control refresh']); !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
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
                                {!! Form::text('imie', null, ['class' => 'form-control refresh required']) !!}  
                            </div>
    
                            <div class="col-md-6">
                                {!! Form::label('Nazwisko*') !!}
                                {!! Form::text('nazwisko', null, ['class' => 'form-control required']) !!} 
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-3">
                                {!! Form::label('Kod pocztowy*') !!}
                                {!! Form::text('kodPocztowy', null, ['class' => 'form-control required']) !!} 
                            </div>
                            <div class="col-9">
                                {!! Form::label('Miejscowość*') !!}
                                {!! Form::text('miejscowosc', null, ['class' => 'form-control required']) !!} 
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-12">
                                {!! Form::label('Adres*') !!}
                                {!! Form::text('adres', null, ['class' => 'form-control required']) !!} 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mt-4">
                                <h3>Dane kontaktowe</h3>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-6">
                                {!! Form::label('Telefon*') !!}
                                {!! Form::text('telefon', null, ['class' => 'form-control required']) !!} 
                            </div>
                        
    
                        
                            <div class="col-6">
                                {!! Form::label('E-mail*') !!}
                                {!! Form::text('email', auth()->user()->email, ['class' => 'form-control required']) !!} 
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
                                Akceptuje <a href="{{ route('regulamin') }}" target="__blank">regulamin </a> oraz <a href="{{ asset('umowa.pdf') }}" target="__blank">umowe najmu</a> którą podpiszę*</a> 
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 mt-4">
                                <h3>Wybierz usługi dodatkowe</h3>
                                <small class="text-muted">W celu uzgodnienia szczegółów lub wyboru większej ilości opcji, prosimy o kontakt telefoniczny na numer: <b>+48 787 402 220</b></small>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <select id="add" class="form-control refresh" onChange="myNewFunction(this);">
                                    <option value="0">--Wybierz--</option>
                                    @foreach ($additions as $add)
                                        <option value="{{ $add->price }}">{{ $add->addition }} {{ $add->price }} zł</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="addition" id="add-fin" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body"> 
                        <p id="koszt"></p>               
                        {!! Form::hidden('userId', auth()->user()->id) !!} 
                        {!! Form::hidden('key', 'secret') !!}
                        {!! Form::hidden('status', '1') !!}
                        {!! Form::hidden('kwota', '0', ['id' => 'kwota']) !!}
                        
                        @can('isAdmin')
                            {!! Form::submit('Dodaj rezerwację', ['class' => 'btn btn-success btn-block mt-5']) !!}
                        @endcan
                        {!! Form::submit('Przejdź do płatności', ['class' => 'btn btn-success btn-block mt-5', 'id' => 'pay']) !!}
                        {!! Form::close() !!}
                        <!--<button type="button" id="przelicz" class="btn btn-primary btn-block mt-2">Przelicz i zapłać</button>
                        --></div>
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

@foreach ($car as $item)
    <input type="hidden" name="cena" id="cena" value="{{ $item->cena }}">
    <input type="hidden" name="cena1" id="cena1" value="{{ $item->cena1 }}">
    <input type="hidden" name="cena2" id="cena2" value="{{ $item->cena2 }}">
    <input type="hidden" name="marka" id="marka" value="{{ $item->marka }}">
@endforeach
<script>
    var addname = document.getElementById("add-fin");

    /*var datas = document.getElementById("start");
    datas.addEventListener('click', function() {
        console.log('Zmieniono date11');
    });

    payment.style.display = "none"; */

    
    function myNewFunction(sel) {
        addname.value = sel.options[sel.selectedIndex].text;
    }

    $(document).ready(function(){
        $.fn.datepicker.defaults.language = 'pl';   
    });

    
    var disabled = $("input[name='disabled[]']").map(function(){return $(this).val();}).get();
    $('.datepicker').datepicker({
        datesDisabled: disabled,
        language: 'pl'
    });

    $(".refresh").click(function (event) {
        var input = document.getElementById("start").value;
        var input1 = document.getElementById("finish").value; 
        var add = document.getElementById("add");

        var cena = document.getElementById("cena").value;
        var cena1 = document.getElementById("cena1").value;
        var cena2 = document.getElementById("cena2").value;
        var marka = document.getElementById("marka").value;

        var d = new Date(input);
        var d1 = new Date(input1);
        var days = d1 - d;
        time = NaN;
        var time = (days /  (60*60*24*1000))+1;
        if(isNaN(time)) time = 0;

        if(marka != 'Hyundai') {
            if(time <= 3) {
                var cost = (time*cena)+parseInt(add.value);
            }

            if(time > 3 && time <= 7) {
                var cost = (time*cena1)+parseInt(add.value);
            }

            if(time >= 8) {
                var cost = (time*cena2)+parseInt(add.value);
            }
        } else {
            

            if(time === 2) {
                var cost = (1*cena1)+parseInt(add.value);
            }

            if(time != 2 && time != 7) {
                var cost = (time*cena)+parseInt(add.value);
            }

            if(time === 7) {
                var cost = (1*cena2)+parseInt(add.value);
            }
        }


            
        document.getElementById('kwota').value = cost;

        document.getElementById("koszt").innerHTML = 'Zarezerwuj '+time+' dni';
        document.getElementById("pay").value = 'Zapłać '+cost+' zł';
    });

    /*przelicz.addEventListener("click", function() {
        payment.style.display = "block";
        payment.disabled = false;

        przelicz.style.display = "none";

        var input = document.getElementById("start").value;
        var input1 = document.getElementById("finish").value;
        var add = document.getElementById("add");

        var d = new Date(input);
        var d1 = new Date(input1);
        var days = d1 - d;
        time = NaN;
        var time = (days /  (60*60*24*1000))+1;
        if(isNaN(time)) time = 0;
        var cost = (time*180)+parseInt(add.value);

        var k = document.getElementById("koszt").innerHTML = 'Zarezerwuj '+time+' dni';
        var c = document.getElementById("pay").value = 'Zapłać '+cost+' zł';

    });*/

</script>

@endsection