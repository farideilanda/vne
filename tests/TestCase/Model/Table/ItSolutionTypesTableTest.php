<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItSolutionTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItSolutionTypesTable Test Case
 */
class ItSolutionTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ItSolutionTypesTable
     */
    public $ItSolutionTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.it_solution_types',
        'app.cross_solution_types',
        'app.it_solutions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ItSolutionTypes') ? [] : ['className' => ItSolutionTypesTable::class];
        $this->ItSolutionTypes = TableRegistry::get('ItSolutionTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ItSolutionTypes);

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
