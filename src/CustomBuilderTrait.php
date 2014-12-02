<?php
namespace Fruty\LaravelModelBuilder;

use Illuminate\Database\Eloquent\Builder;

/**
 * Trait CustomBuilderTrait
 * @package Fruty\LaravelModelBuilder
 * @author Fruty <ed.fruty@gmail.com>
 */
trait CustomBuilderTrait 
{
    /**
     * @param $query
     * @return Builder
     * @throws \RuntimeException
     */
    public function newEloquentBuilder($query)
    {
        static $class;
        if (! $class) {
            $class = \Config::get('ed-fruty/custom-model-builder::main.builderClass');
        }

        $builder = new $class($query);

        if ($builder instanceof Builder === false) {
            throw new \RuntimeException("Builder class must extend 'Illuminate\\Database\\Eloquent\\Builder' class", 500);
        }
        return $builder;
    }
} 