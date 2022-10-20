<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/splide.min.css">

<div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="splide">
                    <div class="splide__track">
                        <div class="splide__list">
                            @foreach ($posts as $item)
                            
                            <div class="col-sm-4 splide__slide m-2">
                                <div class="card text-white" style="    background-position: center top;
                                background-repeat: no-repeat;
                                background-image: url({{Storage::url($item->foto)}});">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$item->titulo}}</h5>
                                        <p class="card-text">{{$item->subtitulo}}</p>
                                        <a href="#" class="btn btn-primary">Read more</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>

    <script>
        var splide = new Splide('.splide', {
            type: 'loop',
            perPage: 3,
            rewind: true,
        });

        splide.mount();
    </script>
</div>
