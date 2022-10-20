<div>
    <div class="container">
        <div class="row">
            <ul>
                @foreach ($categories as $item)
                <li><a href="#">{{$item->nombre_cat}}</a></li>
                @endforeach
                    
            </ul>
        </div>
    </div>
</div>
