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


                                {{-- sort products --}}
                                @include('client.pages.categories.sort')

                            </div>


                            <!-- Shop Wrapper Start -->
                            <div class="row shop_wrapper grid_list">

                                {{-- products  --}}
                                @foreach ($sortedProducts as $product)
                                    <div class="col-12 col-custom product-area">
                                        <div class="single-product position-relative">

                                            {{-- Image --}}
                                            <div class="product-image">
                                                <a class="d-block"
                                                    href="{{ route('client.product.details', $product->title) }}">
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
                                                                <i class="fa-regular fa-star"></i>
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
                                                            href="{{ route('client.product.details', $product->title) }}">{{ $product->name }}</a>
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
                                                <a href="{{ route('client.product.details', $product->title) }}"
                                                    title="Details"><i class="fa-solid fa-circle-info"></i></a>
                                            </div>

                                            {{-- Product Content Listview --}}
                                            <div class="product-content-listview">

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
                                                                <i class="fa-regular fa-star"></i>
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
                                                            href="{{ route('client.product.details', $product->title) }}">{{ $product->name }}</a>
                                                    </h4>
                                                </div>

                                                {{-- Price --}}
                                                <div class="price-box">
                                                    <span
                                                        class="regular-price">${{ $product->product_details->price }}</span>
                                                </div>

                                                {{-- Action --}}
                                                <div class="add-action-listview d-flex">
                                                    <a href="{{ route('client.product.details', $product->title) }}"
                                                        title="Details"><i class="fa-solid fa-circle-info"></i></a>
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
                                                {{ $products->links('vendor.pagination.bootstrap-5') }}
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- sidebar  --}}
                        <div class="col-lg-3 col-12 col-custom">


                            <!-- Sidebar Widget Start -->
                            <aside class="sidebar_widget widget-mt">
                                <div class="widget_inner">

                                    {{-- Search Box --}}
                                    @include('client.pages.products.search')


                                    {{-- Menu Categories --}}
                                    @include('client.pages.categories.menu')


                                    {{-- Recent Products --}}
                                    @include('client.pages.products.recent')


                                </div>
                            </aside>
                            <!-- Sidebar Widget End -->
                        </div>


                    </div>
                </div>
            </div>



        </div>

        <!-- Modal Area Start Here -->
        @include('client.components.modal')
        <!-- Modal Area End Here -->


        {{-- info icon --}}
        <script>
            document.getElementById('addToCartLink').addEventListener('click', function() {
                document.getElementById('addToCartForm').submit();
            });
        </script>


        {{-- sort --}}
        <script>
            $(document).ready(function() {
                $('#sortSelect').change(function() {
                    $.ajax({
                        type: 'GET',
                        url: $('#sortForm').attr('action'),
                        data: $('#sortForm').serialize(),
                        success: function(response) {
                            console.log(response);
                        },
                        error: function(error) {
                            console.error('Error:', error);
                        }
                    });
                });
            });
        </script>


    </body>
@endsection
