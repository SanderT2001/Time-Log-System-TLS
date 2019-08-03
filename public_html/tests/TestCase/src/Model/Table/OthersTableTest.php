<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OthersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OthersTable Test Case
 */
class OthersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OthersTable
     */
    public $Others;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.others',
        'app.clients',
        'app.logs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Others') ? [] : ['className' => OthersTable::class];
        $this->Others = TableRegistry::getTableLocator()->get('Others', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Others);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
