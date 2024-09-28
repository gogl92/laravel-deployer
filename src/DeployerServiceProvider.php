<?php

declare(strict_types=1);

namespace Inquid\Deployer;

use Illuminate\Support\ServiceProvider;
use Inquid\Deployer\Commands\CreateImageBundleCommand;

class DeployerServiceProvider extends ServiceProvider
{
    /**
     * Register the command.
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                CreateImageBundleCommand::class,
            ]);
        }
    }
}
