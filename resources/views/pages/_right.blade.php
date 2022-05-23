<div class="right-splash m-auto mr-3 mobile-hide">
    <div style="height: 100%; flex-grow:1;"></div>
    <div class="speech-bubble text-lowercase">

        @if(Auth::check() && !Config::get('lorekeeper.extensions.navbar_news_notif'))
            @if(Auth::user()->is_news_unread)
                <div><h5>Be sure to check out the <a href="{{ url('news') }}">latest news!</a></h5></div>
                @elseif(Auth::user()->is_sales_unread)
                <div><h5>Check out the new <a href="{{ url('sales') }}">sales post!</a></h5></div>
                @else
                <div><h5>You're all caught up!</h5></div>
            @endif
        @endif
    </div>
    <div class="right-image">
        <img src="{{ asset('images/orion.png') }}" />
    </div>
</div>
