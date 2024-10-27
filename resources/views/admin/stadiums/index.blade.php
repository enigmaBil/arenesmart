@extends('layouts.admin')
@section('content')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('dashboard')}}">aren<strong style="color: #39B54A;">S</strong>mart</a>
        <span class="breadcrumb-item active">Stades</span>
    </nav>
    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-12">
                <div class="card pd-5 pd-sm-10 my-2">
                    <a href="{{route('stadium.create')}}" class="btn btn-success  text-center rounded" style="width: 15%; outline: none !important;">
                        <i class="fa fa-plus-square"></i> Ajouter un stade
                    </a>
                </div>
            </div>
        </div>
        <div class="row row-sm">
            <div class="col-md-12">
                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">Liste des Stades</h6>
                    <table id="stadium" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Capicité</th>
                            <th>Adresse</th>
                            <th>Activité</th>
                            <th>Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        @if($stadiums === null)
                            <tr>
                                <td colspan="7" class="text-center">Aucun stade trouvé pour le moment.</td>
                            </tr>
                        @else
                            @foreach ($stadiums as $stadium)
                                <tr>
                                    <td>{{ $stadium->name}}</td>
                                    <td>{{ $stadium->capacity}}</td>
                                    <td>{{ $stadium->adresse->city->name}}</td>
                                    <td>{{ $stadium->activity->name}}</td>
                                    <td>
                                        <a href="{{ route('stadium.show', $stadium->id) }}" class="text-muted mx-1" title="Voir">
                                            <i class="fa fa-eye fa-lg"></i>
                                        </a>
                                        <a href="{{ route('stadium.edit', $stadium->id) }}" class="text-warning mx-1" title="Éditer">
                                            <i class="fa fa-edit fa-lg"></i>
                                        </a>
                                        <form action="{{ route('stadium.destroy', $stadium->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce stade ?')" class="btn btn-link text-danger p-0 m-0">
                                                <i class="fa fa-trash fa-lg"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div><!-- sl-pagebody -->
@endsection
@section('js')
    <!-- Page specific script -->
    <script>
        $(function () {
            $('#table-stadiums').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true, // Active la recherche
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "pageLength": 10,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/French.json",
                    "searchPlaceholder": 'Search...',
                    "sSearch": '',
                    "lengthMenu": '_MENU_ items/page',
                }
            });
        });
        $('#stadium').DataTable({
            paging: true,
            lengthChange: true,
            searching: true, // Active la recherche
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
            pageLength: 10,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.25/i18n/French.json",
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
            }
        });
    </script>
@endsection
