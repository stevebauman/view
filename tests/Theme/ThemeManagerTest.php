<?php namespace Orchestra\View\Tests\Theme;

use Mockery as m;
use Orchestra\View\Theme\ThemeManager;

class ThemeManagerTest extends \PHPUnit_Framework_TestCase {

	/**
	 * Application instance.
	 *
	 * @var Illuminate\Foundation\Application
	 */
	private $app;

	/**
	 * Setup the test environment.
	 */
	public function setUp()
	{
		$this->app = new \Illuminate\Container\Container;
	}

	/**
	 * Teardown the test environment.
	 */
	public function tearDown()
	{
		unset($this->app);
		m::close();
	}

	/**
	 * Test contructing Orchestra\View\Theme\ThemeManager.
	 *
	 * @test
	 */
	public function testConstructMethod()
	{
		$app = $this->app;
		$app['url'] = $url = m::mock('Url');
		$app['path.public'] = '/var/laravel/public';

		$url->shouldReceive('base')->once()->andReturn('http://localhost/');

		$stub = new ThemeManager($app);
		$this->assertInstanceOf('\Orchestra\View\Theme\Container', $stub->driver());
	}

}
