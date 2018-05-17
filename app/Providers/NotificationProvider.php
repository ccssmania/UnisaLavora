<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use App\User;
class NotificationProvider extends ServiceProvider
{

    
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $auth = $this->app['auth'];
        view()->composer('*', function($view) use ($auth){
            if($auth->user() != null){
                $notifications = $auth->user()->notifications()->orderBy("read_at",'desc')->limit(7)->get(); // returns User object
                $unread = $auth->user()->unreadNotifications()->count();
                $view->with(['notifications' => $notifications , 'unread' => $unread]); // does what you expect
            }
        });
        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
