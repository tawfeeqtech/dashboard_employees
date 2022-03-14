@extends('layouts.main')

@section('content')
    <h1 class="mt-4">Department</h1>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Update Department') }}
                    <a href="{{route('departments.index')}}" class="float-end">Back</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('departments.update',$department->id) }}">
                        @csrf
                        @method('PUT')


                        <div class="row mb-3">
                            <label for="name"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                       class="form-control @error('name') is-invalid @enderror" name="name"
                                       value="{{ old('name',$department->name) }}" required>

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
                                    {{ __('Update Department') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

