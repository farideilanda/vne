<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItEditorSolutionTrainingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItEditorSolutionTrainingsTable Test Case
 */
class ItEditorSolutionTrainingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ItEditorSolutionTrainingsTable
     */
    public $ItEditorSolutionTrainings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.it_editor_solution_trainings',
        'app.it_editor_solutions',
        'app.it_editors'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ItEditorSolutionTrainings') ? [] : ['className' => ItEditorSolutionTrainingsTable::class];
        $this->ItEditorSolutionTrainings = TableRegistry::get('ItEditorSolutionTrainings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ItEditorSolutionTrainings);

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
