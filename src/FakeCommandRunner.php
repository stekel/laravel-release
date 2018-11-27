<?php

namespace stekel\LaravelRelease;

class FakeCommandRunner extends CommandRunner {
    
    /**
     * Execute each command
     *
     * @param  string $command
     * @return string
     */
    public function execute($command) {
    
        $this->output[] = $command;
    }
}