<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-09-24
 */
namespace MediaLibrary\Infrastructure\Repository\Media;

use MediaLibrary\Domain\Model\Media\Language;
use MediaLibrary\Domain\Model\Media\LanguageQuery;
use Exception;
use PropelException;
use PropelObjectCollection;

class LanguageRepository
{
    /** @var LanguageQuery */
    private $query;

    /**
     * @param LanguageQuery $query
     */
    public function __construct(LanguageQuery $query)
    {
        $this->query = $query;
    }

    /**
     * @return Language
     */
    public function create()
    {
        return $this->query->createEntity();
    }

    /**
     * @param int $id
     */
    public function filterById($id)
    {
        $this->query->filterById($id);
    }

    /**
     * @param string $name
     */
    public function filterByName($name)
    {
        $this->query->filterByName($name);
    }

    /**
     * @return bool
     */
    public function hasOne()
    {
        return ($this->query->count() == 1);
    }

    /**
     * @return bool
     */
    public function hasMany()
    {
        return ($this->query->count() >= 1);
    }

    /**
     * @return null|Language
     */
    public function findOne()
    {
        return $this->query->findOne();
    }

    /**
     * @return array|mixed|PropelObjectCollection|Language[]
     */
    public function findMany()
    {
        return $this->query->find();
    }

    /**
     * @return integer the number of deleted rows
     * @throws Exception
     * @throws PropelException
     */
    public function delete()
    {
        return $this->query->delete();
    }

    /**
     * @param Language|Language[] $entityOrCollection
     * @throws Exception
     * @throws PropelException
     */
    public function save($entityOrCollection)
    {
        if ($entityOrCollection instanceof Language) {
            $entityOrCollection->save();
        } else {
            foreach ($entityOrCollection as $entity) {
                $entity->save();
            }
        }
    }
}