<?php

namespace Learn1\Faq\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Class UpgradeSchema
 * @package Learn1\Faq\Setup
 */
class UpgradeSchema implements UpgradeSchemaInterface
{

    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            $setup->getConnection()->dropColumn($setup->getTable('faq_category'), 'ordering');
            $setup->getConnection()->dropColumn($setup->getTable('faq'), 'ordering');
        }
        if (version_compare($context->getVersion(), '1.0.2', '<')) {
            $tableName = $setup->getTable('faq_category');
            if ($setup->getConnection()->isTableExists($tableName) == true) {
                $connection = $setup->getConnection();
                $connection->addColumn($tableName,
                    'sort_order',
                    [
                        'type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        'nullable' => false,
                        'afters' => 'name',
                        'comment' =>'Sort Order'
                    ]
                );
            }
            $tableName = $setup->getTable('faq');
            if ($setup->getConnection()->isTableExists($tableName) == true) {
                $connection = $setup->getConnection();
                $connection->addColumn($tableName,
                    'sort_order',
                    [
                        'type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        'nullable' => false,
                        'afters' => 'metadescription',
                        'comment' =>'Sort Order'
                    ]
                );
            }
        }
    }
}

?>