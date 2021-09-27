@component('mail::message')
# Potwierdzenie rezerwacji

Dziękujemy za złożenie rezerwacji na samochód <b>{{ $marka }} {{ $model }}</b>

<img src="{{ $zdjecie }}" alt="{{ $marka }}">

Data rozpoczęcia: <b>{{ $start }} o godzinie {{ $start_h }}</b> <br>
Data zakończenia: <b>{{ $finish }} o godzinie {{ $finish_h }}</b>


<br>

W razie jakichkolwiek pytań prosimy o kontakt <br>
<h2>+48 789 789 789</h2>
<h3>biuro@beskidcar.pl</h3>


Dziękujemy,<br>
{{ config('app.name') }}
@endcomponent
