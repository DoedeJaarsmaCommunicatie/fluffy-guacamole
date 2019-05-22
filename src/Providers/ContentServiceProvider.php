<?php
namespace App\Providers;

class ContentServiceProvider
{
	public function __construct()
    {
        add_filter('timber/context', [$this, 'addServices']);
    }
	
	public function addServices($context)
    {
        $context['services'] = \Timber\Timber::get_posts([
                'post_type'     => 'service'
        ]);
        
        return $context;
    }
}
