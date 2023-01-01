@extends('layouts.master')
@section('title','View Posts')
@section('content')
<div class="container-fluid px-4">
    <div class="card  mt-4">
        <div class="card-header">
            <h4>View Posts
                <a href="{{url('admin/add-post')}}" class="btn btn-primary float-end">Add Post</a>
            </h4>
        </div>
        <div class="card-body">
            @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Post Name</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->category->name}}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->status == '1' ? 'Hidden': 'shown'}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection