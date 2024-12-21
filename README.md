# Config

The config package provides a simple way to manage configuration values. You can define NUVO_CONFIG_FILE environment variable to override the default config file.<br>
Default config file is `.nuvo.yml`.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Installation

You can install the package via Composer:

```
composer require nuvo-code/config
```

After installing, you need to create a config file named `.nuvo.yml` in your project root directory.
Or you can override the default config file by setting the `NUVO_CONFIG_FILE` environment variable.

## Usage

```php
use NuvoCode\Config\Config;

$config = new Config();

$config->set('key', 'value');

$value = $config->get('key');

$value = $config->get('key', 'default');
```

## Facade

```php
use NuvoCode\Config\Facades\VersionManager;

$version = new VersionManager();

$version->updateVersion('major'); // It will update version to 2.0.0
$version->updateVersion('minor'); // It will update version to 1.1.0
$version->updateVersion('patch'); // It will update version to 1.0.1
```