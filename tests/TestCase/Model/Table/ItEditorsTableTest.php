<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItEditorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItEditorsTable Test Case
 */
class ItEditorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ItEditorsTable
     */
    public $ItEditors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.it_editors',
        'app.it_editor_solutions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ItEditors') ? [] : ['className' => ItEditorsTable::class];
        $this->ItEditors = TableRegistry::get('ItEditors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ItEditors);

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
