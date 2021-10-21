<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MarcasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MarcasTable Test Case
 */
class MarcasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MarcasTable
     */
    protected $Marcas;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Marcas',
        'app.Veiculos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Marcas') ? [] : ['className' => MarcasTable::class];
        $this->Marcas = $this->getTableLocator()->get('Marcas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Marcas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MarcasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MarcasTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
