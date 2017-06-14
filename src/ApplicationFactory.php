<?php

namespace Continuous\Cli;

use Continuous\Cli\Command\Company\CompanyListCommand;
use Continuous\Cli\Command\Repository\RepositoryListCommand;
use Symfony\Component\Console\Application;

/**
 * Class ApplicationFactory
 * @package Continuous\Cli
 */
final class ApplicationFactory
{
    const NAME = 'ContinuousPHP Cli';

    protected static $version;

    /**
     * @return Application
     */
    public function create()
    {
        $application = new Application(self::NAME, self::getVersion());
        $application->add(new CompanyListCommand());
        $application->add(new RepositoryListCommand());

        return $application;
    }

    /**
     * Return the current version of continuousphp cli.
     *
     * @return string
     */
    public static function getVersion()
    {
        return constant(__NAMESPACE__ . '\\' . 'version');
    }
}