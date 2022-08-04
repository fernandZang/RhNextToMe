@extends('internaute.layouts.backend-dashboard.app')
@section('title','RHNextToMe')

@section('content')
    <div class="container my-auto align-items-center">
        <div class="row justify-content-center content-center mt-5">
            <div class="col-md-12 content-center border-0">
                @if (session('error'))
                    <div class="alert alert-danger">
                            {{ session('error') }}
                    </div>
                @endif
            </div>

            <div class="col-md-8 content-center ">

                <div class="col-md-12 login justify-content-center content-center">
                    @include('auth.login')
                </div>
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function(){

	    });
    </script>

@endsection

