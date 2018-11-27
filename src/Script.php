<?php

namespace stekel\LaravelRelease;

abstract class Script implements ScriptContract {
    
    /**
     * Command runner
     *
     * @var CommandRunner
     */
    protected $commandRunner;
    
    /**
     * Construct
     *
     * @param CommandRunner $commandRunner
     */
    public function __construct(CommandRunner &$commandRunner) {
        
        $this->commandRunner = $commandRunner;
    }
    
    /**
     * Add a coomand to the runner
     *
     * @param  string $command
     * @return Script
     */
    public function console($command) {
    
        $this->commandRunner->add($command);
        
        return $this;
    }
    
    /**
     * Execute for development environment
     *
     * @return void
     */
    public function development() {
    
    }
    
    /**
     * Execute for production environment
     *
     * @return void
     */
    public function production() {
    
    }
}