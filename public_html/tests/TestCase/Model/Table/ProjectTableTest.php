<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectTable Test Case
 */
class ProjectTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectTable
     */
    public $Project;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.project',
        'app.client',
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
        $config = TableRegistry::getTableLocator()->exists('Project') ? [] : ['className' => ProjectTable::class];
        $this->Project = TableRegistry::getTableLocator()->get('Project', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Project);

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
