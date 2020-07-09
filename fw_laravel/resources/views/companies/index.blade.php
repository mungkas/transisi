@extends('layouts.app')

@section('content')

    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Data Companies</div>

                <div class="panel-body">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <p>
                        <a href="{{ route('companies.create') }}" class="btn btn-primary">Tambah Data</a>
                    </p>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Logo</th>
                                <th width="280px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td>
                                        <img src="{{ asset('storage/'.$company->logo) }}" alt="" title=""  style="width:100px;height:100px;"/>
                                    </td>
                                    <td>
                                        <form action="{{ route('companies.destroy',$company->id) }}" method="POST">

                                            <a class="btn btn-primary" href="{{ route('companies.show',$company->id) }}">Show</a>
                                            <a class="btn btn-primary" href="{{ route('companies.edit',$company->id) }}">Edit</a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $companies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection