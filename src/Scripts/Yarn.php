<?php

namespace stekel\LaravelRelease\Scripts;

use stekel\LaravelRelease\ScriptContract;

class Yarn implements ScriptContract {
    
    /**
     * Execute for development environment
     *
     * @return void
     */
    public function executeDev() {
    
        system('yarn dev');
    }
    
    /**
     * Execute for production environment
     *
     * @return void
     */
    public function executeProd() {
    
        system('yarn production');
    }
}