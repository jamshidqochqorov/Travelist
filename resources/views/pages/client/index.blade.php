@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Klentlar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                        <li class="breadcrumb-item active">Kategorya</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Klient</h3>
                        @can('category.add')
                            <a href="{{ route('clientAdd') }}" class="btn btn-success btn-sm float-right">
                                <span class="fas fa-plus-circle"></span>
                                @lang('global.add')
                            </a>
                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- Data table -->
                        <table id="dataTable" class="text-center table table-bordered table-striped dataTable dtr-inline table-responsive-lg" user="grid" aria-describedby="dataTable_info">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Agent</th>
                                <th>Kategorya</th>
                                <th>Soni</th>
                                <th>Jammi summa</th>
                                <th>Yaratilgan sana</th>
                                <th class="w-25">@lang('global.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $client)
                                <tr data-id="2" style="cursor: pointer;">
                                    <td>#{{$client->id}}</td>
                                    <td>{{$client->agent->firstname}}</td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-rounded waves-effect waves-light">  {{$client->category->name}}</button>

                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-rounded waves-effect waves-light">  {{$client->count}}</button>

                                    </td>
                                    <td>
                                        {{price_format($client->count*$client->category->price)}}
                                    </td>
                                    <td >{{$client->created_at->format('y-m-d')}}</td>

                                    <td>
                                        @can('client.delete')
                                            <form method="post" action="{{route('clientDestroy',$client->id)}}">
                                                @csrf
                                                @can('client.edit')
                                                    <a href="{{ route('clientEdit',$client->id) }}" class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                @endcan
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="button"  onclick="if (confirm('Вы уверены?')) { this.form.submit() } " class="btn btn-outline-danger btn-sm edit" title="Delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>

                                        @endcan()
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
