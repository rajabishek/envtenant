<?php
namespace ThinkSayDo\EnvTenant;

use Illuminate\Support\ServiceProvider;

class TenantServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('tenant', function($app)
        {
            return new TenantResolver($app);
        });
    }

    public function boot()
    {
        $resolver = app('tenant');
        $resolver->resolveTenant();
    }
}