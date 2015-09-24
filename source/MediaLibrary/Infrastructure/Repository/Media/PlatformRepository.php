<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-09-24
 */
namespace MediaLibrary\Infrastructure\Repository\Media;

use MediaLibrary\Domain\Model\Media\Platform;
use MediaLibrary\Domain\Model\Media\PlatformQuery;
use Exception;
use PropelException;
use PropelObjectCollection;

class PlatformRepository
{
    /** @var PlatformQuery */
    private $query;

    /**
     * @param PlatformQuery $query
     */
    public function __construct(PlatformQuery $query)
    {
        $this->query = $query;
    }

    /**
     * @return Platform
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
     * @return null|Platform
     */
    public function findOne()
    {
        return $this->query->findOne();
    }

    /**
     * @return array|mixed|PropelObjectCollection|Platform[]
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
     * @param Platform|Platform[] $entityOrCollection
     * @throws Exception
     * @throws PropelException
     */
    public function save($entityOrCollection)
    {
        if ($entityOrCollection instanceof Platform) {
            $entityOrCollection->save();
        } else {
            foreach ($entityOrCollection as $entity) {
                $entity->save();
            }
        }
    }
}