@extends('layouts.main')

@section('content')
    <section class="main_content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main_section_inner">
                        <table class="table table-striped">

                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">date</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            @foreach ($posts as $post)
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{  $post->name }}</td>
                                        <td>{{  $post->description }}</td>
                                        <td>{{  $post->date }}</td>
                                        <td>{{  $post->user->name }}</td>
                                        <td>
                                            <form action="{{ route('edit_post', $post->id) }}" method="GET">
                                                @csrf
                                                <button type="submit" class="btn btn-success">Edit</button>
                                            </form>

                                            <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $post->id }}">
                                        Delete
                                    </button>
                                        </td>
                                    </tr>

                                    

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete {{ $post->name }}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>

                                                     <form action="{{ route('delete_post', $post->id) }}" method="GET">
                                                     @csrf   
                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </tbody>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection