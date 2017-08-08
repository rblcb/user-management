<!DOCTYPE html>
<html>
<head>
    <title>User management system</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSS are placed here -->
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/bootstrap-theme.css') }}
    {{ HTML::style('css/jumbotron-narrow.css') }}

</head>

<body>
<!-- Container -->
<div class="container">
    @include('admin.inc.navigation')
        <!-- Content -->
        @yield('content')
</div><!-- /container -->

<!-- Scripts are placed here -->
{{ HTML::script('js/jquery-1.11.1.min.js') }}
{{ HTML::script('js/bootstrap.min.js') }}
{{ HTML::script('js/custom.js') }}

</body>
</html>