<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-09-24
 */
namespace MediaLibrary\Infrastructure\Repository\Media;

class EditionRepositoryFactory extends AbstractRepositoryFactory
{
    public function create()
    {
        $query = $this->locator->getEntityInstantiator()->createEditionQuery();

        return new EditionRepository($query);
    }
}