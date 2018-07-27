@extends('backend.layout.master')

@section('title','World Cup | Country Add')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <section class="content-header">
                            <h1>
                                Edit Admin
                            </h1>
                        </section>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                            </div>
                        @endif
                        <form action="{{ route('admin-update',Auth::user()->id)}}" method="post" >
                            @csrf

                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="name">Email</label>
                                <input type="Email" name="email" value="{{ old('email') }}" class="form-control" autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="name">Password</label>
                                <input type="password" name="password" value="{{old('password')}}" class="form-control" autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>




                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Update Admin</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection