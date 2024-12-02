<div class="mt-5 p-3">
    <form wire:submit.prevent="submit" class="gbnc-simple-form">
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="start_at">Date et heure de debut</label>
                    <span class="text-danger">*</span>
                    <div class="input-group date">
                        <input 
                            wire:model="start_at" 
                            value="{{ $start_at }}" 
                            type="datetime-local"
                            class="form-control" 
                        />
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="end_at">Date et heure de fin</label>
                    <span class="text-danger">*</span>
                    <div class="input-group date">
                        <input 
                            wire:model="end_at" 
                            value="{{ $end_at }}" 
                            type="datetime-local" 
                            class="form-control" 
                        />
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <label for="description">Message descriptif</label>
                    <textarea class="form-control" wire:model="description" placeholder="Vous pouvez accompagner votre demande de réservation d'un message descriptif afin d'apporter un peu de détails" id="description">{{old('description')}}</textarea>
                </div>
            </div>
            @if ( count($errors) > 0)
            <div class="col-md-12 px-2">
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            </div>
            @endif
            @if (session()->has('message'))
            <div class="col-md-12 px-2"></div>
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            </div>
            @endif
            <div class="col-lg-12 d-flex justify-content-end">
                <button type="submit" value="Reserver" wire:model="submit" id="submitButton" class="btn btn-success float-right">Reserver</button>
            </div>
        </div>
    </form>
    <p class="form-message"></p>
</div>