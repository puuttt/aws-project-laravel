@extends('layouts.app')

@section('title', 'Edit Product')

@section('contents')
<h1 class="mb-0">Edit Product</h1>
<hr />
<form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row mb-3">
        <div class="col">
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $article->title }}">
        </div>
        <div class="col">
            <input type="text" name="description" class="form-control" placeholder="description" value="{{ $article->description }}">
        </div>
        <div class="col">
            <input type="text" name="category" class="form-control" placeholder="category" value="{{ $article->category }}">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <div class="custom-file">
                <input type="file" class="custom-file-input" accept=".png, .jpg, .jpeg" id="inputFoto" name="img" onchange="previewImg()">
                <label class="custom-file-label" for="customFile">{{ $article->img }}</label>
            </div>
        </div>
        <div class="col">
            <div class="custom-file">
                <input type="file" class="custom-file-input" accept=".png, .jpg, .jpeg" id="inputFoto" name="img2" onchange="previewImg()">
                <label class="custom-file-label" for="customFile">{{ $article->img2 }}</label>
            </div>
        </div>
        <div class="col">
            <div class="custom-file">
                <input type="file" class="custom-file-input" accept=".png, .jpg, .jpeg" id="inputFoto" name="img3" onchange="previewImg()">
                <label class="custom-file-label" for="customFile">{{ $article->img3 }}</label>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <textarea class="form-control" name="news_content">{{ $article->news_content }}</textarea>
        </div>
    </div>








    <!-- <div class="row">
            <div class="col mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $article->title }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $article->description }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Product Code</label>
                <input type="text" name="product_code" class="form-control" placeholder="Product Code" value="{{ $article->img }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Product Code</label>
                <input type="text" name="product_code" class="form-control" placeholder="Product Code" value="{{ $article->img2 }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Product Code</label>
                <input type="text" name="product_code" class="form-control" placeholder="Product Code" value="{{ $article->img3 }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" placeholder="Descriptoin" >{{ $article->description }}</textarea>
            </div>
        </div> -->
    <div class="row">
        <div class="d-grid">
            <button class="btn btn-warning">Update</button>
        </div>
    </div>
</form>

<script>
    function previewImg() {
        const foto = document.querySelector('#inputFoto');
        const fotoLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        fotoLabel.textContent = foto.files[0].name;

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
@endsection