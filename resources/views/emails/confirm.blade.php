@component('mail::message')
# Nowa rezerwacja {{ $marka }} {{ $model }}

<b>{{ $imie }} {{ $nazwisko }}</b> zarezerwował samochód {{ $marka }} {{ $model }}. <br>

<h3>Terminy wydania samochodu</h3>
<h4>{{ $start }} godzina {{ $start_h }}</h4>

<h3>Termin odbioru samochodu</h3>
<h4>{{ $finish }} godzina {{ $finish_h }}</h4>

<h3>Usługi dodatkowe</h3>
{{ $addition }}
@component('mail::button', ['url' => 'beskidcar.pl/admin'])
Przejdz do panelu administracji
@endcomponent

<br>
{{ config('app.name') }}
@endcomponent
