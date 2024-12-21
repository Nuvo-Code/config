# Config

The config package provides a simple way to manage configuration values. You can define NUVO_CONFIG_FILE environment variable to override the default config file.<br>
Default config file is `.nuvo.yml`.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

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