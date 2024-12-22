<?php

namespace NuvoCode\Config\Commands;

use Illuminate\Console\Command;
use NuvoCode\Config\Facades\VersionManager;

class VersionCommand extends Command
{
    protected $signature = 'nuvo:version';
    protected $description = 'Create a new version for the project';

    public function handle()
    {
        $options = ['major', 'minor', 'patch'];
        $versionType = $this->choice('Select the version type to update', $options, 0);

        $version = new VersionManager();
        $newVersion = $version->updateVersion($versionType);
        $this->info("Project updated with version $newVersion.");

        $major = explode('.', $newVersion)[0];
        $changelogPath = base_path('resources/docs/99_changelog/' . $major . '.x.x');

        if (!file_exists($changelogPath)) {
            mkdir($changelogPath, 0777, true);
        }

        $changelogFile = "$changelogPath/$newVersion.md";

        if (!file_exists($changelogFile)) {
            $file = fopen($changelogFile, 'w');
            fwrite($file, "# Changelog " . date('d-m-Y') . "\n\n");
            fwrite($file, "## Version: $newVersion\n");
            fclose($file);
        }
        return 0;
    }
}