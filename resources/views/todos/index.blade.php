All todos



<ul>

    @foreach($todos as $todo)
    <li p-4>
        {{$todo->title}}
    </li>
    @endforeach

</ul>