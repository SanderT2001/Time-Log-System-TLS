<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OtherTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OtherTable Test Case
 */
class OtherTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OtherTable
     */
    public $Other;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.other',
        'app.log'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Other') ? [] : ['className' => OtherTable::class];
        $this->Other = TableRegistry::getTableLocator()->get('Other', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Other);

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
