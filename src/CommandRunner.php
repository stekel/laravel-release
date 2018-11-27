<?php

namespace stekel\LaravelRelease;

class CommandRunner {
    
    /**
     * Command output
     *
     * @var array
     */
    public $output = [];
    
    /**
     * Execute each command
     *
     * @param  string $command
     * @return string
     */
    public function execute($comand) {
    
        $this->output[] = system($command);
    }
}