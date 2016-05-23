<?php

namespace Icybee\Modules\PatronCache;

$hooks = Hooks::class . '::';

return [

	\Icybee\Modules\Cache\CacheCollection::class . '::collect' => $hooks . 'on_collect_cache'

];
