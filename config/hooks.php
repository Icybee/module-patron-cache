<?php

namespace Icybee\Modules\PatronCache;

$hooks = Hooks::class . '::';

return [

	'patron.markups' => [

		'cached' => [ $hooks . 'markup_cached' , [

		] ]

	]
];
