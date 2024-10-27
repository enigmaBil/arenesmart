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

<<<<<<< HEAD
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #ddd;
    }
=======
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #ddd;
        }
        /* Pour changer l'arrière-plan de l'option sélectionnée dans la liste déroulante */
        .select2-container--default .select2-results__option--selected {
            background-color: #3498db !important;
            color: #fff;
        }
>>>>>>> 24032864e329e38dd7fbc8444874585367c97138

    /* Pour changer l'arrière-plan de l'option sélectionnée dans la liste déroulante */
    .select2-container--default .select2-results__option--selected {
        background-color: #3498db !important;
        /* Change cette couleur par celle que tu veux */
        color: #fff;
        /* Couleur du texte de l'option sélectionnée */
    }

<<<<<<< HEAD
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
<!--================Home Banner Area =================-->
<section class="home_banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container" style="margin-top: -50vh">
            <div class="row">
                <div class="col-md-8 offset-md-4 col-lg-8 offset-lg-4 col-xl-5 offset-xl-7">
                    <div class="banner_content">
                        <h3>ARENSMART <br>FIND BOOK & BE HAPPY</h3>
=======
        .select2-dropdown {
            background-color: rgba(35, 27, 112, 1);
            color: #ddd;
        }
        .select2-container .select2-container--default .select2-container--below{
            width: 100% !important;
        }
    </style>
@endsection
@section('content')
    <!--================Home Banner Area =================-->
    <section class="home_banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container" style="margin-top: -20vh">
                <div class="row float-right">
                    <div class="col-md-12 offset-md">
                        <div class="banner_content">
                            <h3>ARENSMART <br>FIND BOOK & BE HAPPY</h3>
>>>>>>> 24032864e329e38dd7fbc8444874585367c97138

                        <div class="mx-3" style="">
                            <div class="card" style="background: transparent !important;
    border: 1px solid #fff !important;
    border-radius: 10px;">
<<<<<<< HEAD
                                <div class="card-body">
                                    <form action="">
                                        <div class="row" style="padding: 10px">
                                            <div class="col-md-12">
                                                <label for="lieu">Lieu</label>
                                                <select class="form-control lieu" id="lieu" name="lieu" style="background: transparent; color: #fff">
                                                    <option value="AL">Alabama</option>
                                                    <option value="AL">Tokyo</option>
                                                    <option value="AL">Paris</option>
                                                    <option value="AL">Sidney</option>
                                                </select>
                                                {{-- <input type="text" style="background: transparent; color: #fff" class="form-control" />--}}
                                            </div>
                                        </div>
                                        <div class="row p-3" style="padding: 10px">
                                            <div class="col-md-8">
                                                <label for="activite">Activite</label>
                                                <select class="form-control activite" id="activite" name="activite" style="background: transparent; color: #fff">
                                                    <option value="AL">Alabama</option>
                                                    <option value="AL">Tokyo</option>
                                                    <option value="AL">Paris</option>
                                                    <option value="AL">Sidney</option>
                                                </select>
                                                {{-- <input type="text" style="background: transparent; color: #fff" class="form-control" />--}}
=======
                                    <div class="card-body">
                                        <form method="POST" action="">
                                            @csrf
                                            <div class="row" style="padding: 10px">
                                                <div class="col-md-12 w-100 form-group mg-b-0 d-flex flex-md-column">
                                                    <label for="lieu">Lieu</label>
                                                    <select class="form-control lieu" id="lieu" name="lieu" style="background: transparent; color: #fff">
                                                        <option value="AL">Alabama</option>
                                                        <option value="AL">Tokyo</option>
                                                        <option value="AL">Paris</option>
                                                        <option value="AL">Sidney</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row" style="padding: 10px">
                                                <div class="col-md-8 w-100 form-group mg-b-0 d-flex flex-md-column">
                                                    <label for="activite">Activite</label>
                                                    <select class="form-control activite" id="activite" name="activite" style="background: transparent; color: #fff">
                                                        <option value="AL">Alabama</option>
                                                        <option value="AL">Tokyo</option>
                                                        <option value="AL">Paris</option>
                                                        <option value="AL">Sidney</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 w-100 form-group mg-b-0 d-flex flex-md-column">
                                                    <label for="">Quand?</label>
                                                    <input type="text" class="form-control datepicker" placeholder="Choisir une date" name="date" style="background: transparent; color: #fff; border-color: #fff;" />
                                                </div>
                                            </div>
                                            <div class="row" style="padding: 10px">
                                                <div class="col-md-12">
                                                    <input type="submit" class="btn btn-success btn-block" value="Rechercher"/>
                                                </div>
>>>>>>> 24032864e329e38dd7fbc8444874585367c97138
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Quand?</label>
                                                <input type="text" class="form-control datepicker" placeholder="Choisir une date" name="date" style="background: transparent; color: #fff" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- <a class="banner_btn" href="#">Begin Free Trial<i class="ti-arrow-right"></i></a>--}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->
<section>
    @include('components.stadium-list')
</section>
<!--================Service  Area =================-->

@endsection
@section('js')
<<<<<<< HEAD
<script>
    $(document).ready(function() {
        $('.lieu').select2();
        $('.activite').select2();
        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            todayHighlight: true,
            autoclose: true,
            language: 'fr'
=======
    <script>
        $(document).ready(function() {
            $('.lieu').select2();
            $('.select2-container').removeAttr('style');
            $('.activite').select2();
            $('.datepicker').datepicker({
                format: 'dd-mm-yyyy',
                todayHighlight: true,
                autoclose: true,
                language: 'fr'
            });
>>>>>>> 24032864e329e38dd7fbc8444874585367c97138
        });
    });
</script>
@endsection