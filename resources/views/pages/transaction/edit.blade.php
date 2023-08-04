@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>To'lovni tahrirlash</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
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

                        <form action="{{ route('transactionUpdate',$transaction->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Agent</label>
                                <input disabled type="text" name="name" class="form-control" value="{{$transaction->agent->firstname}}">
                                @if($errors->has('name') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Summa</label>
                                <input type="number" name="price" class="form-control" value="{{$transaction->price}}">
                                @if($errors->has('price') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('price') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Komment</label>
                                <input  type="text" name="comment" class="form-control" value="{{$transaction->comment}}">
                                @if($errors->has('comment') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('comment') }}</span>
                                @endif
                                <input type="hidden" name="agent_id" value="{{$transaction->agent->id}}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">@lang('global.save')</button>
                                <a href="{{ route('transactionHistory',$transaction->agent->id) }}" class="btn btn-default float-left">@lang('global.cancel')</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
