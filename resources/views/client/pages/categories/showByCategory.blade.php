@extends('client.layouts.master')

@section('content')

    <body>

        <div class="shop-wrapper">

            <!-- Breadcrumb Area Start Here -->
            <div class="breadcrumbs-area position-relative">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="breadcrumb-content position-relative section-content">
                                <h3 class="title-3">Shop Sidebar</h3>
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li>Categories</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Shop Main Area Start Here -->
            <div class="shop-main-area">
                <div class="container container-default custom-area">
                    <div class="row flex-row-reverse">
                        <div class="col-lg-9 col-12 col-custom widget-mt">


                            <!--shop toolbar start-->
                            <div class="shop_toolbar_wrapper">


                                {{-- toolbar  --}}
                                <div class="shop_toolbar_btn">
                                    <button data-role="grid_list" type="button" class="active btn-list"
                                        data-bs-toggle="tooltip" title="List">
                                        <i class="fa fa-th-list"></i>
                                    </button>
                                    <button data-role="grid_3" type="button" class="btn-grid-3" data-bs-toggle="tooltip"
                                        title="3">
                                        <i class="fa fa-th"></i>
                                    </button>
                                </div>



                                {{-- sort products  --}}
                                <div class="shop-select">
                                    <form class="d-flex flex-column w-100" action="{{ url('products') }}" method="get"
                                        id="sortForm">
                                        <div class="form-group">
                                            <select class="form-control nice-select w-100" name="sort_by" id="sortSelect">
                                                <option selected value="1">Alphabetically, A-Z</option>
                                                <option value="2">Sort by rating</option>
                                                <option value="3">Sort by latest</option>
                                                <option value="4">Sort by price: low to high</option>
                                                <option value="5">Sort by price: high to low</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>

                            </div>


                            <!-- Shop Wrapper Start -->
                            <div class="row shop_wrapper grid_list">

                                {{-- products  --}}
                                @foreach ($productsByCategory as $product)
                                    <div class="col-12 col-custom product-area">
                                        <div class="single-product position-relative">

                                            {{-- Image --}}
                                            <div class="product-image">
                                                <a class="d-block"
                                                    href="{{ route('client.product.details', $product->id) }}">
                                                    @php
                                                        $imagePath = $product->productImages->isNotEmpty() ? asset($product->productImages->first()->image_path) : asset('path_to_default_image/default_image.jpg');
                                                    @endphp
                                                    <img src="{{ $imagePath }}" alt="Product Image"
                                                        class="product-image-1 w-100 img-fluid"
                                                        style="max-width: 175px; max-height: 175px; min-width: 175px; min-height: 175px;">
                                                </a>
                                            </div>

                                            {{-- Product Content --}}
                                            <div class="product-content">

                                                {{-- Rating --}}
                                                @if ($product->productReviews && $product->productReviews->isNotEmpty())
                                                    <div class="product-rating mb-3">
                                                        @php
                                                            $averageRating = $product->productReviews->avg('rating');
                                                            $fullStars = floor($averageRating);
                                                            $hasHalfStar = $averageRating - $fullStars >= 0.5;
                                                        @endphp

                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $fullStars)
                                                                <i class="fa-solid fa-star"></i>
                                                            @elseif ($hasHalfStar)
                                                                <i class="fa-solid fa-star-half-stroke"></i>
                                                                @php $hasHalfStar = false; @endphp
                                                            @else
                                                                <i class="fa fa-star-o"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                @else
                                                    <div class="product-rating mb-3">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <i class="fa-regular fa-star"></i>
                                                        @endfor
                                                    </div>
                                                @endif

                                                {{-- Title --}}
                                                <div class="product-title">
                                                    <h4 class="title-2"><a
                                                            href="{{ route('client.product.details', $product->id) }}">{{ $product->name }}</a>
                                                    </h4>
                                                </div>

                                                {{-- Price --}}
                                                <div class="price-box">
                                                    <span
                                                        class="regular-price">${{ $product->product_details->price }}</span>
                                                </div>
                                            </div>

                                            {{-- Add Action --}}
                                            <div class="add-action d-flex position-absolute">
                                                <a href="cart.html" title="Add To cart"><i class="ion-bag"></i></a>
                                                <a href="wishlist.html" title="Add To Wishlist"><i
                                                        class="ion-ios-heart-outline"></i></a>
                                            </div>

                                            {{-- Product Content Listview --}}
                                            <div class="product-content-listview">

                                                {{-- Rating --}}
                                                <div class="product-rating">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $averageRating)
                                                            <i class="fa fa-star"></i>
                                                        @elseif ($i - $averageRating < 0.5)
                                                            <i class="fa fa-star-half-o"></i>
                                                        @else
                                                            <i class="fa fa-star-o"></i>
                                                        @endif
                                                    @endfor
                                                </div>

                                                {{-- Title --}}
                                                <div class="product-title">
                                                    <h4 class="title-2"><a
                                                            href="{{ route('client.product.details', $product->id) }}">{{ $product->name }}</a>
                                                    </h4>
                                                </div>

                                                {{-- Price --}}
                                                <div class="price-box">
                                                    <span
                                                        class="regular-price">${{ $product->product_details->price }}</span>
                                                </div>

                                                {{-- Action --}}
                                                <div class="add-action-listview d-flex">
                                                    <a href="cart.html" title="Add To cart"><i class="ion-bag"></i></a>
                                                    <a href="wishlist.html" title="Add To Wishlist"><i
                                                            class="ion-ios-heart-outline"></i></a>
                                                </div>

                                                {{-- Description --}}
                                                <p class="desc-content">{{ $product->product_details->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                                {{-- end products  --}}
                            </div>


                            {{-- Pagination --}}
                            <div class="row">
                                <div class="col-sm-12 col-custom">
                                    <div class="toolbar-bottom mt-30">
                                        <nav class="pagination pagination-wrap mb-10 mb-sm-0">
                                            <ul class="pagination">
                                                {{-- Previous Page Link --}}
                                                @if ($productsByCategory->onFirstPage())
                                                    <li class="disabled prev">
                                                        <i class="ion-ios-arrow-thin-left"></i>
                                                    </li>
                                                @else
                                                    <li class="prev">
                                                        <a href="{{ $productsByCategory->previousPageUrl() }}"
                                                            rel="prev" title="Previous >>">
                                                            <i class="ion-ios-arrow-thin-left"></i>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- Pagination Elements --}}
                                                @foreach ($productsByCategory as $page => $url)
                                                    @if ($page == $productsByCategory->currentPage())
                                                        <li class="active"><a>{{ $page }}</a></li>
                                                    @else
                                                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                                                    @endif
                                                @endforeach

                                                {{-- Next Page Link --}}
                                                @if ($productsByCategory->hasMorePages())
                                                    <li class="next">
                                                        <a href="{{ $productsByCategory->nextPageUrl() }}" rel="next"
                                                            title="Next >>">
                                                            <i class="ion-ios-arrow-thin-right"></i>
                                                        </a>
                                                    </li>
                                                @else
                                                    <li class="disabled next">
                                                        <i class="ion-ios-arrow-thin-right"></i>
                                                    </li>
                                                @endif
                                            </ul>
                                        </nav>
                                        <p class="desc-content text-center text-sm-right">
                                            Showing {{ $productsByCategory->firstItem() }} -
                                            {{ $productsByCategory->lastItem() }} of
                                            {{ $productsByCategory->total() }} results
                                        </p>
                                    </div>
                                </div>
                            </div>



                        </div>


                        {{-- sidebar  --}}
                        <div class="col-lg-3 col-12 col-custom">


                            <!-- Sidebar Widget Start -->
                            <aside class="sidebar_widget widget-mt">
                                <div class="widget_inner">


                                    {{-- search --}}
                                    @include('client.pages.products.search')


                                    {{-- Menu Categories --}}
                                    @include('client.pages.categories.menu')


                                    {{-- Recent Products --}}
                                    @include('client.pages.products.recent')


                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>



        </div>

        <!-- Modal Area Start Here -->
        @include('client.components.modal')
        <!-- Modal Area End Here -->

        <!-- Scroll to Top Start -->
        <a class="scroll-to-top" href="#">
            <i class="ion-chevron-up"></i>
        </a>

    </body>
@endsection
