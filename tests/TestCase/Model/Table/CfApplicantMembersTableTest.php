<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CfApplicantMembersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CfApplicantMembersTable Test Case
 */
class CfApplicantMembersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CfApplicantMembersTable
     */
    public $CfApplicantMembers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CfApplicantMembers_1',
        'app.Vaccancies',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CfApplicantMembers_1') ? [] : ['className' => CfApplicantMembersTable::class];
        $this->CfApplicantMembers = TableRegistry::getTableLocator()->get('CfApplicantMembers_1', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CfApplicantMembers);

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
