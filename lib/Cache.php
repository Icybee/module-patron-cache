<?php

namespace Icybee\Modules\PatronCache;

use ICanBoogie\ActiveRecord\Model;
use ICanBoogie\DateTime;
use ICanBoogie\ToArray;
use ICanBoogie\ToArrayRecursive;

class Cache
{
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
	 * @param mixed $subject
	 * @param mixed $template
	 * @param callable $build
	 * @param int $ttl
	 *
	 * @return string
	 */
	public function __invoke($subject, $template, callable $build, int $ttl = 72)
	{
		$model = $this->model;
		$hash = $this->hash($this->serialize_subject($subject), $template);

		$record = $model->where('hash = ? AND date > ?', $hash, DateTime::from("-$ttl hour"))->one;

		if ($record)
		{
			return $record->data;
		}

		$html = $build();

		$model->new([

			'hash' => $hash,
			'data' => $html,
			'date' => DateTime::now()

		])->save();

		return $html;
	}

	/**
	 * @param $subject
	 *
	 * @return string
	 */
	protected function serialize_subject($subject)
	{
		if ($subject instanceof \JsonSerializable)
		{
			$subject = json_encode($subject);
		}
		else if ($subject instanceof ToArrayRecursive)
		{
			$subject = $subject->to_array_recursive();
		}
		else if ($subject instanceof ToArray)
		{
			$subject = $subject->to_array();
		}

		if (!is_string($subject))
		{
			$subject = serialize($subject);
		}

		return $subject;
	}

	/**
	 * @param string $serialized_subject
	 * @param mixed $template
	 *
	 * @return string
	 */
	protected function hash($serialized_subject, $template)
	{
		return hash('sha256', $serialized_subject . serialize($template));
	}
}
