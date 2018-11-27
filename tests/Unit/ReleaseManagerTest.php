<?php

namespace stekel\LaravelRelease\Tests\Unit;

use stekel\LaravelRelease\FakeCommandRunner;
use stekel\LaravelRelease\ReleaseManager;
use stekel\LaravelRelease\Tests\TestCase;

class ReleaseManagerTest extends TestCase {

    /** @test **/
    public function can_output_a_list_of_valid_scripts() {
        
        $releaseManager = new ReleaseManager([
            \stekel\LaravelRelease\Scripts\Yarn::class
        ]);
        
        $this->assertCount(1, $releaseManager->all());
    }
    
    /** @test **/
    public function can_filter_out_scripts_that_dont_exists() {
        
        $releaseManager = new ReleaseManager([
            \stekel\LaravelRelease\Scripts\Yarn::class,
            \stekel\LaravelRelease\Scripts\Unknown::class,
        ]);
        
        $this->assertCount(1, $releaseManager->all());
    }
    
    /** @test **/
    public function can_run_the_given_development_scripts() {
        
        $releaseManager = new ReleaseManager([
            \stekel\LaravelRelease\Scripts\Yarn::class,
            \stekel\LaravelRelease\Tests\Stubs\DevOnlyYarn::class,
        ], new FakeCommandRunner());
        
        $releaseManager->release('development');
        
        $this->assertEquals([
            'yarn dev',
            'yarn dev'
        ], $releaseManager->output());
    }
    
    /** @test **/
    public function can_ignore_script_if_no_development_function_exists() {
        
        $releaseManager = new ReleaseManager([
            \stekel\LaravelRelease\Tests\Stubs\ProdOnlyYarn::class,
        ], new FakeCommandRunner());
        
        $releaseManager->release('development');
        
        $this->assertEquals([], $releaseManager->output());
    }
    
    /** @test **/
    public function can_ignore_script_if_no_production_function_exists() {
        
        $releaseManager = new ReleaseManager([
            \stekel\LaravelRelease\Tests\Stubs\DevOnlyYarn::class,
        ], new FakeCommandRunner());
        
        $releaseManager->release('production');
        
        $this->assertEquals([], $releaseManager->output());
    }
}