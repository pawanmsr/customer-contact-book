@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Contacts</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{$message}}</p>
                    </div>
                    @endif

                    <div>
                        <a href="{{route('admincontactsadd')}}" class="btn btn-primary">Add</a>
                    </div>

                    <div class="scrollit">
                    <table class="user-table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Pin</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                            <tr>
                                <td class="td-hover">{{ $row->user }}</td>
                                <td class="td-hover">{{ $row->name }}</td>
                                <td class="td-hover">{{ $row->email }}</td>
                                <td class="td-hover">{{ $row->phone }}</td>
                                <td class="td-hover">{{ $row->address }}</td>
                                <td class="td-hover">{{ $row->pin }}</td>
                                <td><a class="btn btn-warning" href="{{ action('AdminController@editcontact', $row->id) }}">Edit</a></td>
                                <td>
                                    <form method="POST" action="{{ action('AdminController@removecontact', $row->id) }}" class="remove">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="method", value="DELETE" />
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>

                    {!! $data->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
