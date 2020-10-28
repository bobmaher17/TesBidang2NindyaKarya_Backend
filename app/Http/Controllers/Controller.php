<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('web')
                ->namespace($this->namespace) // <— tambahkan ini
                ->group(base_path('routes/web.php'));


            Route::prefix('api')
                ->namespace($this->namespace) // <— tambahkan ini
                ->middleware('api')
                ->group(base_path('routes/api.php'));
        });
    }
}
