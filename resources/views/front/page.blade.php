@extends('master.front')

@section('title')
    {{__('Page')}}
@endsection

@section('content')

    <div class="page-head">
        <div class="container">
            <div class="row">
                <div class="col py-5">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="#">الرئيسيـة</a></li>
                            <li class="breadcrumb-item active" aria-current="page">    {{$page->title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5 min-vh-100">
         {!! $page->details !!}

    </div>

@endsection
