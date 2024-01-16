<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{__('main.dashboard')}} @yield('title')</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{asset('Dashboards/global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('Dashboards/global_assets/css/icons/fontawesome/styles.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('Dashboards/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('Dashboards/assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('Dashboards/assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('Dashboards/assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('Dashboards/assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{asset('Dashboards/global_assets/js/main/jquery.min.js')}}"></script>
    <script src="{{asset('Dashboards/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('Dashboards/global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <script src="{{asset('Dashboards/global_assets/js/plugins/ui/ripple.min.js')}}"></script>



    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{asset('Dashboards/global_assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
    <script src="{{asset('Dashboards/global_assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
    <script src="{{asset('Dashboards/global_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
    <script src="{{asset('Dashboards/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
    <script src="{{asset('Dashboards/global_assets/js/plugins/ui/moment/moment.min.js')}}"></script>
    <script src="{{asset('Dashboards/global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>

    <script src="{{asset('Dashboards/assets/js/app.js')}}"></script>
    <script src="{{asset('Dashboards/global_assets/js/demo_pages/dashboard.js')}}"></script>
    <script src="{{asset('Dashboards/global_assets/js/demo_pages/form_select2.js')}}"></script>
    <script src="{{asset('Dashboards/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js')}}"></script>
    <script src="{{asset('Dashboards/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>

    @yield('js')

    <!-- /theme JS files -->


    @livewireStyles

</head>

<body>
