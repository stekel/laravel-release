<?php

namespace stekel\LaravelRelease\Scripts;

use stekel\LaravelRelease\Script;

class Yarn extends Script {
    
    /**
     * Execute for development environment
     *
     * @return void
     */
    public function development() {
    
        $this->console('yarn dev');
    }
    
    /**
     * Execute for production environment
     *
     * @return void
     */
    public function production() {
    
        $this->console('yarn production');
    }
}