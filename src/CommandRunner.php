<?php

namespace stekel\LaravelRelease;

class CommandRunner {
    
    /**
     * Commands
     *
     * @var array
     */
    protected $commands;
    
    /**
     * Add a command
     *
     * @param  string $command
     * @return string
     */
    public function add($command) {
    
        $this->commands[] = $command;
        
        return $this;
    }
    
    /**
     * Execute each command
     *
     * @return string
     */
    public function execute() {
    
        return collect($this->commands)->map(function($command) {
            return system($command);
        })->toArray();
    }
}