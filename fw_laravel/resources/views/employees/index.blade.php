@extends('layouts.app')

@section('content')

    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Data Employees</div>

                <div class="panel-body">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <p>
                        <a href="{{ route('employees.create') }}" class="btn btn-primary">Tambah Data</a>
                    </p>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Company</th>
                                <th>Email</th>
                                <th width="280px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($employees as $employ)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $employ->name }}</td>
                                    <td>{{ isset($employ->companies) ? $employ->companies->name : '-' }}</td>
                                    <td>{{ $employ->email }}</td>
                                    <td>
                                        <form action="{{ route('employees.destroy',$employ->id) }}" method="POST">

                                            <a class="btn btn-primary" href="{{ route('employees.show',$employ->id) }}">Show</a>
                                            <a class="btn btn-primary" href="{{ route('employees.edit',$employ->id) }}">Edit</a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $employees->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection