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

    <h1 class="text-center text-primary  display-3">Add File</h1>


    <div class="container col-6">


            @if ($errors->any())
                <div class="alert alert-danger alert-warning alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif




            <div class="card">
                <div class="card-body">
                    <form action="{{route('file.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group">
                            <label >file Title</label>
                            <input type="text" name="filename" class="form-control">
                        </div>
                        <div class="form-group">
                            <label >file description</label>
                            <textarea name="filedesc" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label >file </label>
                            <input type="file" name="file_input" class="form-control">
                        </div>
                            <input type="hidden" name="User" value="{{ Auth::user()->id}}" class="form-control">
                        <button type="submit" class="btn btn-primary btn-block">Send Data</button>
                     </form>
                </div>
            </div>

    </div>


@endsection

