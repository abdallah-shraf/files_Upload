@extends('layouts.app')

@section('content')

    @if (Session::has('done'))

        <div class="alert alert-success  alert-dismissible fade show"role="alert">
            <h2>{{Session::get('done')}}</h2>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    @endif

    <h1 class="text-center text-primary">List Files</h1>

    <div class="container col-7">
        <div class="card">
            <div class="card-body">
                <table class="table table-dark text-center">
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th colspan="2 ">Action</th>
                    </tr>
                    @foreach ($files as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->desc}}</td>

                            <td >
                                <a href="{{ route('file.show',$item->id) }}" class="btn btn-link">view </a>
                                <a href="{{ route('file.destroy', $item->id) }}" class="btn btn-danger">Delete</a>
                                <a href="{{ route('file.edit', $item->id) }}" class="btn btn-primary">Update</a>

                            </td>


                        </tr>

                    @endforeach
                </table>
            </div>
        </div>
    </div>


@endsection
