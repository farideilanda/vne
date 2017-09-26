<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItEditorSolutionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItEditorSolutionsTable Test Case
 */
class ItEditorSolutionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ItEditorSolutionsTable
     */
    public $ItEditorSolutions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.it_editor_solutions',
        'app.it_editors',
        'app.it_editor_solution_trainings'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ItEditorSolutions') ? [] : ['className' => ItEditorSolutionsTable::class];
        $this->ItEditorSolutions = TableRegistry::get('ItEditorSolutions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ItEditorSolutions);

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
