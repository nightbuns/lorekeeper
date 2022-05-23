@extends('world.layout')

@section('title') Home @endsection

@section('content')
{!! breadcrumbs(['Encyclopedia' => 'world']) !!}

<h1>World</h1>
<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-body text-center">

                <div class="m-auto bg-primary dashboard-icons">
                    <img src="{{ asset('images/characters_icon.png') }}" alt="Characters"/>
                    <h5 class="card-title text-white">Characters</h5>
                </div>
            </div>

            <div class="mb-3 mx-3 dash-btn text-center">
                <div class="row mb-3">
                    <div class="col">
                        <a class="btn btn-primary d-block" href="{{ url('world/species') }}">Species</a>
                    </div>
				    <div class="col">
                        <a class="btn btn-primary d-block" href="{{ url('world/subtypes') }}">Subtypes</a>
                    </div>
                    <div class="col">
                        <a class="btn btn-primary d-block" href="{{ url('world/rarities') }}">Rarities</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary d-block" href="{{ url('world/trait-categories') }}">Trait Categories</a>
                    </div>
                    <div>
                        <a class="btn btn-primary d-block" href="{{ url('world/traits') }}">All Traits</a>
                    </div>
                    <div class="col">
                        <a class="btn btn-primary d-block" href="{{ url('world/character-categories') }}">Character Categories</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-body text-center">

                <div class="m-auto bg-primary dashboard-icons">
                    <img src="{{ asset('images/inventory_icon.png') }}" alt="Inventory" />
                    <h5 class="card-title text-white">Items</h5>
                </div>
            </div>

            <div class="mb-3 mx-3 dash-btn text-center row">
                <div class="col-4">
                    <a class="btn btn-primary d-block" href="{{ url('world/item-categories') }}">Categories</a>
                </div>
                <div class="col-4">
                    <a class="btn btn-primary d-block" href="{{ url('world/items') }}">All Items</a>
                </div>

                <div class="col-4">
                    <a class="btn btn-primary d-block" href="{{ url('world/currencies') }}">Currencies</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
