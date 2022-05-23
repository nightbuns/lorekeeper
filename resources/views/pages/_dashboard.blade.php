<div class="row">
    <div class="col-md-4">
        <div class="card mb-4 pb-4">
            <div class="card-body text-center">
                
                <div class="m-auto bg-primary dashboard-icons">
                    <img src="{{ asset('images/characters_icon.png') }}" alt="Characters"/>
                    <h5 class="card-title text-white">Characters</h5>
                </div>
            </div>
            <div class="m-auto dash-btn">
                <a class="btn btn-primary" href="{{ url('characters') }}">Characters</a>
                <a class="btn btn-primary" href="{{ url('characters/myos') }}">MYO Slots</a>
                <a class="btn btn-primary" href="{{ url('characters/transfers/incoming') }}">Transfers</a>
            </div>
        </div>
    </div>
	
	<div class="col-md-4">
        <div class="card mb-4 pb-4">
            <div class="card-body text-center">

                <div class="m-auto bg-primary dashboard-icons">
                    <img src="{{ asset('images/inventory_icon.png') }}" alt="Inventory" />
                    <h5 class="card-title text-white">Inventory</h5>
                </div>
            </div>
            <div class="m-auto dash-btn">
                <a class="btn btn-primary" href="{{ url('inventory') }}">Inventory</a>
                <a class="btn btn-primary" href="{{ Auth::user()->url . '/item-logs' }}">Item Logs</a>
                <a class="btn btn-primary" href="{{ url('shops') }}">Shops</a>
            </div>
        </div>
    </div>
	
	<div class="col-md-4">
        <div class="card mb-4 pb-4">
            <div class="card-body text-center">
                <div class="m-auto bg-primary dashboard-icons">
                    <img src="{{ asset('images/bank_icon.png') }}" alt="Bank" />
                    <h5 class="card-title text-white">Bank</h5>
                </div>
            </div>
            <div class="m-auto dash-btn">
                <a class="btn btn-primary" href="{{ url('bank') }}">Bank</a>
                <a class="btn btn-primary" href="{{ Auth::user()->url . '/currency-logs' }}">Currency Logs</a>
            </div>
        </div>
    </div>
</div>
