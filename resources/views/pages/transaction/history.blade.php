@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 text-center">
                    <h1></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('agentIndex') }}">@lang('cruds.user.title')</a></li>
                        <li class="breadcrumb-item active">@lang('global.add')</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <h3 class="profile-username text-center">Agent: {{$agent->firstname}} {{$agent->lastname}}</h3>
                         <form method="post" action="{{route('transactionCreate')}}">
                             @csrf
                             <div class="form-group">
                                 <label for="inputName">Summa</label>
                                 <input type="number" name="price" class="form-control {{ $errors->has('price') ? "is-invalid":"" }}" value="{{ old('price') }}" >
                                 @if($errors->has('price'))
                                     <span class="error invalid-feedback">{{ $errors->first('price') }}</span>
                                 @endif
                             </div>
                             <div class="form-group">
                                 <label for="inputName">Komment</label>
                                 <input name="comment" type="text" id="inputName" class="form-control">
                             </div>
                             <input name="agent_id" type="hidden" value="{{$agent->id}}">
                             <button type="submit" class="btn btn-success">Jo'natish</button>
                         </form>
                        </div>

                    </div>
                    <div class="card card-danger card-outline">
                        <div class="card-body box-profile">
                            <form method="post" action="{{route('historyDelete',$agent->id)}}">
                                @csrf
                                <button onclick="if (confirm('Вы уверены?')) { this.form.submit() } " type="button" class="my-5 btn btn-warning">Malumotni tozalash   <i class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>

                    </div>


                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Malumotlar</h4>
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap mb-0">
                                    <thead class="table-light">
                                    <tr>

                                        <th class="align-middle">Order ID</th>
                                        <th class="align-middle">Kun</th>
                                        <th class="align-middle">Turi</th>
                                        <th class="align-middle">Soni</th>
                                        <th class="align-middle">Umumiy summa</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($agent->clients as $client)

                                        <tr>
                                            <td><a href="javascript: void(0);" class="text-body fw-bold">#{{$client->id}}</a> </td>
                                            <td>{{$client->created_at->format('y-m-d')}}</td>
                                            <td>{{$client->category->name}}</td>
                                            <td>
                                                {{$client->count}}
                                            </td>
                                            <td>
                                                <span class="badge badge-success"> {{price_format($client->count*$client->category->price)}}</span>
                                            </td>
                                        </tr>

                                    @endforeach()
                                    <tr >
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td  >
                                            Tushgan summa
                                        </td>
                                        <td>
                                            <span class="badge badge-primary"> {{price_format($sum)}}</span>

                                        </td>
                                    </tr>
                                    <tr >
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td  >
                                            Berilgan summa
                                        </td>
                                        <td>
                                            <span class="badge badge-danger"> {{price_format($transactions_sum)}}</span>

                                        </td>
                                    <tr >
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td  >
                                            Agentga berilishi kerak bo'lgan summa
                                        </td>
                                        <td>
                                            <span class="badge badge-warning"> {{price_format($sum-$transactions_sum)}}</span>

                                        </td>
                                    </tr>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="row justify-content-end mt-2">
                                <div class="col-sm-3">
                                    <div class="">
                                        <form class="mx-2" method="post" action="{{route('agentDestroy',$agent->id)}}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button onclick="if (confirm('Вы уверены?')) { this.form.submit() } " type="button" class="btn btn-danger w-md">Agenti O'chirish</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                            <!-- end table-responsive -->
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="table-responsive">
                    <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                        <tr style="cursor: pointer;">
                            <th>ID</th>
                            <th>Agent</th>
                            <th>Summa</th>
                            <th>Komment</th>
                            <th>Yaratilgan sana</th>
                            <th>Amallar</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($transactions as $transaction)
                            <tr data-id="2" style="cursor: pointer;">
                                <td>#{{$transaction->id}}</td>
                                <td>{{$transaction->agent->firstname}}</td>
                                <td>
                                    <span class="badge badge-success">{{price_format($transaction->price)}}</span>

                                </td>
                                <td>
                                    {{$transaction->comment}}
                                </td>
                                <td >{{$transaction->created_at->format('y-m-d')}}</td>

                                <td>
                                    @can('transaction.delete')
                                        <form method="post" action="{{route('transactionDestroy',$transaction->id)}}">
                                            @csrf
                                            @can('transaction.edit')
                                                <a href="{{ route('transactionEdit',$transaction->id) }}" class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            @endcan
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="button" onclick="if (confirm('Вы уверены?')) { this.form.submit() }" class="btn btn-outline-danger btn-sm edit" title="Delete">
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
                <ul class="pagination pagination-rounded justify-content-end mb-2">
                    {!! $transactions->links() !!}
                </ul>
            </div>
            </div>


        </div>
    </section>

@endsection
