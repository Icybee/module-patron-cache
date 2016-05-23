<?php

namespace Icybee\Modules\PatronCache;

use ICanBoogie\ActiveRecord\Model;
use Icybee\Modules\Cache\CacheCollection;
use Patron\Engine as Patron;

use function ICanBoogie\app;

class Hooks
{
	/*
	 * Events
	 */

	/**
	 * @param CacheCollection\CollectEvent $event
	 * @param CacheCollection $target
	 */
	static public function on_collect_cache(CacheCollection\CollectEvent $event, CacheCollection $target)
	{
		$event->collection['patron.fragments'] = new CacheManager(self::get_fragments_model());
	}

	/**
	 * @param array $args
	 * @param Patron $engine
	 * @param mixed $template
	 *
	 * @return string
	 */
	static public function markup_cached(array $args, Patron $engine, $template)
	{
		$subject = $engine->context['this'];
		$cache = new Cache(self::get_fragments_model());

		return $cache($subject, $template, function () use ($engine, $template) {

			return $engine($template);

		});
	}

	/*
	 * Support
	 */

	/**
	 * @return Model
	 */
	static private function get_fragments_model()
	{
		return app()->models['patron.cache/fragments'];
	}
}
