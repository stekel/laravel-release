<?php

namespace stekel\LaravelRelease\Tests\Stubs;

use stekel\LaravelRelease\Script;

class DevOnlyYarn extends Script {
    
    public function development() {
    
        $this->console('yarn dev');
    }
}