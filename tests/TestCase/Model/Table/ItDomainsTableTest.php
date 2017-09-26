<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItDomainsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItDomainsTable Test Case
 */
class ItDomainsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ItDomainsTable
     */
    public $ItDomains;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.it_domains',
        'app.cross_domain_solutions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ItDomains') ? [] : ['className' => ItDomainsTable::class];
        $this->ItDomains = TableRegistry::get('ItDomains', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ItDomains);

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
