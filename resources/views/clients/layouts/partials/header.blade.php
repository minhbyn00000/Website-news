<div class="container">
    <nav class="navbar navbar-expand-lg navbar-white">
        <a class="navbar-brand order-1" href="/">
            <img class="img-fluid" width="100px" src="/clients/images/logo1.png"
                alt="Reader | Hugo Personal Blog Template">
        </a>
        <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{ route('index') }}" role="button">
                        Trang chủ
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="/" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        Về chúng tôi
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Liên hệ</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">Tin tức <i class="ti-angle-down ml-1"></i>
                    </a>
                    <div class="dropdown-menu">

                        @foreach ($categories as $category)
                            <a class="dropdown-item"
                                href="{{ route('category', ['id' => $category->id]) }}">{{ $category->name }}</a>
                        @endforeach

                    </div>
                </li>

            </ul>
        </div>

        <div class="order-2 order-lg-3 d-flex align-items-center">

            <!-- search -->
            <form action="{{ route('news.filter') }}" class="search-bar">
                <input id="search-query" name="search" type="search" placeholder="Type & Hit Enter...">
            </form>


            <div class="ml-3">
                <a href="{{ route('admin.index') }}"><i class="ti-user"></i></a>
            </div>
        </div>

    </nav>
</div>
