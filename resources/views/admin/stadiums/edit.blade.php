@extends('layouts.admin')

@section('content')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('dashboard') }}">aren<strong style="color: #39B54A;">S</strong>mart</a>
        <a class="breadcrumb-item" href="{{ route('stadium.list') }}">stades</a>
        <span class="breadcrumb-item active">modifier le stade</span>
    </nav>
    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-12">
                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">Modifier le stade</h6>
                    <form action="{{ route('stadium.update', $stadium->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nom du Stade</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $stadium->name }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="activity_id" class="form-label">Activité</label>
                                    <select class="form-select form-control" id="activity_id" name="activity_id" required>
                                        <option value="">Sélectionnez une activité</option>
                                        @foreach($activities as $activity)
                                            <option value="{{ $activity->id }}" {{ $stadium->activity_id == $activity->id ? 'selected' : '' }}>{{ $activity->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="capacity" class="form-label">Capacité</label>
                                    <input type="number" class="form-control" id="capacity" name="capacity" value="{{ $stadium->capacity }}" required>
                                </div>
                            </div>
                        </div>

                        <!-- Section pour l'adresse et équipement (dynamique) -->
                        <div class="row">
                            <div class="col-md-6">
                                <label for="address_id" class="form-label">Adresse</label>
                                <select class="form-select form-control" id="address_id" name="address_id">
                                    <option value="">Sélectionnez une adresse</option>
                                    @foreach($addresses as $address)
                                        <option value="{{ $address->id }}" {{ $stadium->adresse_id == $address->id ? 'selected' : '' }}>
                                            {{ $address->city->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="button" class="btn btn-link mt-2" data-bs-toggle="modal" data-bs-target="#addAddressModal">+ Ajouter une nouvelle adresse</button>
                            </div>
                            <div class="col-md-6">
                                <label for="equipment_id" class="form-label">Équipement</label>
                                <select class="form-select form-control" id="equipment_id" name="equipment_id">
                                    <option value="">Sélectionnez un équipement</option>
                                    @foreach($equipments as $equipment)
                                        <option value="{{ $equipment->id }}" {{ $stadium->equipment_id == $equipment->id ? 'selected' : '' }}>
                                            {{ $equipment->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="button" class="btn btn-link mt-2" data-bs-toggle="modal" data-bs-target="#addEquipmentModal">+ Ajouter un équipement</button>
                            </div>
                        </div>

                        <!-- Section de prévisualisation des photos -->
                        <div class="mb-3">
                            <label for="photos" class="form-label">Photos du Stade</label>
                            <input type="file" class="form-control" id="photos" name="photos[]" multiple onchange="previewImages(event)">
                            <div id="imagePreview" class="d-flex flex-wrap mt-3">
                                @foreach($stadium->photos as $photo)
                                    <img src="{{ asset('storage/' . $photo->path) }}" alt="Photo du stade" class="img-thumbnail m-2" style="width: 150px; height: 150px;">
                                @endforeach
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Ajouter Adresse -->
    <div class="modal fade" id="addAddressModal" tabindex="-1" aria-labelledby="addAddressModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAddressModalLabel">Ajouter une nouvelle adresse</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addressForm">
                        <div class="mb-3">
                            <label for="po_box" class="form-label">Boîte postale</label>
                            <input type="text" class="form-control" id="po_box" required>
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">Ville</label>
                            <input type="text" class="form-control" id="city" required>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="addAddress()">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Ajouter Équipement -->
    <div class="modal fade" id="addEquipmentModal" tabindex="-1" aria-labelledby="addEquipmentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEquipmentModalLabel">Ajouter un nouvel équipement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="equipmentForm">
                        <div class="mb-3">
                            <label for="equipment_name" class="form-label">Nom de l'équipement</label>
                            <input type="text" class="form-control" id="equipment_name" required>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="addEquipment()">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        // Fonction de prévisualisation d'images
        function previewImages(event) {
            const imagePreview = document.getElementById('imagePreview');
            imagePreview.innerHTML = '';
            const files = event.target.files;
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'img-thumbnail m-2';
                    img.style.width = '150px';
                    img.style.height = '150px';
                    imagePreview.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        }

        // Ajout dynamique d'une nouvelle adresse
        function addAddress() {
            const poBox = document.getElementById('po_box').value;
            const city = document.getElementById('city').value;
            if (poBox && city) {
                const newOption = new Option(`${poBox} - ${city}`, 'new');
                document.getElementById('address_id').add(newOption);
                document.getElementById('addressForm').reset();
                $('#addAddressModal').modal('hide');
            }
        }

        // Ajout dynamique d'un nouvel équipement
        function addEquipment() {
            const equipmentName = document.getElementById('equipment_name').value;
            if (equipmentName) {
                const newOption = new Option(equipmentName, 'new');
                document.getElementById('equipment_id').add(newOption);
                document.getElementById('equipmentForm').reset();
                $('#addEquipmentModal').modal('hide');
            }
        }
    </script>
@endsection
