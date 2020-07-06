<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShoppingTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShoppingTable Test Case
 */
class ShoppingTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ShoppingTable
     */
    protected $Shopping;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Shopping',
        'app.Users',
        'app.Products',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Shopping') ? [] : ['className' => ShoppingTable::class];
        $this->Shopping = TableRegistry::getTableLocator()->get('Shopping', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Shopping);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
