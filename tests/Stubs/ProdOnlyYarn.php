<?php

namespace stekel\LaravelRelease\Tests\Stubs;

use stekel\LaravelRelease\Script;

class ProdOnlyYarn extends Script {
    
    public function production() {
    
        $this->console('yarn production');
    }
}