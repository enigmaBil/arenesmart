@extends('layouts.admin')

@section('content')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('dashboard') }}">aren<strong style="color: #39B54A;">S</strong>mart</a>
        <a class="breadcrumb-item" href="{{ route('stadium.list') }}">stades</a>
        <span class="breadcrumb-item active">{{ $stadium->name }}</span>
    </nav>
    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-12">
                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">Détails du stade : {{ $stadium->name }}</h6>
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Nom : </strong> {{ $stadium->name }}</p>
                            <p><strong>Activité : </strong> {{ $stadium->activity->name }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Capacité : </strong> {{ $stadium->capacity }}</p>
                            <p><strong>Adresse : </strong> {{ $stadium->adresse->po_box }}, {{ $stadium->adresse->city->name }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Équipement : </strong> {{ $stadium->equipment->name }}</p>
                            <p><strong>Description Équipement : </strong> {{ $stadium->equipment->description }}</p>
                        </div>
                    </div>
                    <!-- Section pour afficher les photos -->
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <h6>Photos du Stade</h6>
                            <div class="d-flex flex-wrap">
                                @foreach ($photos as $photo)
                                    <img src="{{ asset('storage/' . $photo->link) }}"
                                         alt="Photo du stade"
                                         class="img-thumbnail m-2"
                                         style="width: 150px; height: 150px;"
                                         onclick="openModal('{{ asset('storage/' . $photo->link) }}')">
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Bouton de retour -->
                    <a href="{{ route('stadium.list') }}" class="btn btn-secondary mt-4">Retour à la liste</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal pour afficher l'image en grand -->
    <div class="modal fade" id="photoModal" tabindex="-1" role="dialog" aria-labelledby="photoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="photoModalLabel">Photo du Stade</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="modalImage" src="" alt="Photo du stade" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function openModal(imageSrc) {
            document.getElementById('modalImage').src = imageSrc;
            $('#photoModal').modal('show');
        }
    </script>
@endsection
