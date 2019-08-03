<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AssignmentTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AssignmentTable Test Case
 */
class AssignmentTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AssignmentTable
     */
    public $Assignment;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.assignment',
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
        $config = TableRegistry::getTableLocator()->exists('Assignment') ? [] : ['className' => AssignmentTable::class];
        $this->Assignment = TableRegistry::getTableLocator()->get('Assignment', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Assignment);

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
