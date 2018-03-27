<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.head')
</head>

<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">
@include('admin/layouts/header')
@section("main-content")
    @show


<!-- Footer -->
    @include('admin/layouts/sidebar')
@include('admin/layouts/footer')
</div>
</body>

</html>