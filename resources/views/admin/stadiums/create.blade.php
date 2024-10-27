<!-- resources/views/stadiums/create.blade.php -->
@extends('layouts.admin')

@section('content')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('dashboard')}}">aren<strong style="color: #39B54A;">S</strong>mart</a>
        <a class="breadcrumb-item" href="{{route('stadium.list')}}">stades</a>
        <span class="breadcrumb-item active">ajouter un stade</span>
    </nav>
    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-12">
                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">Ajouter un stade</h6>
                    <form action="{{ route('stadium.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nom du Stade</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <!-- Adresse avec bouton pour créer une nouvelle adresse -->
                                <div class="mb-3">
                                    <label for="activity_id" class="form-label">Activité</label>
                                    <div class="input-group">
                                        <select class="form-select form-control" id="activity_id" name="activity_id" required>
                                            <option value="">Sélectionnez une activité</option>
                                            @foreach($activities as $activity)
                                                <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="capacity" class="form-label">Capacité</label>
                                    <input type="number" class="form-control" id="capacity" name="capacity" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Adresse avec bouton pour créer une nouvelle adresse -->
                                <div class="mb-3">
                                    <label for="adresse_id" class="form-label">Adresse</label>
                                    <div class="input-group">
                                        <select class="form-select form-control mr-1" id="adresse_id" name="adresse_id" required>
                                            <option value="">Sélectionnez une adresse</option>
                                            @foreach($adresses as $adresse)
                                                <option value="{{ $adresse->id }}">{{ $adresse->city->name }}</option>
                                            @endforeach
                                        </select>
                                        <button title="Ajouter une adresse" type="button" class="btn btn-success" data-toggle="modal" data-target="#createAdresseModal">
                                            <i class="fa fa-plus-square"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Équipement avec bouton pour créer un nouvel équipement -->
                                <div class="mb-3">
                                    <label for="equipment_id" class="form-label">Équipement</label>
                                    <div class="input-group">
                                        <select class="form-select  form-control mr-1" id="equipment_id" name="equipment_id" required>
                                            <option value="">Sélectionnez un équipement</option>
                                            @foreach($equipments as $equipment)
                                                <option value="{{ $equipment->id }}">{{ $equipment->name }}</option>
                                            @endforeach
                                        </select>
                                        <button title="Ajouter un equipement" type="button" class="btn btn-success" data-toggle="modal" data-target="#createEquipmentModal">
                                            <i class="fa fa-plus-square"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Section pour l'ajout de photos -->
                                <div class="mb-3">
                                    <label for="photos" class="form-label">Photos du Stade</label>
                                    <input type="file" class="form-control" id="photos" name="photos[]" accept="image/*" multiple>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Section pour la prévisualisation des photos -->
                                <div id="photosPreview" class="mt-3"></div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal pour créer une nouvelle adresse -->
    <div class="modal fade" id="createAdresseModal" tabindex="-1" aria-labelledby="createAdresseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-vertical-center" role="document" style="width: 30vw;">
            <div class="modal-content bd-0 tx-14">

                <div class="modal-body pd-25">
                    <form id="createAdresseForm">
                        <div class="modal-header pd-y-20 pd-x-25 justify-content-between">
                            <h6 class="tx-12 mg-b-0 tx-uppercase tx-inverse tx-bold">Ajouter une Nouvelle Adresse</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                            <div class="mb-3">
                                <label for="city_id" class="form-label">Ville</label>
                                <div class="input-group">
                                    <select class="form-select form-control select2" id="city_id" name="city_id" required>
                                        <option value="">Sélectionnez la ville</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="po_box" class="form-label">Code Postal</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="po_box" name="po_box" placeholder="BP.2568 Yaounde, Cameroun" required>
                                </div>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary" id="saveAdresseBtn">Enregistrer</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal pour créer un nouvel équipement -->
    <div class="modal fade" id="createEquipmentModal" tabindex="-1" aria-labelledby="createEquipmentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-vertical-center" role="document" style="width: 30vw;">
            <div class="modal-content bd-0 tx-14">
                <form id="createEquipmentForm">
                    <div class="modal-header pd-y-20 pd-x-25 justify-content-between">
                        <h6 class="tx-12 mg-b-0 tx-uppercase tx-inverse tx-bold">Ajouter un Nouvel Équipement</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name_eq" class="form-label">Nom de l'Équipement</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="name_eq" name="name" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description de l'Équipement</label>
                            <div class="input-group">
                                <textarea class="form-control" id="description" name="description" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-success" id="saveEquipmentBtn">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        document.getElementById('saveAdresseBtn').addEventListener('click', function() {
            const data = {
                city_id: document.getElementById('city_id').value,
                po_box: document.getElementById('po_box').value,
            };

            console.log(data);

            fetch("{{ route('adresse.store') }}", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(data),

            })
                .then(response => response.json())
                .then(adresse => {
                    console.log(adresse);
                    const select = document.getElementById('adresse_id');
                    const option = new Option(adresse.po_box + ', ' + adresse.city_id, adresse.id);
                    select.add(option, undefined);
                    select.value = adresse.id;
                    $('#createAdresseModal').modal('hide')
                    this.reload();
                })
                .catch(error => {
                    console.error('Erreur lors de l\'ajout de l\'adresse:', error);
                });
        });

        document.getElementById('saveEquipmentBtn').addEventListener('click', function() {
            const data = {
                name: document.getElementById('name_eq').value,
                description: document.getElementById('description').value,
            };
            console.log(data);

            fetch("{{ route('equipment.store') }}", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(data)
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erreur lors de la création de l\'équipement');

                    }
                    return response.json();
                })
                .then(equipment => {
                    console.log(equipment);
                    const select = document.getElementById('equipment_id');
                    const option = new Option(equipment.name + ', ' + equipment.description, equipment.id);
                    select.add(option, undefined);
                    select.value = equipment.id;
                    $('#createEquipmentModal').modal('hide');
                    this.reload();
                })
                .catch(error => {
                    console.error('Erreur lors de l\'ajout de l\'équipement:', error);
                    // alert(error); // Affiche l'erreur
                });
        });


        $(document).ready(function() {
            $('.select2').select2();
        });

        document.getElementById('photos').addEventListener('change', function(event) {
            const photosPreview = document.getElementById('photosPreview');
            photosPreview.innerHTML = ''; // Réinitialiser la prévisualisation

            const files = event.target.files;
            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('img-thumbnail', 'col-md-4', 'm-2');
                    img.style.width = '100px';
                    img.style.height = '100px';
                    photosPreview.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
@endsection
