<?php

namespace App\Providers;

use Config;
use Illuminate\Support\ServiceProvider;

class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
           $config = array(
                'driver'     => setting_item("email_driver"),
                'host'       => setting_item("email_host"),
                'port'       => setting_item("email_port"),
                'username'   => setting_item("email_username"),
                'password'   => setting_item("email_password"),
                'encryption' => setting_item("email_encryption"),
                'from'       => array('address' =>  setting_item("email_username"), 'name' => setting_item("email_from_name") ?? ""),
            );

            Config::set('mail', $config);
    }
}
