@extends('layouts.main')

@section('content')
    <h1 class="mt-4">Cities</h1>
    <div class="row mt-4">
        <div class="col-lg-12">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
            @endif
            <div class="card mb-4 mx-auto">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <form action="{{route('cities.index')}}" class="row align-items-center">
                                <div class="col-sm-6">
                                    <input type="text" name="search" class="form-control" id="autoSizingInput"
                                           placeholder="search by name">
                                </div>

                                <div class="col-auto">
                                    <button type="submit" class="btn btn-outline-dark">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="col">
                            <a href="{{route('cities.create')}}" class="btn btn-primary float-end">Create</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered  table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#Id</th>
                            <th scope="col">State Name</th>
                            <th scope="col">Name</th>
                            <th scope="col">Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($cities) < 1)
                            <tr>
                                <td class="text-center table-danger" colspan="5">no data</td>
                            </tr>
                        @else
                            @foreach($cities as $city)
                                <tr>
                                    <th scope="row">{{$city->id}}</th>
                                    <td>{{$city->state->name}}</td>
                                    <td>{{$city->name}}</td>
                                    <td>
                                        <a href="{{route('cities.edit',$city->id)}}"
                                           class="btn btn-success">Edit</a>

                                        <form style="display: inline" method="POST"
                                              action="{{route('cities.destroy',$city->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

