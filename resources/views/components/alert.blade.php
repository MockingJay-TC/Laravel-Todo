<div>
    <!-- Simplicity is an acquired taste. - Katharine Gerould -->
    {{$slot}}
    @if(session()->has('message'))

<div class="m-3 py-4 px-2 bg-green-400">{{session()->get('message')}}</div>

@elseif(session()->has('error'))

<div class="m-3 py-4 px-2 bg-red-400">{{session()->get('error')}}</div>

@endif
</div>