<?php

class LavenderTest extends TestCase
{

    /**
     * Check some of Lavender's core routes
     */
	public function testAvailability()
	{
        // home page
		$response = $this->call('GET', '/');
		$this->assertEquals(200, $response->getStatusCode());

        // cart page (redirects to login)
		$response = $this->call('GET', 'cart');
		$this->assertEquals(302, $response->getStatusCode());

        // customer page (redirects to login)
		$response = $this->call('GET', 'customer/dashboard');
		$this->assertEquals(302, $response->getStatusCode());

        // 404 page
		$response = $this->call('GET', 'this is an unknown route');
		$this->assertEquals(404, $response->getStatusCode());
	}

    /**
     * Check the entity instance of Lavender's core models
     */
    public function testInstances()
    {
        // cart instance
        $model = app('App\Cart')->getCart();
        $class = get_class(entity('cart'));
        $this->assertInstanceOf($class, $model);

        // store instance
        $model = app('App\Store')->getStore();
        $class = get_class(entity('store'));
        $this->assertInstanceOf($class, $model);

        // store instance
        $model = app('App\Theme')->getTheme();
        $class = get_class(entity('theme'));
        $this->assertInstanceOf($class, $model);
    }

    /**
     * Check the definitions of all entities
     */
	public function testEntityDefinitions()
	{
        foreach(config('entity') as $entity => $data){

            $model = entity($entity);

            $this->assertObjectHasAttribute('entity', $model);

            $this->assertObjectHasAttribute('table', $model);

            $this->assertInstanceOf('Lavender\Contracts\Entity', $model);

        }
	}

    public function testWorkflowDefinitions()
    {
        // set session store for request
        Request::setSession($this->app['session.store']);

        // load the applications kernel
        $kernel = app('Lavender\Contracts\Workflow\Kernel');

        foreach($kernel->getForms() as $form => $class){

            $workflow = workflow($form)->resolve();

            // workflow must always resolve correctly
            $this->assertInstanceOf($class, $workflow);

            // create empty request
            $request = Request::create('/', 'POST', array_fill_keys(array_keys($workflow->fields), ''));

            // empty request must always fail
            $this->assertEquals(false, workflow($form)->handle($request));

        }
    }


}
