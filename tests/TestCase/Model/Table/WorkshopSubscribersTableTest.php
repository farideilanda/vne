<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WorkshopSubscribersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WorkshopSubscribersTable Test Case
 */
class WorkshopSubscribersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WorkshopSubscribersTable
     */
    public $WorkshopSubscribers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.workshop_subscribers',
        'app.worshops'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('WorkshopSubscribers') ? [] : ['className' => WorkshopSubscribersTable::class];
        $this->WorkshopSubscribers = TableRegistry::get('WorkshopSubscribers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->WorkshopSubscribers);

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
