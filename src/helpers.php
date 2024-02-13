<?php

namespace Bluerock\Sellsy;

use InvalidArgumentException;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;
use Bluerock\Sellsy\Api\AbstractApi;
use Bluerock\Sellsy\Entities\Entity;

if (!function_exists('\Bluerock\Sellsy\class_to_endpoint')) :

	/**
	 * Guess the API endpoint from the given API class
	 *
	 * @param AbstractApi | Entity $relatedApi
	 */
	function class_to_endpoint($subject): string
	{
		if (!is_a($subject, AbstractApi::class) && !is_a($subject, Entity::class)) {
			throw new InvalidArgumentException('Only for entities and api');
		}

		$className = get_class($subject);

		return (string) Str::of($className)
			->afterLast('\\')
			->whenEndsWith('Api', fn (Stringable $string) => $string->replaceLast('Api', ''))
			->kebab()
			->lower()
			->plural();
	}

endif;