@extends('layouts.main')

@section('content')
    <section class="main_content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main_section_inner">
                        <h1>
                            User Registration
                        </h1>

                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">User Name</label>
                                <input type="text" class="form-control" name="name">

                                {{-- error --}}
                                @error('name')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">User email</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">User password</label>
                                <input type="text" class="form-control" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection