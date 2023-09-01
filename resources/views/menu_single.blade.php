@extends('layouts.master')


@section('content')
    <main class="page-content">
        <!-- Breadcrumbs & Page title-->
        <section class="text-center section-34 section-sm-60 section-md-top-100 section-md-bottom-105" style="background-image:url({{url($slider->img)}})">
            <div class="shell shell-fluid">
                <div class="range range-condensed">
                    <div class="cell-xs-12 cell-xl-preffix-1 cell-xl-11">
                        <p class="h3 text-white">{{$category_name->name}}</p>
                        <ul class="breadcrumbs-custom offset-top-10">
                            <li><a href="/">Home</a></li>
                            <li><a href="/menu">Menu</a></li>
                            <li class="active">{{$category_name->name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-50 section-sm-100">
            <div class="shell">
                <h3>{{$category_name->name}}</h3>
                <div class="range range-xs-center">
                    <div class="cell-xs-12">
                        <div class="inset-lg-left-15 inset-lg-right-15"></div>
                        <div class="menu-classic bg-menu-7 menu-classic-single">
                            <h4 class="title"><a href="/menu-single/{{$category_name->slug}}" class="link-white"></a></h4>
                            <ul class="list-menu">
                                @foreach($menus as $menu)
                                    <li>
                                        <div class="menu-item h6"><span>{{$menu->name}}</span><span class="price">{{$menu->price}}</span></div>
                                        <div class="menu-item-desc"><span>{{$menu->description}}</span></div>
                                    </li>
                                @endforeach


                            </ul>
                        </div>
                    </div>
                </div>
                <div class="offset-top-50 offset-sm-top-100 text-center divider-custom">
                    <div><a href="#" class="btn btn-md btn-shape-circle btn-primary">download full menu</a></div>
                </div>
            </div>
        </section>

    </main>


@endsection



