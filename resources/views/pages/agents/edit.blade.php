@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 text-center">
                    <h1>Agent tahrirlash</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('userIndex') }}">@lang('cruds.user.title')</a></li>
                        <li class="breadcrumb-item active">@lang('global.edit')</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">@lang('global.edit')</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('agentUpdate',$agent->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Ism</label>
                                <input type="text" name="firstname" class="form-control {{ $errors->has('firstname') ? "is-invalid":"" }}" value="{{ old('firstname',$agent->firstname) }}" >
                                @if($errors->has('firstname'))
                                    <span class="error invalid-feedback">{{ $errors->first('firstname') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Familya</label>
                                <input type="text" name="lastname" class="form-control {{ $errors->has('lastname') ? "is-invalid":"" }}" value="{{ old('lastname',$agent->lastname) }}" >
                                @if($errors->has('lastname'))
                                    <span class="error invalid-feedback">{{ $errors->first('lastname') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Telefon</label>
                                <input type="number" name="phone" class="form-control {{ $errors->has('phone') ? "is-invalid":"" }}" value="{{ old('phone',$agent->phone) }}" >
                                @if($errors->has('phone'))
                                    <span class="error invalid-feedback">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Promo kod</label>
                                <input type="number" name="promo_cod" class="form-control {{ $errors->has('promo_cod') ? "is-invalid":"" }}" value="{{ old('promo_cod',$agent->promo_cod) }}" >
                                @if($errors->has('promo_cod'))
                                    <span class="error invalid-feedback">{{ $errors->first('promo_cod') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">@lang('global.save')</button>
                                <a href="{{ route('agentIndex') }}" class="btn btn-default float-left">@lang('global.cancel')</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
