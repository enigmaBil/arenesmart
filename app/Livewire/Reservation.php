<?php

namespace App\Livewire;

use App\Http\Requests\ReservationRequest;
use App\Models\Reservation as ModelsReservation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Reservation extends Component
{
    public $stadium_id, $start_at, $end_at, $message;
    protected $messages;
    
    protected function rules(): array
    {
        $reservationValidator = new ReservationRequest();
        $this->messages = $reservationValidator->messages();
        
        return $reservationValidator->rules();
    }
    
    public function message()
    {
        return (new ReservationRequest())->messages();
    }
    
    public function submit()
    {
        $this->validate();

        $data = $this->getDataArray();
        
        // Creer la reservation
        if (Auth::check()) {
            $data['user_id'] = Auth::user()->id;
        }
        ModelsReservation::create($data);
        
        // Réinitialiser les champs après la soumission
        $this->reset();
        
        // Afficher un message de succès après l'enregistrement des données
        session()->flash('message', 'Votre demande de reservation a étée soumise avec succès.');
    }
    
    private function getDataArray()
    {
        return [
            'stadium_id' => $this->stadium_id,
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
            'message' => $this->message,
        ];
    }

    public function render()
    {
        return view('livewire.reservation');
    }
}
