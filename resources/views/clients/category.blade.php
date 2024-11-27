@extends('clients.layouts.master')

@section('title')
    qqq
@endsection

@section('breadcump')
    <div class="banner text-center">
        @include('clients.components.breadcump', [
            'name' => 'Tin tức',
            'breadcump' => 'Home / ' .$categoryName
        ])
    </div>
@endsection

@section('content')
    <section class="section-sm">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12  mb-5 mb-lg-0">
                    <h2 class="h5 section-title">Bài đăng gần đây</h2>
                    @foreach ($news as $item)
                        <article class="card mb-4">
                            <div class="post-slider">
                                <img src="{{ asset('images/' . $item->image) }}" class="card-img-top" alt="post-thumb">
                            </div>
                            <div class="card-body">
                                <h3 class="mb-3"><a class="post-title"
                                        href="{{ route('details', ['id' => $item->id]) }}">{{ Str::limit($item->title, 100, ' ...') }}</a>
                                </h3>
                                <ul class="card-meta list-inline">
                                    <li class="list-inline-item">
                                        <a href="author-single.html" class="card-meta-author">
                                            <img src="/clients/images/john-doe.jpg" alt="John Doe">
                                            <span>John Doe</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="ti-timer"></i>{{ $item->created_at }}
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="ti-eye"></i>{{ $item->views }}
                                    </li>
                                    <li class="list-inline-item">
                                        <ul class="card-meta-tag list-inline">
                                            <li class="list-inline-item"><a href="{{ route('category', ['id' => $item->id]) }}">{{ $item->category_name }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <p>{{ Str::limit($item->description, 200, ' ...') }}</p>
                                <a href="{{ route('details', ['id' => $item->id]) }}" class="btn btn-outline-primary">Đọc
                                    thêm</a>
                            </div>
                        </article>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endsection
