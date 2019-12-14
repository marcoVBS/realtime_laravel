@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-9">
                <chat-component></chat-component>
            </div>
            <div class="col-3">
                <users-component></users-component>
            </div>
        </div>
    </div>
@endsection