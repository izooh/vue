


<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title>front end workings </title>

<meta name="csrf-token" content="{{csrf_token()}}">
<script>window.Laravel={csrfToken:'{{csrf_token()}}'}</script>

</head>
<body>
  <div id="app">
    <navb></navb>

  <router-link to='/'>home</router-link>
    <router-link to='/views'>admin</router-link>
    <router-link to='/guest'>guest</router-link>
  <router-view></router-view>


   </div>
  <script src="{{asset('js/app.js') }}"></script>

</body>
</html>
