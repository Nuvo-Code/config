<?php

namespace NuvoCode\Config\Utils;

use Symfony\Component\Yaml\Yaml;

class Config
{
    protected string $configFile;
    protected array $instance;

    protected function __construct()
    {
        $root = getcwd() . '/';
        if (str_contains($root, 'public')) {
            $root .= '../';
        }
        $this->configFile = $root . (getenv('NUVO_CONFIG_FILE') ?: '.nuvo.yml');
        if (!file_exists($this->configFile)) {
            throw new \Exception("Config file not found: {$this->configFile}");
        }

        $this->instance = Yaml::parseFile($this->configFile);
    }

    protected function get($key, $default = null)
    {
        return $this->instance[$key] ?? $default;
    }

    protected function set($key, $value)
    {
        $this->instance[$key] = $value;
    }

    protected function save()
    {
        file_put_contents($this->configFile, Yaml::dump($this->instance));
    }
}
