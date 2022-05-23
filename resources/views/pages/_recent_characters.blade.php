<div class="dashboard-recent">
    <div class="card mb-4">
        <div class="card-body">
            <h3>Your Galactic Explorers</h3>
                @if($characters->count())
                <div class="row">
                    @foreach($characters as $character)
                        <div class="col-md-3 col-6 text-center mb-2">
                            <div>
                                <a href="{{ $character->url }}"><img src="{{ $character->image->thumbnailUrl }}" class="img-thumbnail" alt="Thumbnail for {{ $character->fullName }}" /></a>
                            </div>
                            <div class="mt-1 h5">
                                @if(!$character->is_visible) <i class="fas fa-eye-slash"></i> @endif {!! $character->displayName !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>No astronauts found!</p>
            @endif       
        </div>
    </div>
</div>
