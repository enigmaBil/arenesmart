@extends('layouts.site')
@section('css')
<style>
    .select2-container--default .select2-selection--single {
        background-color: transparent !important;
        border: 1px solid #fff;
        color: #fff;
        outline: none;
        width: 100%;
        height: calc(2.25rem + 2px);
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #ddd;
    }

    /* Pour changer l'arrière-plan de l'option sélectionnée dans la liste déroulante */
    .select2-container--default .select2-results__option--selected {
        background-color: #3498db !important;
        /* Change cette couleur par celle que tu veux */
        color: #fff;
        /* Couleur du texte de l'option sélectionnée */
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        color: #ddd;
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }

    .select2-dropdown {
        background-color: rgba(35, 27, 112, 1);
        /* Arrière-plan du menu déroulant */
        color: #ddd;
        /* Couleur du texte des options */
    }
</style>
@endsection
@section('content')
<section class="home_banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container d-flex justify-content-between" style="margin-top: -50vh">
            <div class="col-md-6">
                <h1>Réservation</h1>
                <h2>Pour du stade {{ $stadium->name }}</h2>
                <p>{{ $stadium->description }}</p>
            </div>
            <div class="col-md-6">
                <livewire:reservation :stadium_id="$stadium->id" />
            </div>
        </div>
    </div>
</section>
@endsection
