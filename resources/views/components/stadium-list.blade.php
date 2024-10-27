<div class="container py-3">	
    @if(count($stadiums) > 0)    
    <div class="row mt-5 pt-4">
        @foreach($stadiums as $stadium)
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm">
                    <img src="{{ asset($stadium->image_url) }}" class="card-img-top" alt="image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $stadium->name }}</h5>
                        <p class="text-muted">Lorem ipsum dolor sit amet. Qui alias galisum sed eaque corrupti qui voluptatem numquam eos porro rerum in nihil quidem sit veniam laudantium et dolorum harum? Ex quos quod</p>
                        <p><i class="fas fa-map-marker-alt"></i> Douala </p>
                        <button class="btn bg-success btn-block">
                            <a href="{{ route('stadium.details', $stadium->id) }}" class="text-light">Réserver</a>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @else
    <p class="text-center">Aucun stade disponible en ce moment</p>
    @endif
</div>
