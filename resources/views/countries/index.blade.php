@extends('layouts.main')

@section('content')
    <h1 class="mt-4">Countries</h1>
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
                            <form action="{{route('countries.index')}}" class="row align-items-center">
                                <div class="col-sm-6">
                                    <input type="text" name="search" class="form-control" id="autoSizingInput"
                                           placeholder="search by username or email">
                                </div>

                                <div class="col-auto">
                                    <button type="submit" class="btn btn-outline-dark">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="col">
                            <a href="{{route('countries.create')}}" class="btn btn-primary float-end">Create</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered  table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#Id</th>
                            <th scope="col">Country Code</th>
                            <th scope="col">Name</th>
                            <th scope="col">Manage</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($countries as $country)
                            <tr>
                                <th scope="row">{{$country->id}}</th>
                                <td>{{$country->country_code}}</td>
                                <td>{{$country->name}}</td>
                                <td>
                                    <a href="{{route('countries.edit',$country->id)}}"
                                       class="btn btn-success">Edit</a>

                                    <form style="display: inline" method="POST"
                                          action="{{route('countries.destroy',$country->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center table-danger" colspan="4">no data</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                    {{ $countries->links() }}

                </div>
            </div>
        </div>
    </div>
@endsection

