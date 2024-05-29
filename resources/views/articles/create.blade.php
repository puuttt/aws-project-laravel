@extends('layouts.app')

@section('title', 'Create Product')

@section('contents')
<h1 class="mb-0">Add Product</h1>
<hr />
<form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <div class="col">
            <input type="text" name="title" class="form-control" placeholder="Title">
        </div>
        <div class="col">
            <input type="text" name="description" class="form-control" placeholder="description">
        </div>
        <div class="col">
            <input type="text" name="category" class="form-control" placeholder="category">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <div class="custom-file">
                <input type="file" class="custom-file-input" accept=".png, .jpg, .jpeg" id="inputFoto" name="img" onchange="previewImg()">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        </div>
        <div class="col">
            <div class="custom-file">
                <input type="file" class="custom-file-input" accept=".png, .jpg, .jpeg" id="inputFoto" name="img2" onchange="previewImg()">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        </div>
        <div class="col">
            <div class="custom-file">
                <input type="file" class="custom-file-input" accept=".png, .jpg, .jpeg" id="inputFoto" name="img3" onchange="previewImg()">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <textarea class="form-control" name="news_content" placeholder="News_Content"></textarea>
        </div>
    </div>

    <div class="row">
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection