<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<title>{{ isset($title) ?  $title . ' | ' : '' }} university of greenwich - community for students</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet">
    <link href="/css/bootstrap-switch.min.css" rel="stylesheet">
    <link href="/css/community.css" rel="stylesheet">
		<link href="{{ asset('/css/main.css') }}" rel="stylesheet">    
    <link href="/css/nprogress.css" rel="stylesheet" >
    
        <script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>

	@yield('scripts.header')
</head>
<body
	@if(Route::currentRouteName() == "root_path")
		class="home"
	@endif
>


	@include('layouts/partials/_nav')

	@include('shared/flash')
	

	@yield('content')
	

	@include('layouts/partials/_footer')
	


    <script type="text/javascript" src="/js/angular.min.js"></script>
    <script src="/js/controllers/eventCtrl.js"></script> <!-- load events controller -->
    <script src="/js/controllers/eventTypesCtrl.js"></script> <!-- load events controller -->
    <script src="/js/controllers/bookingsCtrl.js"></script> <!-- load bookings controller -->
    <script src="/js/services/eventService.js"></script> <!-- load our service -->
    <script src="/js/services/eventTypeService.js"></script> <!-- load our service -->
    <script src="/js/services/bookingService.js"></script> <!-- load our service -->
    <script src="/js/app.js"></script> <!-- load our application -->
    <script type="text/javascript" src="/js/moment/moment.js"></script>
    <script src="/js/plugins.js"></script> <!-- load plugins -->
    

		<script src="{{ asset('/js/jquery.pjax.js') }}"></script>
		<script src="{{ asset('/js/nprogress.js') }}"></script>
		<script src="{{ asset('/js/moment.js') }}"></script>
		
		




		<script src="{{ asset('/js/autoload.js') }}"></script>
    
    @yield('view.scripts')
    
    @yield('scripts.footer')

</body>
</html>