@extends('admin.layouts.master-admin')
@section('content-admin')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Users</h4>
            </div>
        </div>
    </div>

    <caption>
        <div class="app-search dropdown d-none d-lg-block mb-3 mt-3">
            <form>
                <div class="input-group">
                    <input type="search" name="q" class="form-control dropdown-toggle" placeholder="Search..." id="top-search">
                    <span class="mdi mdi-magnify search-icon"></span>
                    <div class="input-group-append">
                        <button class="btn" style="background-color: #f0efea" type="submit">Search</button>
                    </div>
                </div>

            </form>
        </div>
    </caption>




    <table class="table table-centered table-striped mb-0 text-center" style="max-width: 100%;
    overflow-x: auto;
    display: block;">
        <thead class="thead" style="background-color: #f0efea">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Level</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>

        @foreach($users as $user)
            <tr>
                <td>{{ $user->id}}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                @if( $user->level ===0)
                <td>Admin</td>
                @else <td>User</td>
                @endif
                <td>
                    <form action="{{ route('users.edit', $user) }}" method="GET">
                        @method('Edit')
                        <button class="btn btn-outline-info">Edit</button>
                    </form>
                </td>


                <td>
                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                        @csrf
                        @method('Delete')
                        <button class="btn btn-outline-danger">Delete</button>
                    </form>
                </td>


            </tr>
        @endforeach
    </table>

    <nav>
        <ul class="pagination pagination-rounded mb-0">
            {{$users->links()}}
        </ul>
    </nav>

@endsection
