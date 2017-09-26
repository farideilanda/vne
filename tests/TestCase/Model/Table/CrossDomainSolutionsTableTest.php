<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CrossDomainSolutionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CrossDomainSolutionsTable Test Case
 */
class CrossDomainSolutionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CrossDomainSolutionsTable
     */
    public $CrossDomainSolutions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cross_domain_solutions',
        'app.it_domains',
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
        $config = TableRegistry::exists('CrossDomainSolutions') ? [] : ['className' => CrossDomainSolutionsTable::class];
        $this->CrossDomainSolutions = TableRegistry::get('CrossDomainSolutions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CrossDomainSolutions);

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
