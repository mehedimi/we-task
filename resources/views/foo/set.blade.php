@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 offset-md-2">
            @if(session()->has('message'))
                <div class="alert alert-warning">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-body">
                    <form action="{!! route('foo.store') !!}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="foo">Set Foo</label>
                            <input type="text" class="form-control {!! $errors->has('set_foo') ? ' is-invalid' :'' !!}" name="set_foo" id="foo">
                            @error('set_foo')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary">Set Foo</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
