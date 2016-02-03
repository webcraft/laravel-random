<?php

class RandomTest extends Orchestra\Testbench\TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->app->config->set('laravel-random.strength', 'medium');
    }
    
    /**
     * Get package providers.
     * 
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [Webcraft\Random\RandomServiceProvider::class];
    }


    /**
     * Get package aliases.
     *
     * @param  \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return ['Random' => Webcraft\Random\RandomFacade::class];
    }

    /**
     * Test whether the container return an object of the correct class
     */
    public function testBinding()
    {
        $random = $this->app->make('random');
        $this->assertInstanceOf(RandomLib\Generator::class, $random);
    }
    
    /**
     * General integration test
     */
    public function testGeneratesRandomStringThroughFacade()
    {
        $length = 8;
        $string = Random::generateString($length);
        
        $this->assertTrue($length == strlen($string));
    }

    /**
     * General integration test
     */
    public function testGeneratesRandomStringThroughContainer()
    {
        $random = $this->app->make('random');

        $length = 8;
        $string = $random->generateString($length);

        $this->assertTrue($length == strlen($string));
    }
}
