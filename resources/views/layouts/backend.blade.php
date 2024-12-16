<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>Starter | Kadso - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc."/>
        <meta name="author" content="Zoyothemes"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.ico')}}">

        <!-- App css -->
        <link href="{{asset('backend/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons -->
        <link href="{{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Core CSS -->
        <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Material Design Icons -->
        <link href="{{asset('backend/assets/css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css"/>

        <!-- Prettify -->
        <link href="{{asset('backend/assets/css/prettify.css" rel="stylesheet')}}" type="text/css"/>

        <!-- Custom CSS -->
        <link href="{{asset('backend/assets/css/styles.css')}}" rel="stylesheet">

    </head>

    <!-- body start -->
    <body data-menu-color="dark" data-sidebar="default">

        <!-- Begin page -->
        <div id="app-layout">


            <!-- Topbar Start -->
            @include('include.backend.header')
            <!-- end Topbar -->

            <!-- Left Sidebar Start -->
            @include('include.backend.sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-xxl">

                    @yield('content')





                    </div> <!-- container-fluid -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col fs-13 text-muted text-center">
                                &copy; <script>document.write(new Date().getFullYear())</script> - Made with <span class="mdi mdi-heart text-danger"></span> by <a href="#!" class="text-reset fw-semibold">Zoyothemes</a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        {{-- Script Template --}}
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        <!-- jQuery -->
	<script src="{{asset('backend/js/jquery.js')}}"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="{{asset('backend/js/bootstrap.min.js')}}"></script>

	<script src="{{asset('backend/js/jquery.easing.min.js')}}"></script>

	<script type="{{asset('backend/text/javascript')}}" src="{{asset('backend/js/prettify.jss')}}"></script>

	<!-- Menu Toggle Script -->
	<script>

		//jQuery for page scrolling feature - requires jQuery Easing plugin
		$(function () {
			$('.sidebar-nav a').bind('click', function (event) {
				var $anchor = $(this);
				$('html, body').stop().animate({
					scrollTop: $($anchor.attr('href')).offset().top - 100
				}, 1500, 'easeInOutExpo');
				event.preventDefault();
			});
		});
	</script>

        <!-- Vendor -->
        <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/feather-icons/feather.min.js') }}"></script>

        <!-- App js-->
        <script src="{{ asset('backend/assets/js/app.js') }}"></script>

        @yield('js')
        @stack('script')
    </body>
</html>
