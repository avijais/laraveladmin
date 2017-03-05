<?php $bodyclass = 'skin-blue sidebar-mini'; ?>
@extends('layouts.app')

@section('content')
<div class="wrapper">
    
    <!--  Header -->
    @include('header')

    <!-- Sidebar -->
    @include('sidebar')
          
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <br>
        <!-- Response message show -->
            @include('message.response-message')
        <!-- Content Header (Page header) -->
        <section class="content-header">

            {{--@include('message.response-message')--}}
            <h1>
                {{$page_title or "Page Title" /*or null*/}}
                <small>{{$page_description /*or null*/ or "Page Description"}}</small>
            </h1>

            <!-- You can dynamically generate breadcrumbs here -->
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>

        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('content')
        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->

    <!-- Footer -->
    @include('footer')

    @include('control-sidebar')

    </div><!-- ./wrapper -->
@endsection

<script>
// ['headers' => ['Authorization' => 'Bearer ' . $api_token]]
// var response = <?php //echo $response; ?>;
// var response = {!! session()->get('response') !!}
// console.log(response.data.api_token);
</script>