@if(count($errors))
    <article class="card-panel red lighten-1 white-text">
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </article>
@endif