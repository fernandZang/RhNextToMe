@extends('administrateur.layouts.backend-dashboard.app')
@section('title', 'RHNextToMe')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (\Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('success') }}
                </div>
            @elseif (\Session::has('warning'))
                <div class="alert alert-warning alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('warning') }}
                </div>
            @elseif (\Session::has('danger'))
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('danger') }}
                </div>
            @endif
            <div style="height:60vh;" class="row align-items-center">

                <center>

                    PAGE ACCUEIL
                </center>

            </div>
        </div>
    </div>
@endsection
