<?php

namespace Mbf\Modules\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Mbf\Modules\Commands\CommandMakeCommand;
use Mbf\Modules\Commands\ComponentClassMakeCommand;
use Mbf\Modules\Commands\ComponentViewMakeCommand;
use Mbf\Modules\Commands\ControllerMakeCommand;
use Mbf\Modules\Commands\DisableCommand;
use Mbf\Modules\Commands\DumpCommand;
use Mbf\Modules\Commands\EnableCommand;
use Mbf\Modules\Commands\EventMakeCommand;
use Mbf\Modules\Commands\FactoryMakeCommand;
use Mbf\Modules\Commands\InstallCommand;
use Mbf\Modules\Commands\JobMakeCommand;
use Mbf\Modules\Commands\LaravelModulesV6Migrator;
use Mbf\Modules\Commands\ListCommand;
use Mbf\Modules\Commands\ListenerMakeCommand;
use Mbf\Modules\Commands\MailMakeCommand;
use Mbf\Modules\Commands\MiddlewareMakeCommand;
use Mbf\Modules\Commands\MigrateCommand;
use Mbf\Modules\Commands\MigrateRefreshCommand;
use Mbf\Modules\Commands\MigrateResetCommand;
use Mbf\Modules\Commands\MigrateRollbackCommand;
use Mbf\Modules\Commands\MigrateStatusCommand;
use Mbf\Modules\Commands\MigrationMakeCommand;
use Mbf\Modules\Commands\ModelMakeCommand;
use Mbf\Modules\Commands\ModuleDeleteCommand;
use Mbf\Modules\Commands\ModuleMakeCommand;
use Mbf\Modules\Commands\NotificationMakeCommand;
use Mbf\Modules\Commands\PolicyMakeCommand;
use Mbf\Modules\Commands\ProviderMakeCommand;
use Mbf\Modules\Commands\PublishCommand;
use Mbf\Modules\Commands\PublishConfigurationCommand;
use Mbf\Modules\Commands\PublishMigrationCommand;
use Mbf\Modules\Commands\PublishTranslationCommand;
use Mbf\Modules\Commands\RequestMakeCommand;
use Mbf\Modules\Commands\ResourceMakeCommand;
use Mbf\Modules\Commands\RouteProviderMakeCommand;
use Mbf\Modules\Commands\RuleMakeCommand;
use Mbf\Modules\Commands\SeedCommand;
use Mbf\Modules\Commands\SeedMakeCommand;
use Mbf\Modules\Commands\SetupCommand;
use Mbf\Modules\Commands\TestMakeCommand;
use Mbf\Modules\Commands\UnUseCommand;
use Mbf\Modules\Commands\UpdateCommand;
use Mbf\Modules\Commands\UseCommand;

class ConsoleServiceProvider extends ServiceProvider
{
    /**
     * Namespace of the console commands
     * @var string
     */
    protected $consoleNamespace = "Mbf\\Modules\\Commands";

    /**
     * The available commands
     * @var array
     */
    protected $commands = [
        CommandMakeCommand::class,
        ControllerMakeCommand::class,
        DisableCommand::class,
        DumpCommand::class,
        EnableCommand::class,
        EventMakeCommand::class,
        JobMakeCommand::class,
        ListenerMakeCommand::class,
        MailMakeCommand::class,
        MiddlewareMakeCommand::class,
        NotificationMakeCommand::class,
        ProviderMakeCommand::class,
        RouteProviderMakeCommand::class,
        InstallCommand::class,
        ListCommand::class,
        ModuleDeleteCommand::class,
        ModuleMakeCommand::class,
        FactoryMakeCommand::class,
        PolicyMakeCommand::class,
        RequestMakeCommand::class,
        RuleMakeCommand::class,
        MigrateCommand::class,
        MigrateRefreshCommand::class,
        MigrateResetCommand::class,
        MigrateRollbackCommand::class,
        MigrateStatusCommand::class,
        MigrationMakeCommand::class,
        ModelMakeCommand::class,
        PublishCommand::class,
        PublishConfigurationCommand::class,
        PublishMigrationCommand::class,
        PublishTranslationCommand::class,
        SeedCommand::class,
        SeedMakeCommand::class,
        SetupCommand::class,
        UnUseCommand::class,
        UpdateCommand::class,
        UseCommand::class,
        ResourceMakeCommand::class,
        TestMakeCommand::class,
        LaravelModulesV6Migrator::class,
        ComponentClassMakeCommand::class,
        ComponentViewMakeCommand::class,
    ];

    public function register(): void
    {
        $this->commands($this->resolveCommands());
    }

    private function resolveCommands(): array
    {
        $commands = [];

        foreach (config('modules.commands', $this->commands) as $command) {
            $commands[] = Str::contains($command, $this->consoleNamespace) ?
                $command :
                $this->consoleNamespace . "\\" . $command;
        }

        return $commands;
    }

    public function provides(): array
    {
        return $this->commands;
    }
}
