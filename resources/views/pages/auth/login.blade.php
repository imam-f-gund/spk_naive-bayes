@extends('layouts.auth')

@section('title', 'Login')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
    <style>
        .card-header-new {
            color: #6777ef !important;
            display: block !important;
        }

        #up {
            margin-top: 25vh;
        }
    </style>
@endpush

@section('main')
    <div class="card card-primary" id="up">
        <div class="card-header-new">
            <h5 class="text-center mt-3">
                Sistem Pedukung Keputusan
                <p>
                    <small>Penentuan Kualitas Jagung</small>
                </p>
            </h5>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ url('login') }}" method="POST" class="needs-validation" novalidate="">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="username" class="form-control" name="username" tabindex="1" required
                        autofocus>
                    <div class="invalid-feedback">
                        Please fill in your username
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Password</label>

                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                        please fill in your password
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- <div class="text-muted mt-5 text-center">
        Don't have an account? <a href="auth-register.html">Create One</a>
    </div> --}}
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
