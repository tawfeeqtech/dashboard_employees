@extends('layouts.main')

@section('content')
    <h1 class="mt-4">Cities</h1>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Update City') }}
                    <a href="{{route('cities.index')}}" class="float-end">Back</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('cities.update',$city->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="country_code" class="col-md-4 col-form-label text-md-end">{{ __('State Name') }}</label>

                            <div class="col-md-6">
                                <select name="state_id" class="form-select form-control" aria-label="State Name">
                                    <option selected>Select State Name</option>
                                    @foreach($states as $state)
                                        <option value="{{$state->id}}" {{$state->id === $city->state_id ? 'selected' : ''}}>{{$state->name}}</option>
                                    @endforeach
                                </select>


                                @error('country_code')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                       class="form-control @error('name') is-invalid @enderror" name="name"
                                       value="{{ old('name',$city->name) }}" required>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update City') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

