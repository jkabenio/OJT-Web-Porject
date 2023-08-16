<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\facades\Auth;
class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
{
    RateLimiter::for('login', function (Request $request) {
        $key = "login.".$request->ip();
        $max = 3; // maximum number of attempts
        $decay = 60; // time (in seconds) after which an attempt decays
        
        $retries = RateLimiter::retriesLeft($key, $max);
        
        $creds = $request->only('email','password');
        if (!Auth::guard('admin')->attempt($creds)) {
            if (RateLimiter::tooManyAttempts($key, $max)) {
                $seconds = RateLimiter::availableIn($key);
                return back()->with('fail','Too Many Requests Please try again in '.$seconds.' Seconds');
            } else {
                RateLimiter::hit($key, $decay);
                return back()->with('fail','Incorrect Credential, You Have '.$retries.' Attempt Left');
            }
        }
        
        // the user entered the correct credentials, so don't hit the rate limiter
        return redirect()->route('admin.admindashboard')->with('Logged In as Admin Successful');
    });
}

}
