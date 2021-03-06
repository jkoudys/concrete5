<?php
namespace Concrete\Core\Config;

use Illuminate\Filesystem\Filesystem;
use Concrete\Core\Cache\OpCache;

class DirectFileSaver extends FileSaver
{

    /**
     * @var string|null
     */
    protected $environment;

    public function __construct(Filesystem $files, $environment = null)
    {
        parent::__construct($files);
        $this->environment = $environment;
    }

    protected function getStorageDirectory()
    {
        return DIR_APPLICATION . '/config';
    }

    protected function getFilename($group, $path = null)
    {
        $file = $this->environment ? "{$this->environment}.{$group}.php" : "{$group}.php";
        if (!$path) {
            return $file;
        } else {
            return "{$path}/{$file}";
        }
    }

}
