<?php

use PHPUnit\Framework\TestCase;
use NuvoCode\Config\Facades\VersionManager;
use Symfony\Component\Yaml\Yaml;

class VersionManagerTest extends TestCase
{
    protected $versionManager;

    protected function setUp(): void
    {
        file_put_contents('.nuvo.yml', "version: 1.0.0\n");
        $this->versionManager = new VersionManager();
    }

    protected function tearDown(): void
    {
        unlink('.nuvo.yml');
    }

    public function testVersionIsRetrieved()
    {
        $this->assertEquals('1.0.0', $this->versionManager->getVersion());
    }

    public function testPatchVersionIsUpdated()
    {
        $this->versionManager->updateVersion('patch');
        $data = Yaml::parseFile('.nuvo.yml');
        $this->assertEquals('1.0.1', $data['version']);
    }

    public function testMinorVersionIsUpdated()
    {
        $this->versionManager->updateVersion('minor');
        $data = Yaml::parseFile('.nuvo.yml');
        $this->assertEquals('1.1.0', $data['version']);
    }

    public function testMajorVersionIsUpdated()
    {
        $this->versionManager->updateVersion('major');
        $data = Yaml::parseFile('.nuvo.yml');
        $this->assertEquals('2.0.0', $data['version']);
    }
}
