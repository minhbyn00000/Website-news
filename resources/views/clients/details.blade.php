@extends('clients.layouts.master')

@section('title')
    Details
@endsection

@section('content')
<section class="section">
<div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-9 mb-5 mb-lg-0">
        <article>
          <div class="post-slider mb-4">
            @if(isset($new) && !is_null($new->image))
              <img src="{{ asset('images/' . $new->image) }}" class="card-img" alt="post-thumb">
            @else
              <p>Image not available</p>
            @endif
          </div>
          
          @if(isset($new) && !is_null($new->title))
            <h1 class="h2">{{ $new->title }}</h1>
          @endif

          <ul class="card-meta my-3 list-inline">
            <li class="list-inline-item">
              <a href="author-single.html" class="card-meta-author">
                <img src="/clients/images/john-doe.jpg">
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
                  <li class="list-inline-item">
                    <a href="{{ route('category', ['id' => $new->id]) }}">{{ $new->category_name }}</a>
                  </li>
                </ul>
              </li>
            @endif
          </ul>

          @if(isset($new) && !is_null($new->description))
            <div class="content">
              {{ $new->description }}
            </div>
          @endif
        </article>
      </div>

      <!-- Comments Section -->
      <div class="col-lg-9 col-md-12">
          <div class="mb-5 border-top mt-4 pt-5">
              <h3 class="mb-4">Comments</h3>

              <!-- Comment 1 -->
              <div class="media d-block d-sm-flex mb-4 pb-4">
                  <a class="d-inline-block mr-2 mb-3 mb-md-0" href="#">
                      <img src="/clients/images/post/user-01.jpg" class="mr-3 rounded-circle" alt="">
                  </a>
                  <div class="media-body">
                      <a href="#!" class="h4 d-inline-block mb-3">Alexender Grahambel</a>
                      <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                      <span class="text-black-800 mr-3 font-weight-600">April 18, 2020 at 6.25 pm</span>
                      <a class="text-primary font-weight-600" href="#!">Reply</a>
                  </div>
              </div>

              <!-- Comment 2 -->
              <div class="media d-block d-sm-flex">
                  <a class="d-inline-block mr-2 mb-3 mb-md-0" href="#">
                      <img class="mr-3" src="/clients/images/post/arrow.png" alt="">
                      <a href="#!"><img src="/clients/images/post/user-02.jpg" class="mr-3 rounded-circle" alt=""></a>
                  </a>
                  <div class="media-body">
                      <a href="#!" class="h4 d-inline-block mb-3">Nadia Sultana Tisa</a>
                      <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                      <span class="text-black-800 mr-3 font-weight-600">April 18, 2020 at 6.25 pm</span>
                      <a class="text-primary font-weight-600" href="#!">Reply</a>
                  </div>
              </div>
          </div>

          <!-- Leave a Comment Section -->
          <div>
              <h3 class="mb-4">Leave a Reply</h3>
              <form method="POST">
                  <div class="row">
                      <div class="form-group col-md-12">
                          <textarea class="form-control shadow-none" name="comment" rows="7" required></textarea>
                      </div>
                      <div class="form-group col-md-4">
                          <input class="form-control shadow-none" type="text" placeholder="Name" required>
                      </div>
                      <div class="form-group col-md-4">
                          <input class="form-control shadow-none" type="email" placeholder="Email" required>
                      </div>
                      <div class="form-group col-md-4">
                          <input class="form-control shadow-none" type="url" placeholder="Website">
                          <p class="font-weight-bold valid-feedback">OK! You can skip this field.</p>
                      </div>
                  </div>
                  <button class="btn btn-primary" type="submit">Comment Now</button>
              </form>
          </div>
      </div>
      
    </div>
  </div>
</section>
@endsection
