<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CrossSolutionTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CrossSolutionTypesTable Test Case
 */
class CrossSolutionTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CrossSolutionTypesTable
     */
    public $CrossSolutionTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cross_solution_types',
        'app.it_solutions',
        'app.it_solution_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CrossSolutionTypes') ? [] : ['className' => CrossSolutionTypesTable::class];
        $this->CrossSolutionTypes = TableRegistry::get('CrossSolutionTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CrossSolutionTypes);

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
