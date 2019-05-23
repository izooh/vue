


<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">

<meta name="csrf-token" content="{{csrf_token()}}">
<script>window.Laravel={csrfToken:'{{csrf_token()}}'}</script>
<style>
.fade-enter-active,
.fade-leave-active {
  transition-duration: 1s;
  transition-property: opacity;
  transition-timing-function: ease;
}

.fade-enter,
.fade-leave-active {
  opacity: 0
}
</style>
</head>
<body>

<div id="app">
  <v-app>
<navb></navb>
    <div class="container">
<br><br><br>
<transition name="fade" mode="out-in">
  <router-view></router-view>
</transition>
</div>
</v-app>
</div>
  <script src="{{asset('js/app.js') }}"></script>

</body>
</html>
