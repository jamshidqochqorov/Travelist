@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 text-center">
                    <h1>Klent Tahrirlash</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('clientIndex') }}">Kleient</a></li>
                        <li class="breadcrumb-item active">@lang('global.add')</li>
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
                        <h3 class="card-title">@lang('global.add')</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('clientUpdate',$client->id  ) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Promo Kod</label>
                                <select name="agent_id" class="select2" style="width: 100%;" >
                                    @foreach($agents as $agent)
                                        <option value="{{ $agent->id }}" {{$agent->id==$client->agent_id?'selected':''}}>{{ $agent->promo_cod }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('agent_id'))
                                    <span class="error invalid-feedback">{{ $errors->first('agent_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Kategorya</label>
                                <select name="category_id" class="select2" style="width: 100%;" >
                                    @foreach($categories as $category)
                                        <option {{$category->id == $client->category_id?"selected":''}} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('category_id'))
                                    <span class="error invalid-feedback">{{ $errors->first('category_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Soni</label>
                                <input type="number"  name="count" class="form-control {{ $errors->has('count') ? "is-invalid":"" }}" value="{{old('count',$client->count)}}">
                                @if($errors->has('count'))
                                    <span class="error invalid-feedback">{{ $errors->first('count') }}</span>
                                @endif
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">@lang('global.save')</button>
                                <a href="{{ route('clientIndex') }}" class="btn btn-default float-left">@lang('global.cancel')</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
