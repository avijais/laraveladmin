<div class="wrapper">

        <!--  Header -->
        @include('header')

        <!-- Sidebar -->
        @include('sidebar')
        
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <?php 
                      $alert = 'alert-danger';

                      if(!empty($response) && count($response)>0)
                      {
                        // var_dump($response);
                        $response = json_decode($response, true);
                        if(count($response) > 0 && $response['status'] == 'success')
                          $alert = 'alert-success'; ?>
                        <div class="alert <?php echo $alert; ?>">
                              <ul>
                                  <li><?php
                                        foreach($response['message'] as $message){
                                          echo $message;
                                        }
                                      ?>
                                  </li>
                              </ul>
                        </div>
                <?php } ?>
                       
                      
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