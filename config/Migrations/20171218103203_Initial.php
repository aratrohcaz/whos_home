<?php
use Migrations\AbstractMigration;
use App\Model\Table\BaseTable;

class Initial extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
      // Creating the network host table
      $network_hosts = new BaseTable('network_hosts', [], $this->getAdapter());
      $network_hosts
      ->addColumn('name', 'string', ['limit' => 128, 'default' => 'Unknown Device'])
      ->addColumn('mac_address', 'string', ['limit' => 17, 'comment' => 'Include colon'])
      ->addColumn('notes', 'text', ['null' => true])
      ->addColumn('first_seen_at', 'timestamp', ['null' => true, 'comment' => 'Later maybe allow the user to create new objects'])
      ->addColumn('last_seen_at', 'timestamp', ['null' => true])
      ->addTimestamps()
      ->autoIndex()
      ->addIndex(['mac_address'])
      ->create();

      // create the scan data table
      $scans = new BaseTable('scans', [], $this->getAdapter());
      $scans
      ->addColumn('start_at', 'timestamp', ['null' => false])
      ->addTimestamps()
      ->autoIndex()
      ->create();

      $scan_results = new BaseTable('scan_results', [], $this->getAdapter());
      $scan_results
      ->addForeignKey('scan_id', 'scans', 'integer', 'id', ['delete' => 'restrict'])
      ->addForeignKey('network_host_id', 'network_hosts', 'integer', 'id', ['delete' => 'restrict'])
      ->addTimestamps()
      ->autoIndex()
      ->create();
    }

    public function down()
    {
        $scan_results = new BaseTable('scan_results', [], $this->getAdapter());
        $scan_results->drop();

        $scans = new BaseTable('scans', [], $this->getAdapter());
        $scans->drop();

        $network_hosts = new BaseTable('network_hosts', [], $this->getAdapter());
        $network_hosts->drop();
    }
}
