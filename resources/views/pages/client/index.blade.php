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
                                <th>Nomi</th>
                                <th>Narhi</th>
                                <th class="w-25">@lang('global.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
{{--                            @foreach($categories as $category)--}}
{{--                                <tr>--}}
{{--                                    <td>{{ $category->id }}</td>--}}
{{--                                    <td>{{ $category->name }}  </td>--}}
{{--                                    <td>  <span class="badge badge-primary">{{ number_format($category->price) }} </span></td>--}}

{{--                                    <td class="text-center">--}}
{{--                                        @can('category.delete')--}}
{{--                                            <form action="{{ route('categoryDestroy',$category->id) }}" method="post">--}}
{{--                                                @csrf--}}
{{--                                                <div class="btn-group">--}}
{{--                                                    @can('category.edit')--}}
{{--                                                        <a href="{{ route('categoryEdit',$category->id) }}" type="button" class="btn btn-info btn-sm"> @lang('global.edit')</a>--}}
{{--                                                    @endcan--}}
{{--                                                    <input name="_method" type="hidden" value="DELETE">--}}
{{--                                                    <button type="button" class="btn btn-danger btn-sm" onclick="if (confirm('Вы уверены?')) { this.form.submit() } "> @lang('global.delete')</button>--}}
{{--                                                </div>--}}
{{--                                            </form>--}}
{{--                                        @endcan--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
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
