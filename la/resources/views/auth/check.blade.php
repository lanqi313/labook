  @if(Auth::check())              
                {{Auth::user()->name}}
                {{" is logged in..."}}
                @endif