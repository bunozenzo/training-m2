<?php
namespace Learn8\Student\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Class InstallSchema
 * @package Learn8\Student\Setup
 */
class  InstallSchema implements InstallSchemaInterface{

    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        // TODO: Implement install() method.
        $installer = $setup;
        $installer->startSetup();
        $table = $installer->getConnection()->newTable($installer->getTable('student'))
            ->addColumn(
                'id',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'ID'
            )->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => ''],
                'Name'
            )->addColumn(
                'class',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => ''],
                'Class'
            )->addColumn(
                'university',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => ''],
                'University'
            );
        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}

?>