<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Car;
use App\Models\Addition;
use App\Models\Zaliczka;
use App\Mail\BookingMail;
use App\Mail\AdminBookingMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;


use Paynow\Client;
use Paynow\Environment;
use Paynow\Exception\PaynowException;
use Paynow\Service\Payment;
use Paynow\Notification;
use Paynow\Response\Payment\Authorize;
use Paynow\HttpClient;

use Response;
use Illuminate\Support\Facades\Redirect;
class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'check', 'zaliczka', 'zaliczka_payment'
        ]]);
    }

    public function zaliczka()
    {
        return view('zaliczka');
    }

    public function zaliczka_payment(Request $request)
    {
        $client = new Client('2d59430e-069a-45fa-91a3-a612864b0e76', 'fcdef4e1-ac91-420c-85f1-b673d25ca338', Environment::PRODUCTION);
            $orderReference = "Zaliczka";
            $idempotencyKey = uniqid($orderReference . '_');

            $paymentData = [
                'amount' => $request->days*10000,
                'currency' => 'PLN',
                'externalId' => $orderReference,
                'description' => 'Zaliczka',
                'buyer' => [
                    'email' => $request->email
                ]
            ];
            try {
                $payment = new Payment($client);
                $result = $payment->authorize($paymentData, $idempotencyKey);

                $url = $result->getRedirectUrl();
                $paymentId = $result->getPaymentId();
                $statusPayment = $result->getStatus();
                $value = $request->days*100;

                Zaliczka::create(array_merge($request->all(), ['paymentId' => $paymentId, 'statusPayment' => $statusPayment, 'value' => $value]));
                
                return Redirect::to($url);
                                
            } catch (PaynowException $exception) {
                
            }
    }


    public function payment()
    {
       $client = new Client('2d59430e-069a-45fa-91a3-a612864b0e76', 'fcdef4e1-ac91-420c-85f1-b673d25ca338', Environment::PRODUCTION);
        $orderReference = "success_1234567";
        $idempotencyKey = uniqid($orderReference . '_');

        $paymentData = [
            'amount' => '100',
            'currency' => 'PLN',
            'externalId' => $orderReference,
            'description' => 'Toyota',
            'buyer' => [
                'email' => 'kubaj26@gmail.com'
            ]
        ];
        try {
            $payment = new Payment($client);
            $result = $payment->authorize($paymentData, $idempotencyKey);
            $url = $result->getRedirectUrl();
            return Redirect::to($url);

            //return Http::get('https://api.sandbox.paynow.pl/v1/payments/paymentmethods')->header('Api-Key','da810353-1d88-4786-9b2c-87313f8ac2f3')->header('Signature', '7fe0fc3e-5f22-489c-89b7-2892587dcad5')->body();
        } catch (PaynowException $exception) {
            
        }

        //return Http::get('https://api.sandbox.paynow.pl/v1/payments/paymentmethods')->json();
    }

    public function index($car) 
    {
        $booking = Booking::where('carId',$car)->where('status','1')->get();
        $car = Car::where('id', $car)->get();
        $additions = Addition::all();

        return view('booking.create')->with(compact(['booking', 'car', 'additions']));
    }

    public function check($car) 
    {
        $booking = Booking::where('carId',$car)->where('status','1')->get();
        $car = Car::where('id', $car)->get();
        return view('booking.check')->with(compact(['booking', 'car']));
    }

    public function admin() 
    {
        $booking = Booking::where('status', '1')->orderBy('start', 'asc')->get();
        $cars = Car::all();
        
        $date = date("Y-m-d",strtotime("-1 day"));

        foreach($booking as $book){
            if($book->finish === $date){
                $book->update(array('status' => '0'));
            }
        }

        return view('booking.admin')->with(compact(['booking', 'cars']));
    }

    public function edit(Booking $book)
    {
        $booking = Booking::where('carId',$book->carId)->get();
        $car = Car::where('id', $book->carId)->get();
        return view('booking.edit')->with(compact(['book', 'car', 'booking']));
    }

    public function update(Request $request, Booking $book)
    {
        $book->update($request->all());
        return redirect()->route('booking.admin');
    }

    public function destroy(Booking $book)
    {
        $book->delete();
        return redirect()->route('booking.admin');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'start' => ['required'],
            'start_h' => ['required'],
            'finish' => ['required'],
            'finish_h' => ['required'],
            'imie' => ['required'],
            'nazwisko' => ['required'],
            'telefon' => ['required'],
            'email' => ['required'],
            'miejscowosc' => ['required'],
            'kodPocztowy' => ['required'],
            'adres' => ['required'],
            'regulamin' => ['required'],
            'prawojazdy' => ['required']
        ],
        [
            'start.required' => 'Wybierz datę rozpoczęcia wynajmu',
            'start_h.required' => 'Wybierz godzinę rozpoczęcia wynajmu',
            'finish.required' => 'Wybierz datę zakończenia wynajmu',
            'finish_h.required' => 'Wybierz godzinę zakończenia wynajmu',
            'imie.required' => 'Uzupełnij pole imię',
            'nazwisko.required' => 'Uzupełnij pole nazwisko',
            'telefon.required' => 'Uzupełnij pole telefon',
            'email.required' => 'Uzupełnij pole e-mail',
            'miejscowosc.required' => 'Uzupełnij pole miejscowość',
            'kodPocztowy.required' => 'Uzupełnij pole kod pocztowy',
            'adres.required' => 'Uzupełnij pole adres',
            'regulamin.required' => 'Akceptacja regulaminu jest wymagana',
            'prawojazdy.required' => 'Posiadanie prawa jazdy oraz 21 lat jest wymagane'
        ]);
        
       //Mail::to('biuro@beskidcar.pl')->send(new AdminBookingMail($request));
        //Mail::to($request->email)->send(new BookingMail($request));

       

        if(auth()->user()->role == 'admin'){
            Booking::create($request->all());
            return redirect()->route('booking.admin');
        } else {
            $client = new Client('2d59430e-069a-45fa-91a3-a612864b0e76', 'fcdef4e1-ac91-420c-85f1-b673d25ca338', Environment::PRODUCTION);
            $orderReference = "Success_Beskid";
            $idempotencyKey = uniqid($orderReference . '_');

            $paymentData = [
                'amount' => $request->kwota*100,
                'currency' => 'PLN',
                'externalId' => $orderReference,
                'description' => 'Rezerwacja',
                'buyer' => [
                    'email' => $request->email
                ]
            ];
            try {
                $payment = new Payment($client);
                $result = $payment->authorize($paymentData, $idempotencyKey);

                $url = $result->getRedirectUrl();
                $paymentId = $result->getPaymentId();
                $statusPayment = $result->getStatus();

                Booking::create(array_merge($request->all(), ['paymentId' => $paymentId, 'statusPayment' => $statusPayment]));
                
                return Redirect::to($url);
                                
            } catch (PaynowException $exception) {
                
            }
            return redirect()->route('home');
        }
    }


}