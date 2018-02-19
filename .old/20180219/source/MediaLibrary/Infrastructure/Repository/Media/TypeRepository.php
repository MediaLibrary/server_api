<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-09-24
 */
namespace MediaLibrary\Infrastructure\Repository\Media;

use Exception;
use MediaLibrary\Domain\Model\Media\Type;
use MediaLibrary\Domain\Model\Media\TypeQuery;
use PropelException;
use PropelObjectCollection;

class TypeRepository
{
    /** @var TypeQuery */
    private $query;

    /**
     * @param TypeQuery $query
     */
    public function __construct(TypeQuery $query)
    {
        $this->query = $query;
    }

    /**
     * @return Type
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
     * @return null|Type
     */
    public function findOne()
    {
        return $this->query->findOne();
    }

    /**
     * @return array|mixed|PropelObjectCollection|Type[]
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
     * @param Type|Type[] $entityOrCollection
     * @throws Exception
     * @throws PropelException
     */
    public function save($entityOrCollection)
    {
        if ($entityOrCollection instanceof Type) {
            $entityOrCollection->save();
        } else {
            foreach ($entityOrCollection as $entity) {
                $entity->save();
            }
        }
    }
}