<?php

namespace Pmall\Readonly;

use Closure;
use Illuminate\Contracts\Foundation\Application;

class CheckForReadonlyMode
{
    /**
     * The application implementation.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (file_exists($this->app->storagePath().'/framework/readonly')) {

            if ($request->method() != 'GET') {

                throw new RequestNotAllowedException('Request not allowed : The application is in readonly mode.');

            }

        }

        return $next($request);
    }
}
