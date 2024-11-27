@extends('clients.layouts.master')

@section('title')
    Home
@endsection

@section('breadcump')
    <div class="banner text-center">
        @include('clients.components.breadcump', [
            'name' => 'Hôm nay <br> Bạn thích đọc gì?',
            'breadcump' => $categories->map(function ($category) {
                return '<li class="list-inline-item"><a href="' .
                    route('category', ['id' => $category->id]) .
                    '">' .
                    $category->name .
                    '</a></li>';
            })->implode(''),
        ])
    </div>
@endsection

@section('content')
    <section class="section pb-0">
        <div class="container">
            <div class="row">
                <!-- Lựa chọn của hôm nay -->
                <div class="col-lg-4 mb-5">
                    <h2 class="h5 section-title">Lựa chọn của hôm nay</h2>
                    <article class="card">
                        @if(isset($new) && !is_null($new->image))
                            <img style="height: 200px;" src="{{ asset('images/' . $new->image) }}" class="card-img-top" alt="post-thumb">
                        @else
                            <p>Image not available</p>
                        @endif

                        <div class="card-body">
                            @if(isset($new) && !is_null($new->id))
                                <h3 class="h4 mb-3">
                                    <a class="post-title" href="{{ route('details', ['id' => $new->id]) }}">
                                        {{ $new->title }}
                                    </a>
                                </h3>
                            @else
                                <p>No post available</p>
                            @endif

                            <ul class="card-meta list-inline">
                                <li class="list-inline-item">
                                    <a href="author-single.html" class="card-meta-author">
                                        <img src="/clients/images/Screenshot 2024-10-05 103655.png" width="75px"> 
                                        <span>Charls Xaviar</span>
                                    </a>
                                </li>
                                @if(isset($new) && !is_null($new->created_at))
                                    <li class="list-inline-item">
                                        <i class="ti-timer"></i>{{ $new->created_at }}
                                    </li>
                                @endif
                                @if(isset($new) && !is_null($new->views))
                                    <li class="list-inline-item">
                                        <i class="ti-eye"></i>{{ $new->views }}
                                    </li>
                                @endif
                                @if(isset($new) && !is_null($new->category_name))
                                    <li class="list-inline-item">
                                        <ul class="card-meta-tag list-inline">
                                            <li class="list-inline-item"><a href="/">{{ $new->category_name }}</a></li>
                                        </ul>
                                    </li>
                                @endif
                            </ul>

                            @if(isset($new) && !is_null($new->description))
                                <p>{{ Str::limit($new->description, 50, ' ...') }}</p>
                            @endif
                            @if(isset($new) && !is_null($new->id))
                                <a href="{{ route('details', ['id' => $new->id]) }}" class="btn btn-outline-primary">Đọc thêm</a>
                            @endif
                        </div>
                    </article>
                </div>

                <!-- Bài viết thịnh hành -->
                <div class="col-lg-4 mb-5">
                    <h2 class="h5 section-title">Bài viết thịnh hành</h2>

                    @foreach ($newstrend as $new)
                        <article class="card mb-4">
                            <div class="card-body d-flex">
                                @if(isset($new) && !is_null($new->image))
                                    <img class="card-img-sm" src="{{ asset('images/' . $new->image) }}" alt="No Image">
                                @else
                                    <p>Image not available</p>
                                @endif
                                <div class="ml-3">
                                    <h4>
                                        <a href="{{ route('details', ['id' => $new->id]) }}" style="width:100%;" class="post-title">{{ $new->title }}</a>
                                    </h4>
                                    <ul class="card-meta list-inline mb-0">
                                        <li class="list-inline-item mb-0">
                                            <i class="ti-time"></i>{{ $new->created_at }}
                                        </li>
                                        <li class="list-inline-item mb-0">
                                            <i class="ti-eye"></i> {{ $new->views }}
                                        </li>
                                        <li class="list-inline-item mb-0">
                                            <ul class="card-meta-tag list-inline">
                                                <li class="list-inline-item"><a href="/">{{ $new->category_name }}</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <!-- Bài đăng phổ biến -->
                <div class="col-lg-4 mb-5">
                    <h2 class="h5 section-title">Bài đăng phổ biến</h2>
                    <article class="card">
                        <div class="post-slider slider-sm">
                            @if(isset($newPopular) && !is_null($newPopular->image))
                                <img style="height:200px;" src="{{ asset('images/' . $newPopular->image) }}" class="card-img-top" alt="post-thumb">
                            @else
                                <p>Image not available</p>
                            @endif
                        </div>
                        <div class="card-body">
                            @if(isset($newPopular) && !is_null($newPopular->id))
                                <h3 class="h4 mb-3">
                                    <a class="post-title" href="{{ route('details', ['id' => $newPopular->id]) }}">{{ $newPopular->title }}</a>
                                </h3>
                            @else
                                <p>No post available</p>
                            @endif

                            <ul class="card-meta list-inline">
                                <li class="list-inline-item">
                                    <a href="author-single.html" class="card-meta-author">
                                        <img src="/clients/images/Screenshot 2024-10-05 103655.png" alt="Kate Stone" width="75px">
                                        <span>Kate Stone</span>
                                    </a>
                                </li>
                                @if(isset($newPopular) && !is_null($newPopular->created_at))
                                    <li class="list-inline-item">
                                        <i class="ti-timer"></i>{{ $newPopular->created_at }}
                                    </li>
                                @endif
                                @if(isset($newPopular) && !is_null($newPopular->views))
                                    <li class="list-inline-item">
                                        <i class="ti-eye"></i>{{ $newPopular->views }}
                                    </li>
                                @endif
                                @if(isset($newPopular) && !is_null($newPopular->category_name))
                                    <li class="list-inline-item">
                                        <ul class="card-meta-tag list-inline">
                                            <li class="list-inline-item"><a href="/">{{ $newPopular->category_name }}</a></li>
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                            @if(isset($newPopular) && !is_null($newPopular->description))
                                <p>{{ Str::limit($newPopular->description, 50, ' ...') }}</p>
                            @endif
                            <a href="{{ route('details', ['id' => $newPopular->id]) }}" class="btn btn-outline-primary">Đọc thêm</a>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- Bài đăng gần đây -->
    <section class="section-sm">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <h2 class="h5 section-title">Bài đăng gần đây</h2>

                    <article class="card mb-4">
                        <div class="post-slider">
                            @foreach ($newsdescid as $new)
                                <div>
                                    @if(isset($new) && !is_null($new->image))
                                        <img style="height:400px;" src="{{ asset('images/' . $new->image) }}" class="card-img-top" alt="post-thumb">
                                    @else
                                        <p>Image not available</p>
                                    @endif
                                    <div class="card-body">
                                        @if(isset($new) && !is_null($new->id))
                                            <h3 class="mb-3"><a class="post-title" href="{{ route('details', ['id' => $new->id]) }}">{{ $new->title }}</a></h3>
                                        @else
                                            <p>No post available</p>
                                        @endif
                                        <ul class="card-meta list-inline">
                                            <li class="list-inline-item">
                                                <a href="author-single.html" class="card-meta-author">
                                                    <img src="/clients/images/Screenshot 2024-10-05 103655.png" alt="John Doe" width="100px">
                                                    <span>John Doe</span>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <i class="ti-time"></i>{{ $new->created_at }}
                                            </li>
                                            <li class="list-inline-item">
                                                <i class="ti-eye"></i>{{ $new->views }}
                                            </li>
                                            <li class="list-inline-item">
                                                <ul class="card-meta-tag list-inline">
                                                    <li class="list-inline-item"><a href="/">{{ $new->category_name }}</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                        @if(isset($new) && !is_null($new->description))
                                            <p>{{ Str::limit($new->description, 400, ' ...') }}</p>
                                        @endif
                                        @if(isset($new) && !is_null($new->id))
                                            <a href="{{ route('details', ['id' => $new->id]) }}" class="btn btn-outline-primary">Đọc thêm</a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </article>

                </div>
            </div>
        </div>
    </section>
@endsection
