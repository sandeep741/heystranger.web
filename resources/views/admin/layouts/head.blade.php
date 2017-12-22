<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('pageTitle')</title>
<!-- Global stylesheets -->
<link href="{{ asset('/assets/css/Roboto-family.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('/assets/admin/css/styles.css') }}" rel="stylesheet" type="text/css" media="all"/> 
<link href="{{ asset('/assets/admin/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all"/> 
<link href="{{ asset('/assets/admin/css/core.css') }}" rel="stylesheet" type="text/css" media="all"/>
<link href="{{ asset('/assets/admin/css/components.css') }}" rel="stylesheet" type="text/css" media="all"/>
<link href="{{ asset('/assets/admin/css/colors.css') }}" rel="stylesheet" type="text/css" media="all"/>
<link href="{{ asset('/assets/admin/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" media="all"/>
<link href="{{ asset('/assets/admin/dev-custom-styles.css') }}" rel="stylesheet" type="text/css" media="all"/>
<link rel="icon"  type="image/png"  href="{{ asset('/assets/images/favicon.png') }}">
<link rel="stylesheet" href="{{ asset('/assets/css/heystranger-css/jquery-confirm.css') }}">
<!-- /global stylesheets -->
@yield('addtional_css')