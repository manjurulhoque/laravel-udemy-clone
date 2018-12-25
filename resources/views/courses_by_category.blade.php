@extends('layouts.app')

@section('content')

    <section class="category-header-area">
        <div class="container-lg">
            <div class="row">
                <div class="col">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">
                                    {{ $category->title }}
                                </a>
                            </li>
                        </ol>
                    </nav>
                    <h1 class="category-name">
                        {{ $category->title }}
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <section class="category-course-list-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="category-filter-box filter-box clearfix">
                        <a href="" class="btn btn-outline-secondary all-btn">All</a>

                        <div class="btn-group category-list">
                            <a class="btn btn-outline-secondary dropdown-toggle" href="#" data-toggle="dropdown">
                                Category List
                            </a>
                            <div class="dropdown-menu">
                                @foreach(\App\Category::all() as $category)
                                    <a class="dropdown-item" href="{{ route('courses_by_category', $category) }}">
                                        {{ $category->title }}
                                    </a>
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <div class="category-course-list">
                        <ul>
                            @foreach($courses as $course)
                                <li>
                                    <div class="course-box-2">
                                        <div class="course-image">
                                            <a href="{{ route('course_detail', $course) }}">
                                                <img src="{{ asset('images/learning.jpg') }}" alt="" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="course-details">
                                            <a href="{{ route('course_detail', $course) }}" class="course-title">{{ $course->title }}</a>
                                            {{--<a href="" class="course-instructor">--}}
                                                {{--<span class="instructor-name">first_name last_name</span>--}}
                                                {{-----}}
                                            {{--</a>--}}
                                            <div class="course-subtitle">
                                                {{ $course->short_description }}
                                            </div>
                                            <div class="course-meta">
                                                <span class="">
                                                    <i class="fas fa-play-circle"></i>
                                                    {{ $course->lessons->count() }} Lessons
                                                </span>
                                                <span class="">
                                                    <i class="far fa-clock"></i>
                                                    3 hours
                                                </span>
                                                <span class="">
                                                    <i class="fas fa-closed-captioning"></i>English
                                                </span>
                                            </div>
                                        </div>
                                        <div class="course-price-rating">
                                            <div class="course-price">
                                                <span class="current-price">${{ $course->price }}</span>
                                                {{--<span class="original-price">$300</span>--}}
                                            </div>
                                            <div class="rating">
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star"></i>
                                                <span class="d-inline-block average-rating">5</span>
                                            </div>
                                            <div class="rating-number">
                                                {{ $course->reviews->count() }} Ratings
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <nav>
                        {{--pagination--}}
                        {{ $courses->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </section>

@endsection