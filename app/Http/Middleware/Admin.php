<?php
namespace App\Http\Middleware;
use Closure;
class Admin
{
public function handle($request, Closure $next){
  if ($request->input('grant_type') === 'password') {
      $scope = $request->input('scope');
      $username = $request->input('username');

      if ($scope === 'admin' && (strpos($username, '@example.com') === false)) {
          return response()->json(['message' => "Not authorized to request admin scope"], 401);
      }
  }

  return $next($request);
}
}
