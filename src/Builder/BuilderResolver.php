<?php

namespace App\Builder;

class BuilderResolver
{
    /**
     * @var array
     */
    private $builders = [];

    /**
     * @param StatusBuilderInterface $builder
     */
    public function addBuilder(StatusBuilderInterface $builder)
    {
        array_push($this->builders, $builder);
    }

    /**
     * @param string $format
     *
     * @return StatusBuilderInterface
     *
     * @throws \Exception
     */
    public function getBuilder(string $format) : StatusBuilderInterface
    {
        /**
         * StatusBuilderInterface $builder
         */
        foreach ($this->builders as $builder)
        {
            if ($builder->isFormatMatch($format)) {
                return $builder;
            }
        }

        throw new \Exception(sprintf('No builder could be found with format %s.', $format));
    }
}