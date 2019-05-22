<?php
namespace App\Providers;
class MenuServiceProvider
{
	protected $menus = [
		'primary-menu'      => 'Primary',
		'footer-menu'       => 'Footer menu',
	];
	
	public function __construct()
	{
		$this->boot();
	}
	
	public function boot(): void
	{
		\register_nav_menus($this->menus);
		
		add_filter('timber/context', [$this, 'registerContent']);
	}
	
	public function registerContent($content)
	{
		foreach ($this->menus as $key => $name) {
			$content[$this->transformName($key)] = new \Timber\Menu($key);
		}
		
		return $content;
	}
	
	private function transformName($name): string
	{
		return lcfirst(implode('', array_map('ucfirst', explode('-', $name))));
	}
}
