@extends('layouts.app')

@section('content')

<body style="
    
    background-size: cover !important;
    width: 100% !important;
    height: 100% !important;  
    font-family: 'Nunito', sans-serif;
    background-size: cover !important;
    background-repeat:no-repeat !important;
    background-attachment: fixed !important;
    background-position:center; !important">

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
            <div class="card shadow p-5">
                
                @foreach ($car as $item)
                    <h3>Sprawdź dostępność {{ $item->marka }} {{ $item->model }}</h3>
                
                    <input type="button" class="datepicker btn btn-success" value="Terminy" data-date-format = 'yyyy/mm/dd' placeholder="Kliknij aby wyświetlić kalendarz">
                    <a href="{{route('booking.create', $item->id)}}" class="btn btn-primary btn-block mb-3 btn-lg" style="position: fixed; bottom:0; left:0;">Zarezerwuj ten samochód</a>
                @endforeach
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

    $input = $(".datepicker");
    $input.datepicker({
        datesDisabled: disabled,
        language: 'pl'
    });
    $input.data('datepicker').hide = function () {};
    $input.datepicker('show');


</script>

@endsection