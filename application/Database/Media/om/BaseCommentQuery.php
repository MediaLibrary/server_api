<?php

namespace Database\Media\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelCollection;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use Database\Media\Comment;
use Database\Media\CommentPeer;
use Database\Media\CommentQuery;
use Database\Media\Media;
use Database\User\User;

/**
 * Base class that represents a query for the 'media_library_media_comment' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.7.1 on:
 *
 * Tue Aug 18 22:37:00 2015
 *
 * @method CommentQuery orderById($order = Criteria::ASC) Order by the id column
 * @method CommentQuery orderByMediaId($order = Criteria::ASC) Order by the media_id column
 * @method CommentQuery orderByParentCommentId($order = Criteria::ASC) Order by the parent_comment_id column
 * @method CommentQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method CommentQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method CommentQuery orderByComment($order = Criteria::ASC) Order by the comment column
 *
 * @method CommentQuery groupById() Group by the id column
 * @method CommentQuery groupByMediaId() Group by the media_id column
 * @method CommentQuery groupByParentCommentId() Group by the parent_comment_id column
 * @method CommentQuery groupByUserId() Group by the user_id column
 * @method CommentQuery groupByCreateDate() Group by the create_date column
 * @method CommentQuery groupByComment() Group by the comment column
 *
 * @method CommentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CommentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CommentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CommentQuery leftJoinMedia($relationAlias = null) Adds a LEFT JOIN clause to the query using the Media relation
 * @method CommentQuery rightJoinMedia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Media relation
 * @method CommentQuery innerJoinMedia($relationAlias = null) Adds a INNER JOIN clause to the query using the Media relation
 *
 * @method CommentQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method CommentQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method CommentQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method Comment findOne(PropelPDO $con = null) Return the first Comment matching the query
 * @method Comment findOneOrCreate(PropelPDO $con = null) Return the first Comment matching the query, or a new Comment object populated from the query conditions when no match is found
 *
 * @method Comment findOneByMediaId(string $media_id) Return the first Comment filtered by the media_id column
 * @method Comment findOneByParentCommentId(string $parent_comment_id) Return the first Comment filtered by the parent_comment_id column
 * @method Comment findOneByUserId(string $user_id) Return the first Comment filtered by the user_id column
 * @method Comment findOneByCreateDate(string $create_date) Return the first Comment filtered by the create_date column
 * @method Comment findOneByComment(string $comment) Return the first Comment filtered by the comment column
 *
 * @method array findById(string $id) Return Comment objects filtered by the id column
 * @method array findByMediaId(string $media_id) Return Comment objects filtered by the media_id column
 * @method array findByParentCommentId(string $parent_comment_id) Return Comment objects filtered by the parent_comment_id column
 * @method array findByUserId(string $user_id) Return Comment objects filtered by the user_id column
 * @method array findByCreateDate(string $create_date) Return Comment objects filtered by the create_date column
 * @method array findByComment(string $comment) Return Comment objects filtered by the comment column
 *
 * @package    propel.generator.Media.om
 */
abstract class BaseCommentQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCommentQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'mediaLibrary';
        }
        if (null === $modelName) {
            $modelName = 'Database\\Media\\Comment';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CommentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   CommentQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CommentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CommentQuery) {
            return $criteria;
        }
        $query = new CommentQuery(null, null, $modelAlias);

        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Comment|Comment[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CommentPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Comment A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneById($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Comment A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT id, media_id, parent_comment_id, user_id, create_date, comment FROM media_library_media_comment WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Comment();
            $obj->hydrate($row);
            CommentPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Comment|Comment[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Comment[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return CommentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CommentPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CommentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CommentPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById('fooValue');   // WHERE id = 'fooValue'
     * $query->filterById('%fooValue%'); // WHERE id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $id The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CommentQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($id)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $id)) {
                $id = str_replace('*', '%', $id);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CommentPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the media_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMediaId('fooValue');   // WHERE media_id = 'fooValue'
     * $query->filterByMediaId('%fooValue%'); // WHERE media_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mediaId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CommentQuery The current query, for fluid interface
     */
    public function filterByMediaId($mediaId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mediaId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mediaId)) {
                $mediaId = str_replace('*', '%', $mediaId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CommentPeer::MEDIA_ID, $mediaId, $comparison);
    }

    /**
     * Filter the query on the parent_comment_id column
     *
     * Example usage:
     * <code>
     * $query->filterByParentCommentId('fooValue');   // WHERE parent_comment_id = 'fooValue'
     * $query->filterByParentCommentId('%fooValue%'); // WHERE parent_comment_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $parentCommentId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CommentQuery The current query, for fluid interface
     */
    public function filterByParentCommentId($parentCommentId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($parentCommentId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $parentCommentId)) {
                $parentCommentId = str_replace('*', '%', $parentCommentId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CommentPeer::PARENT_COMMENT_ID, $parentCommentId, $comparison);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId('fooValue');   // WHERE user_id = 'fooValue'
     * $query->filterByUserId('%fooValue%'); // WHERE user_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CommentQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $userId)) {
                $userId = str_replace('*', '%', $userId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CommentPeer::USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the create_date column
     *
     * Example usage:
     * <code>
     * $query->filterByCreateDate('2011-03-14'); // WHERE create_date = '2011-03-14'
     * $query->filterByCreateDate('now'); // WHERE create_date = '2011-03-14'
     * $query->filterByCreateDate(array('max' => 'yesterday')); // WHERE create_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $createDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CommentQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(CommentPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(CommentPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommentPeer::CREATE_DATE, $createDate, $comparison);
    }

    /**
     * Filter the query on the comment column
     *
     * Example usage:
     * <code>
     * $query->filterByComment('fooValue');   // WHERE comment = 'fooValue'
     * $query->filterByComment('%fooValue%'); // WHERE comment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comment The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CommentQuery The current query, for fluid interface
     */
    public function filterByComment($comment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comment)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $comment)) {
                $comment = str_replace('*', '%', $comment);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CommentPeer::COMMENT, $comment, $comparison);
    }

    /**
     * Filter the query by a related Media object
     *
     * @param   Media|PropelObjectCollection $media The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CommentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMedia($media, $comparison = null)
    {
        if ($media instanceof Media) {
            return $this
                ->addUsingAlias(CommentPeer::MEDIA_ID, $media->getId(), $comparison);
        } elseif ($media instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CommentPeer::MEDIA_ID, $media->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByMedia() only accepts arguments of type Media or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Media relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CommentQuery The current query, for fluid interface
     */
    public function joinMedia($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Media');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Media');
        }

        return $this;
    }

    /**
     * Use the Media relation Media object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Database\Media\MediaQuery A secondary query class using the current class as primary query
     */
    public function useMediaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMedia($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Media', '\Database\Media\MediaQuery');
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CommentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(CommentPeer::USER_ID, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CommentPeer::USER_ID, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUser() only accepts arguments of type User or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the User relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CommentQuery The current query, for fluid interface
     */
    public function joinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('User');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'User');
        }

        return $this;
    }

    /**
     * Use the User relation User object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Database\User\UserQuery A secondary query class using the current class as primary query
     */
    public function useUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'User', '\Database\User\UserQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Comment $comment Object to remove from the list of results
     *
     * @return CommentQuery The current query, for fluid interface
     */
    public function prune($comment = null)
    {
        if ($comment) {
            $this->addUsingAlias(CommentPeer::ID, $comment->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // create_entity behavior

    /**
     * @return Database\Media\Comment
     */
    public function createEntity()
    {
        return new Database\Media\Comment();
    }

}
