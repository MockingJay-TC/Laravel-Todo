<div>
    <!-- Simplicity is an acquired taste. - Katharine Gerould -->
    {{$slot}}
    @if(session()->has('message'))

    <div class="m-3 py-4 px-2 bg-green-300">{{session()->get('message')}}</div>

    @elseif(session()->has('error'))

    <div class="m-3 py-4 px-2 bg-red-300">{{session()->get('error')}}</div>

    @endif
    @if($errors->any())
    <div class="m-3 py-4 px-2 bg-red-300">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

</div>