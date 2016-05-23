<?php

namespace Icybee\Modules\PatronCache;

use ICanBoogie\ActiveRecord\Model;
use function ICanBoogie\app;

class CacheManager implements \Icybee\Modules\Cache\CacheManager
{
	public $title = "Patron templates";
	public $description = "The rendered Patron templates.";
	public $group = 'contents';
	public $state = null;
	public $config_preview = false;

	/**
	 * @var Model
	 */
	private $model;

	/**
	 * @param Model $model
	 */
	public function __construct(Model $model)
	{
		$this->model = $model;
	}

	/**
	 * Clears the cache.
	 */
	public function clear()
	{
		return $this->model->truncate();
	}

	/**
	 * Disables the cache.
	 */
	public function disable()
	{
		// TODO: Implement disable() method.
	}

	/**
	 * Enables the cache.
	 */
	public function enable()
	{
		// TODO: Implement enable() method.
	}

	/**
	 * Return stats about the cache.
	 */
	public function stat()
	{
		list($count, $size) = $this->model
			->select('COUNT(hash), SUM(LENGTH(data))')
			->one(\PDO::FETCH_NUM);

		return [

			(int) $count,
			app()->translate(':count items<br /><span class="small">:size</span>', [

				':count' => (int) $count,
				'size' => \ICanBoogie\I18n\format_size($size)

			])

		];
	}
}
