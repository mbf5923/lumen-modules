<?php

namespace Mbf5923\Modules\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Mbf5923\Modules\Commands\CommandMakeCommand;
use Mbf5923\Modules\Commands\ComponentClassMakeCommand;
use Mbf5923\Modules\Commands\ComponentViewMakeCommand;
use Mbf5923\Modules\Commands\ControllerMakeCommand;
use Mbf5923\Modules\Commands\DisableCommand;
use Mbf5923\Modules\Commands\DumpCommand;
use Mbf5923\Modules\Commands\EnableCommand;
use Mbf5923\Modules\Commands\EventMakeCommand;
use Mbf5923\Modules\Commands\FactoryMakeCommand;
use Mbf5923\Modules\Commands\InstallCommand;
use Mbf5923\Modules\Commands\JobMakeCommand;
use Mbf5923\Modules\Commands\LaravelModulesV6Migrator;
use Mbf5923\Modules\Commands\ListCommand;
use Mbf5923\Modules\Commands\ListenerMakeCommand;
use Mbf5923\Modules\Commands\MailMakeCommand;
use Mbf5923\Modules\Commands\MiddlewareMakeCommand;
use Mbf5923\Modules\Commands\MigrateCommand;
use Mbf5923\Modules\Commands\MigrateRefreshCommand;
use Mbf5923\Modules\Commands\MigrateResetCommand;
use Mbf5923\Modules\Commands\MigrateRollbackCommand;
use Mbf5923\Modules\Commands\MigrateStatusCommand;
use Mbf5923\Modules\Commands\MigrationMakeCommand;
use Mbf5923\Modules\Commands\ModelMakeCommand;
use Mbf5923\Modules\Commands\ModuleDeleteCommand;
use Mbf5923\Modules\Commands\ModuleMakeCommand;
use Mbf5923\Modules\Commands\NotificationMakeCommand;
use Mbf5923\Modules\Commands\PolicyMakeCommand;
use Mbf5923\Modules\Commands\ProviderMakeCommand;
use Mbf5923\Modules\Commands\PublishCommand;
use Mbf5923\Modules\Commands\PublishConfigurationCommand;
use Mbf5923\Modules\Commands\PublishMigrationCommand;
use Mbf5923\Modules\Commands\PublishTranslationCommand;
use Mbf5923\Modules\Commands\RequestMakeCommand;
use Mbf5923\Modules\Commands\ResourceMakeCommand;
use Mbf5923\Modules\Commands\RouteProviderMakeCommand;
use Mbf5923\Modules\Commands\RuleMakeCommand;
use Mbf5923\Modules\Commands\SeedCommand;
use Mbf5923\Modules\Commands\SeedMakeCommand;
use Mbf5923\Modules\Commands\SetupCommand;
use Mbf5923\Modules\Commands\TestMakeCommand;
use Mbf5923\Modules\Commands\UnUseCommand;
use Mbf5923\Modules\Commands\UpdateCommand;
use Mbf5923\Modules\Commands\UseCommand;

class ConsoleServiceProvider extends ServiceProvider
{
    /**
     * Namespace of the console commands
     * @var string
     */
    protected $consoleNamespace = "Mbf5923\\Modules\\Commands";

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
