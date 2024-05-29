@extends('publiclayout.navbar')

@section('title', 'Kategori Berita')

@section('content')
<style>
    .card-img-top {
        height: 200px;
        /* Sesuaikan dengan tinggi gambar yang diinginkan */
        object-fit: cover;
    }
</style>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Kategori Berita</div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('assets/images/business.jpg') }}" class="card-img-top" alt="Berita Politik">
                            <div class="card-body">
                                <h5 class="card-title"><a href="#">Berita Bisnis</a></h5>
                                <p class="card-text">Deskripsi singkat atau informasi tambahan bisa ditambahkan di sini.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('assets/images/entertainment.jpg') }}" class="card-img-top" alt="Berita Ekonomi">
                            <div class="card-body">
                                <h5 class="card-title"><a href="#">Berita Hiburan</a></h5>
                                <p class="card-text">Deskripsi singkat atau informasi tambahan bisa ditambahkan di sini.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('assets/images/sports.jpg') }}" class="card-img-top" alt="Berita Teknologi">
                            <div class="card-body">
                                <h5 class="card-title"><a href="#">Berita Olahraga</a></h5>
                                <p class="card-text">Deskripsi singkat atau informasi tambahan bisa ditambahkan di sini.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Tambahkan col-md-4 dan card lainnya sesuai dengan kategori berita yang diinginkan -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection