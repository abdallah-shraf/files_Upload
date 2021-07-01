@extends('layouts.app')

@section('content')

<div class="container col-4">
    <img src="https://th.bing.com/th/id/R054a0884763527a077e6e918dbfb6f18?rik=sAyX%2fP550DEV9g&riu=http%3a%2f%2fbrandsterprint.com%2fwp-content%2fuploads%2f2019%2f06%2ffolders.png&ehk=emLsWVbIcbnYoODjtrbEEkhAHZR563YfwM36Beb9odI%3d&risl=&pid=ImgRaw" alt="file" class="card-img-top">
    <div class="card">
        <div class="card-body">


            <h3>File Title : {{$file->title }}</h3>
            <h3>File Descrption : {{$file->desc }}</h3>
            <h3>File Name : {{$file->file }}</h3>

            <a href="{{ route('file.download', $file->id) }}"  class="btn btn-primary btn-block">Download</a>

        </div>
    </div>
</div>


@endsection
