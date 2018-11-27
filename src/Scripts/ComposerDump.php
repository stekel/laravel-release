<?php

namespace stekel\LaravelRelease\Scripts;

use stekel\LaravelRelease\Script;

class ComposerDump extends Script {
    
    /**
     * Execute for development environment
     *
     * @return void
     */
    public function development() {
    
        $this->console('composer dump');
    }
    
    /**
     * Execute for production environment
     *
     * @return void
     */
    public function production() {
    
        $this->console('composer dump');
    }
}