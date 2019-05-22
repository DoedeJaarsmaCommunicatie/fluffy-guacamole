<?php
namespace App\Providers;

use PostTypes\PostType;

class PostTypeServiceProvider
{
	/**
	 * @var PostType $services
	 */
	public $services;
	
	public function __construct()
    {
    	$this->services = new PostType('service');
    	
        $this->boot();
	    $this->register();
    }

    public function boot(): void
    {
    	$this->services->icon('dashicons-admin-generic');
    	$this->services->options([
    		'hierarchical'  => false,
		    'supports'      => ['thumbnail', 'title', 'editor']
	    ]);
    	
    }
	
	public function register(): void
	{
		$this->services->register();
	}
}
