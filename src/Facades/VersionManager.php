<?php

namespace NuvoCode\Config\Facades;

use NuvoCode\Config\Utils\Config;

class VersionManager extends Config
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getVersion()
    {
        return $this->instance['version'];
    }

    public function updateVersion($type = 'patch')
    {
        $version = $this->get('version');
        
        if (!isset($version)) {
            $version = '0.0.0';
        }

        list($major, $minor, $patch) = explode('.', $version);
        if ($type === 'major') {
            $major++;
            $minor = $patch = 0;
        } elseif ($type === 'minor') {
            $minor++;
            $patch = 0;
        } else {
            $patch++;
        }

        $version = "{$major}.{$minor}.{$patch}";

        $this->set('version', $version);
        $this->save();
        return $version;
    }
}
