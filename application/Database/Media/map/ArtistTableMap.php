<?php

namespace Database\Media\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'media_library_media_artists' table.
 *
 *
 * This class was autogenerated by Propel 1.7.1 on:
 *
 * Mon Jun 22 15:48:38 2015
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.Media.map
 */
class ArtistTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Media.map.ArtistTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('media_library_media_artists');
        $this->setPhpName('Artist');
        $this->setClassname('Database\\Media\\Artist');
        $this->setPackage('Media');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id', 'Id', 'CHAR', true, 36, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 80, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('MediaToArtist', 'Database\\Media\\MediaToArtist', RelationMap::ONE_TO_MANY, array('id' => 'artist_id', ), null, null, 'MediaToArtists');
    } // buildRelations()

} // ArtistTableMap
