@extends('layouts.app')

@section('content')

    <section class="user-dashboard-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="user-dashboard-box">
                        <div class="user-dashboard-sidebar">
                            <div class="user-box">
                                <img src="{{ asset('/images/'.auth()->user()->photo) }}" alt="" class="img-fluid">
                                <div class="name">
                                    <div class="name">{{ auth()->user()->first_name .' '. auth()->user()->last_name }}</div>
                                </div>
                            </div>
                            <div class="user-dashboard-menu">
                                <ul>
                                    <li>
                                        <a href="{{ route('user.profile') }}">Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.credentials') }}">Account</a>
                                    </li>
                                    <li class="active">
                                        <a href="{{ route('user.photo') }}">Photo</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="user-dashboard-content">
                            <div class="content-title-box">
                                <div class="title">Photo</div>
                                <div class="subtitle">Update your photo.</div>
                            </div>
                            <form action="{{ route('user.photo.update') }}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="content-box">
                                    <div class="email-group">
                                        <div class="form-group">
                                            <label for="user_image">Upload image:</label>
                                            <input type="file" class="form-control" name="user_image" id="user_image">
                                        </div>
                                    </div>
                                </div>
                                <div class="content-update-box">
                                    <button type="submit" class="btn">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection