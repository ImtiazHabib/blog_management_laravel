@extends('layouts.main')

@section('content')
    <section class="main_content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main_section_inner">
                        <h1>
                            Add New Post
                        </h1>
                        <form  action="{{ route('create_post') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label  class="form-label">Post Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="mb-3">
                                <label  class="form-label">Post description</label>
                                <input type="text" class="form-control" name="description">
                            </div>
                            <div class="mb-3">
                                <label  class="form-label">Post  Date</label>
                                <input type="date" class="form-control" name="date">
                            </div>
                            {{-- login user will id here  --}}

                               @if(Auth::check())
       <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
   @else
       <p>Please log in to create a post.</p>
   @endif

                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection