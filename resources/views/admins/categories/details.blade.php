@extends('admins.layouts.master')

@section('content')
    <h2>Category: {{ $category->name }}</h2>
    <h3>Articles in this category:</h3>
    <ul>
        @foreach($news as $article)
            <li>
                <a href="{{ route('details', $article->id) }}">{{ $article->title }}</a>
            </li>
        @endforeach
    </ul>
@endsection
