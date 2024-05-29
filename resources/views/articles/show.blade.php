@extends('layouts.app')

@section('title', 'Show News')

@section('contents')
<h1 class="mb-0">Detail News</h1>
<hr />
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $article->title }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" name="description" placeholder="Description" readonly>{{ $article->description }}</textarea>
    </div>
</div>
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Category</label>
        <input type="text" name="product_code" class="form-control" placeholder="Category" value="{{ $article->category }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" name="news_content" placeholder="Content" readonly>{{ $article->news_content }}</textarea>
    </div>
</div>
<div class="row">
    <div class="container col mb-3">
        <img src="{{ asset('storage/images/' . $article->img) }}" class="img-thumbnail" alt="Article Image" style="width: 40%; height: auto;">
        <input type="text" name="product_code" class="form-control" placeholder="Image" value="{{ $article->img }}" readonly>
    </div>
    <div class="col mb-3">
        <img src="{{ asset('storage/images/' . $article->img2) }}" class="img-thumbnail" alt="Article Image" style="width: 40%; height: auto;">
        <input type="text" name="product_code" class="form-control" placeholder="Image" value="{{ $article->img2 }}" readonly>
    </div>
    <div class="col mb-3">
        <img src="{{ asset('storage/images/' . $article->img3) }}" class="img-thumbnail" alt="Article Image" style="width: 40%; height: auto;">
        <input type="text" name="product_code" class="form-control" placeholder="Image" value="{{ $article->img3 }}" readonly>
    </div>
</div>
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Created At</label>
        <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $article->created_at }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Updated At</label>
        <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $article->updated_at }}" readonly>
    </div>
</div>
@endsection