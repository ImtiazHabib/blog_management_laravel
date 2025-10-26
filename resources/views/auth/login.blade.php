@extends('layouts.main')

@section('content')
    <section class="main_content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main_section_inner">

                        @session('success')
                         <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                        @endsession
                        <h1>
                            User Login
                        </h1>

                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label  class="form-label">User email</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="mb-3">
                                <label  class="form-label">User password</label>
                                <input type="text" class="form-control" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection