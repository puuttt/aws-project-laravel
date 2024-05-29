@extends('layouts.app')
  
@section('title', 'Home Product')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Product</h1>
        <a href="{{ route('articles.create') }}" class="btn btn-primary">Add Product</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Photo 1</th>
                <th>Photo 2</th>
                <th>Photo 3</th>
                <th>News Content</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>+
            @if($article->count() > 0)
                @foreach($article as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->title }}</td>
                        <td class="align-middle">{{ $rs->description }}</td>
                        <td class="align-middle">
                            <img src="{{ asset('storage/images/' . $rs->img) }}" alt="{{ $rs->title }}" class="img-thumbnail" width="100">
                        </td>
                        <td class="align-middle">
                            <img src="{{ asset('storage/images/' . $rs->img2) }}" alt="{{ $rs->title }}" class="img-thumbnail" width="100">
                        </td>
                        <td class="align-middle">
                            <img src="{{ asset('storage/images/' . $rs->img3) }}" alt="{{ $rs->title }}" class="img-thumbnail" width="100">
                        </td>
                        <td class="align-middle">{{ Str::limit($rs->news_content, 200) }}</td>  
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('articles.show', $rs->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('articles.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('articles.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Product not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection