<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Styles -->
{{-- <link href="/css/app.css" rel="stylesheet"> --}}

{{-- 

Bootstrap 3.3.7 --}}
 <!-- Latest compiled and minified CSS -->
{{-- 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 --}}
 <link href="/css/bootstrap/bootstrap.min.css" rel="stylesheet">


{{-- RTL --}}
{{-- <link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css"> --}}
<link href="/css/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet">
{{--L71: ADDING THE MAIN CSS OF THE select2 --}}
<link href="/css/select2/select2.min.css" rel="stylesheet">

{{--L135: INCLUDE font awsome --}}
<link href="/css/fontAwsome/font-awesome.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Reem+Kufi&amp;subset=arabic" rel="stylesheet">

{{-- 
CLEAN BLOG CSS
 --}}
<link href="/css/cleanBlog/cleanBlog.css" rel="stylesheet">
{{--L11: ADDING A CUSTOM CSS AND CREATING HIS PATH public/css/cust.css--}}
<link href="/css/cust.css" rel="stylesheet">
<!-- Scripts -->
<script>
  window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
</script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->