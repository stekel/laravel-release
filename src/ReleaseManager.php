<?php

namespace stekel\LaravelRelease;

class ReleaseManager {
    
    /**
     * Release scripts
     *
     * @var Collection
     */
    protected $scripts;
    
    /**
     * Construct
     *
     * @param array $scripts
     */
    public function __construct(array $scripts) {
        
        $this->scripts = collect($scripts)->transform(function($script) {
            
            return class_exists($script) ? new $script() : null;
        })->filter();
    }
    
    /**
     * Return all the scripts
     *
     * @return Collection
     */
    public function all() {
    
        return $this->scripts;
    }
    
    /**
     * Execute all scripts for the given environment
     *
     * @param  string $env
     * @return void
     */
    public function release($env='dev') {
        
        $this->scripts->each(function($script) use($env) {
            
            $method = 'execute'.ucwords($env);
            
            if (method_exists($script, $method)) {
                
                $script->$method();
            }
        });
    }
}