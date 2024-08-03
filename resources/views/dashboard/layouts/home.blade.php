@extends('dashboard.master')

@section('content')

<div class="content" style="background-image: url('{{ asset('resources/assets/img/v2/bg.jpg') }}'); background-repeat:repeat;min-height:100vh">

       <h1 class="text-center"><strong>Main Dashboard</strong></h1>
        <div class="row">

{{--            <div class="col-lg-3 col-sm-6 col-md-6  py-3">--}}
{{--                <div class="card  btn sub-portal mouse_click" onclick="location.href = '{{route('members.index')}}'">--}}
{{--                    <img class="mt-2"--}}
{{--                        src="{{ asset('resources/assets/img/v2/group.png') }}" alt="">--}}
{{--                    <button type="button" class="btn h-100 w-100">Members</button>--}}
{{--                </div>--}}
{{--            </div>--}}
            
        </div>



    </div>

   <footer class="text-center fw-bold bg-light">Version 7.00</footer>



    <style>
        .sub-portal {
            height: 200px;
            box-shadow: 0 3px 5px 0 rgba(124, 124, 124, 0.829);
            transition: transform 0.6s ease;
            background-color: #e1f1ff;
        }
        .card img{
            height: 100px;
            width:100px;
            margin-left:37%;
        }

        .sub-portal:hover {
            transform: translateY(-10px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);

            background-color: #f7f7f7
        }

        .sub-portal:hover img{
            transition: transform 0.6s ease;
            transform: scale(1.10);
        }

        .sub-portal button {
            font-size: 20px;
            font-weight: 600;

        }
        .sub-portal button:hover {
            color: #196eba;
        }


        @media screen and (max-width: 1360px) and (min-width: 1000px) {
  .card img{
    margin-left: 27%;
  }
  .sub-portal button {
            font-size: 17px;
            font-weight: 600;

        }
}
    </style>
@endsection


@section("title")

<title>Main Dashboard </title>

@endsection


@section("script")

<style>
    .dash-widget{
        min-height: 300px;
        /* background: #287dba4f; */
    }
    .dash-widget:hover{

        background: #287dba77;
    }

    .img-size{
        width: 256px;
        height: 256px;
    }
</style>

@endsection
