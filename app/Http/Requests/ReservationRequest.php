<?php

namespace App\Http\Requests;

use App\Enums\ReservationStatus;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $taken = [];
        if($this->input('stadium_id') && $this->input('start_at') && $this->input('end_at')){
            $taken = Reservation::select(['stadium_id'])
            ->where([
                ['stadium_id',$this->input('stadium_id')],
                ['status', 'approved'],
                ['start_at', '<=', Carbon::parse($this->input('start_at'))],
                ['end_at', '>=',Carbon::parse($this->input('start_at'))]
            ])
            ->orWhere([
                ['stadium_id',$this->input('stadium_id')],
                ['status', 'approved'],
                ['start_at', '<=', Carbon::parse($this->input('end_at'))],
                ['end_at', '>=',Carbon::parse($this->input('end_at'))]
            ])
            ->groupBy('stadium_id')
            ->pluck('stadium_id'); 
        }
        return [
            'start_at' => 'required|after_or_equal:' . date(DATE_ATOM),
            'end_at' => 'required',
            'stadium_id' => ['required', 'exists:stadiums,id', Rule::notIn($taken)],
            // 'status' => ['nullable', new Enum(ReservationStatus::class)],
        ];
    }
    
    public function messages()
    {
        return [
            'stadium_id.required' => 'Le champ stade est requis.',
            'stadium_id.not_in' => 'Le stade sélectionné est indisponible pour la période spécifiée.',
            'start_at.required' => 'La date de début de la réservation est requise.',
            'start_at.after_or_equal' => 'La date de début de la réservation doit être postérieure ou égale à la date actuelle.',
            'end_at.required' => 'La date de fin de la réservation est requise.',
            'end_at.after' => 'La date de fin de la réservation doit être postérieure à la date de début de la réservation.',
        ];
    }
}
