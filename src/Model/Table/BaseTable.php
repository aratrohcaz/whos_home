<?php

namespace App\Model\Table;

use Phinx\Db\Table;

/**
 *
 * This object is based loosely on: http://api.rubyonrails.org/classes/ActiveRecord/ConnectionAdapters/Table.html.
 */
class BaseTable extends Table
{

    /**
     * Add indexes to table
     *
     * Is a bit of a work in progress, next step is to add abiltiy to declare
     * the indexes in the migration easier, along with their types
     * @return Table|$this
     */
    public function autoIndex($index_prefix = null)
    {
      if ($index_prefix === null || !is_string($index_prefix)) {
        $index_prefix = $this->getName();
      }
      $index_prefix .= '_I_';
      // TODO: Add auto indexing for id column

      // TODO: Add auto indexing for timestamps

      // get the FK columns and index them
      foreach ($this->getForeignKeys() as $foreign_key) {
        /* @var Phinx\Db\Table\ForeignKey $foreign_key */
        foreach ($foreign_key->getColumns() as $column) {
          $nice_index_name = $index_prefix.$column;
          // TODO: Double check that if the index name changes it doesn't fail
          if (!$this->hasIndex($column)) {
            $this->addIndex([$column], ['name' => $nice_index_name]);
          }
        }
      }
        return $this;
    }

    /**
     * Add a foreign key to a database table and creates the column if needed
     *
     * In $options you can specify on_delete|on_delete = cascade|no_action ..,
     * on_update, constraint = constraint name.
     *
     * @param string|array $columns Columns
     * @param string|Table $referencedTable   Referenced Table
     * @param string        $columnType       The column type of the foreign key (integer|uuid) **UUID is untested**
     * @param string|array $referencedColumns Referenced Columns
     * @param array $options Options
     * @return Table
     */
    public function addForeignKey($columns, $referencedTable, $columnType = 'integer', $referencedColumns = array('id'), $options = array())
    {
        if (is_string($referencedColumns)) {
            $referencedColumns = array($referencedColumns); // str to array
        }

        if (is_string($columns)) {
            $columns = array($columns);
        }

        foreach ($columns as $column) {
          if (!$this->hasColumn($column)) {
            $this->addColumn($column, $columnType);
          }
        }

        return parent::addForeignKey($columns, $referencedTable, $referencedColumns, $options);
    }
}
