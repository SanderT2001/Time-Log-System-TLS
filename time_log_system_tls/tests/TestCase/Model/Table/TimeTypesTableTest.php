<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TimeTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TimeTypesTable Test Case
 */
class TimeTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TimeTypesTable
     */
    public $TimeTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.time_types',
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
        $config = TableRegistry::getTableLocator()->exists('TimeTypes') ? [] : ['className' => TimeTypesTable::class];
        $this->TimeTypes = TableRegistry::getTableLocator()->get('TimeTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TimeTypes);

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
}
