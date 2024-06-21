@extends('admin.admin_basic')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">About</h3>
                        <div class="card-tools">
                            <a href="{{ route('create_setting') }}" class="btn btn-primary">Add setting</a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        @if($settings)
                            <table id="about" class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Value</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($settings as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td class="td-info">{{ $item->value }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td><a class="btn btn-outline-warning" href="{{ route('edit_setting', $item->id) }}">Edit</a></td>
                                        <td>
                                            <form action="{{ route('destroy_setting', $item) }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <button class="btn btn-outline-danger" onclick="return confirm('Are you sure?')" title="Delete">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="text-center"><h5> no data </h5></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
