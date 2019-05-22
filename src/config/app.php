<?php
namespace App;

use App\Providers\ContentServiceProvider;
use App\Providers\CustomizerServiceProvider;
use App\Providers\MenuServiceProvider;
use App\Providers\PostTypeServiceProvider;

return [
	'providers'     => [
		MenuServiceProvider::class,
		PostTypeServiceProvider::class,
		CustomizerServiceProvider::class,
		ContentServiceProvider::class
	]
];
