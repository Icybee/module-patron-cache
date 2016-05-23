<?php

namespace Icybee\Modules\PatronCache;

use ICanBoogie\ActiveRecord;
use ICanBoogie\ActiveRecord\Model;
use ICanBoogie\Module\Descriptor;

return [

	Descriptor::TITLE => "Patron cache",
	Descriptor::DESCRIPTION => "Cache rendered template fragments",
	Descriptor::MODELS => [

		'fragments' => [

			Model::ACTIVERECORD_CLASS => ActiveRecord::class,
			Model::CLASSNAME => Model::class,
			Model::CONNECTION => 'local',
			Model::SCHEMA => [

				'hash' => [ 'char', 64, 'primary' => true, 'charset' => 'ascii/bin' ],
				'data' => [ 'text' ],
				'date' => [ 'timestamp', 'default' => 'CURRENT_TIMESTAMP' ]

			]

		]

	],

	Descriptor::NS => __NAMESPACE__

];
