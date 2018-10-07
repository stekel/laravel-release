<?php

namespace stekel\LaravelRelease;

interface ScriptContract {
    
    public function executeDev();
    public function executeProd();
}