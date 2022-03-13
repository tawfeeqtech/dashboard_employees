@extends('layouts.main')

@section('content')
    <h1 class="mt-4">Users</h1>
    <div class="row mt-4">
        <div class="col-lg-12">
            @if(session()->has('message'))
                @if(session('message') === 'error')
                    <div class="alert alert-danger">
                        You are deleting yourself
                    </div>
                @else
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                @endif
            @endif
            <div class="card mb-4 mx-auto">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <form action="{{route('users.index')}}" class="row align-items-center">
                                <div class="col-sm-6">
                                    <input type="text" name="search" class="form-control" id="autoSizingInput" placeholder="search by username or email">
                                </div>

                                <div class="col-auto">
                                    <button type="submit" class="btn btn-outline-dark">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="col">
                            <a href="{{route('users.create')}}" class="btn btn-primary float-end">Create</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered  table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#Id</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-success">Edit</a>

                                    <form style="display: inline" method="POST"
                                          action="{{route('users.destroy',$user->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>

                                    {{--                                    <a href="{{route('users.destroy',$user->id)}}" class="btn btn-danger">Delete</a>--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

