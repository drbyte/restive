<?php

namespace Restive\Parsers;

use Illuminate\Database\Eloquent\Builder;
use Restive\Exceptions\ApiException;

class ParserOnlyTrashed extends ParserAbstract
{
    public function tokenizeParameters(string $parameters)
    {
        $this->tokenized[] = '';
    }

    public function prepareQuery(Builder $eloquentBuilder): Builder
    {
        try {
            $eloquentBuilder = $eloquentBuilder->onlyTrashed();
        } catch (\BadMethodCallException $e) {
            throw new ApiException('Model does not support soft deletes');
        }
        return $eloquentBuilder;
    }
}
