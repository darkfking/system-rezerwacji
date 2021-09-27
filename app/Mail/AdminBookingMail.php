<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use App\Models\Car;

class AdminBookingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $request;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $car = Car::find($this->request->carId);
        return $this->markdown('emails.confirm')
                    ->subject('Nowa rezerwacja od '. $this->request->start.' '.$car->marka.' '.$car->model)
                    ->with([
                        'start' => $this->request->start,
                        'start_h' => $this->request->start_h,
                        'finish' => $this->request->finish,
                        'finish_h' => $this->request->finish_h,
                        'imie' => $this->request->imie,
                        'nazwisko' => $this->request->nazwisko,
                        'telefon' => $this->request->telefon,
                        'addition' => $this->request->addition,
                        'marka' => $car->marka,
                        'model' => $car->model,
                    ]);
    }
    
}
