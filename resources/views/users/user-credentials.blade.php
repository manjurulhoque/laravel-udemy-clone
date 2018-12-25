@extends('layouts.app')

@section('content')

    <section class="user-dashboard-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="user-dashboard-box">
                        <div class="user-dashboard-sidebar">
                            <div class="user-box">
                                <img src="{{ asset('/images/'. auth()->user()->photo) }}" alt="" class="img-fluid">
                                <div class="name">
                                    <div class="name">{{ auth()->user()->first_name .' '. auth()->user()->last_name }}</div>
                                </div>
                            </div>
                            <div class="user-dashboard-menu">
                                <ul>
                                    <li>
                                        <a href="{{ route('user.profile') }}">Profile</a>
                                    </li>
                                    <li class="active">
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
                                <div class="title">Account</div>
                                <div class="subtitle">Edit your account settings.</div>
                            </div>
                            <form action="{{ route('user.credentials.update') }}" method="post">
                                @csrf
                                <div class="content-box">
                                    <div class="email-group">
                                        <div class="form-group">
                                            <label for="email">E-mail:</label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                   placeholder="email"
                                                   value="{{ auth()->user()->email }}">
                                        </div>
                                    </div>
                                    <div class="password-group">
                                        <div class="form-group">
                                            <label for="password">Password:</label>
                                            <input type="password" class="form-control" id="current_password"
                                                   name="current_password"
                                                   placeholder="Enter current password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="new_password"
                                                   placeholder="Enter new password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="confirm_new_password"
                                                   placeholder="Confirm your password">
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