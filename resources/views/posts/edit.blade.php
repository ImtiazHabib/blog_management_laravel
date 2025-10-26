@extends('layouts.main')

@section('content')
    <section class="main_content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main_section_inner">
                        <h1>
                           Edit  Post
                        </h1>
                        @foreach ($posts as $post )
                             <form action="{{ route('update_post') }}" method="POST">
                                @csrf
                            <div class="mb-3">
                                <label  class="form-label">Post Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $post->name }}">
                            </div>
                            <div class="mb-3">
                                <label  class="form-label">Post description</label>
                                <input type="text" class="form-control" name="description" value="{{ $post->description }}">
                            </div>
                            <div class="mb-3">
                                <label  class="form-label">Post  Date</label>
                                <input type="date" class="form-control" name="date" value="{{ $post->date }}">
                            </div>
                            {{-- login user will id here  --}}
                             <input type="hidden"  name="post_id" value="{{ $post->id }}">
                            <button type="submit" class="btn btn-primary">edit</button>
                        </form>
                        @endforeach
                       
                    </div>
                </div>
            </div>
        </div>
@endsection