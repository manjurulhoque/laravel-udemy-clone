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
                                    <li class="active">
                                        <a href="{{ route('user.profile') }}">Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.credentials') }}">Account</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.photo') }}">Photo</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="user-dashboard-content">
                            <div class="content-title-box">
                                <div class="title">Profile</div>
                                <div class="subtitle">Add information about yourself to share on your profile.
                                </div>
                            </div>
                            <form action="{{ route('user.profile.update') }}" method="post">
                                @csrf
                                <div class="content-box">
                                    <div class="basic-group">
                                        <div class="form-group">
                                            <label for="FristName">Basics:</label>
                                            <input type="text" class="form-control" name="first_name" id="FristName"
                                                   placeholder="first name" value="{{ auth()->user()->first_name }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="last_name"
                                                   placeholder="last name" value="{{ auth()->user()->last_name }}">
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