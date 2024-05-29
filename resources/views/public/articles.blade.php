@extends('publiclayout.navbar')

@section('title', 'Home')

@section('content')

<div class="row">
    <div class="col-md-8">
        <!-- carousel -->
        <div id="carouselExampleDark" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                @foreach ($newest as $key => $article)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="10000">
                    <img src="{{ asset('storage/images/' . $article->img) }}" style="width: 100%; height:500px; object-fit: cover; padding:0;" alt="...">
                    <div class="carousel-caption d-none d-md-block" style="background-color: rgba(0, 0, 0, 0.4);
                    -webkit-backdrop-filter: blur(5px);
                    backdrop-filter: blur(5px);">
                        <h5>{{ $article->title }}</h5>
                        <p>{{ $article->description }}</p>
                        <!-- You can add more details or customize the content here -->
                    </div>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="col-md-4">
        <!-- list -->
        <div class="row">
            <h6 class="text-muted">List Group with Images</h6>
            <ul class="list-group">
                <a href="/category" class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="image-parent">
                        <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/don_quixote.jpg" class="img-fluid" alt="quixote">
                    </div>
                    Don Quixote
                </a>
                <a class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="image-parent">
                        <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/as_I_lay.jpg" class="img-fluid" alt="lay">
                    </div>
                    As I Lay Dying
                </a>
                <a class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="image-parent">
                        <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/things_fall_apart.jpg" class="img-fluid" alt="things">
                    </div>
                    Things Fall Apart
                </a>
            </ul>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        @foreach ($data as $item)
        <div class="col-xl-3 col-md-6 mb-4 articleList">
            <a href="{{ route("articles.news", ['id' => $item->id])}}" style="text-decoration: none;">
                <div class="card border-0 shadow" style="cursor: pointer;">
                    <img src="{{ asset('storage/images/' . $item->img) }}" style="width: 100%; height:250px; object-fit: cover; padding:0;" card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title mb-0">{{ $item->title }}</h5>
                        <div class="card-text text-black-50">Web Developer</div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
<div class="pagination d-flex flex-row justify-content-between mt-3">
    <div class="showData">
        <span>Data ditampilkan {{ $data->count() }} dari {{ $data->total() }} </span>
    </div>
    <div>
        {{ $data->links() }}
    </div>
</div>

@endsection