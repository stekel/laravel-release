<?php

namespace stekel\LaravelRelease;

class FakeCommandRunner extends CommandRunner {
    
    /**
     * Execute each command
     *
     * @return string
     */
    public function execute() {
    
        return collect($this->commands)->map(function($command) {
            return $command;
        })->toArray();
    }
}