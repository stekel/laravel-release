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
     * Command runner
     *
     * @var CommandRunner
     */
    protected $commandRunner;
    
    /**
     * Construct
     *
     * @param array         $scripts
     * @param CommandRunner $commandRunner
     */
    public function __construct(array $scripts, CommandRunner $commandRunner=null) {
        
        $this->commandRunner = $commandRunner ?? new CommandRunner();
        $this->scripts = collect($scripts)->transform(function($script) {
            
            return class_exists($script) ? new $script($this->commandRunner) : null;
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
    public function release($env='development') {
        
        $this->scripts->each(function($script) use($env) {
            
            $method = $env;
            
            if (method_exists($script, $method)) {
                
                $script->$method();
            }
        });
        
        return $this->commandRunner->execute();
    }
}