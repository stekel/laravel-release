<?php

namespace stekel\LaravelRelease;

interface ScriptContract {
    
    public function development();
    public function production();
}