<?php

namespace Learn1\Faq\Setup;

use \Magento\Framework\Setup\InstallSchemaInterface;
use \Magento\Framework\Setup\ModuleContextInterface;
use \Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {

        $installer = $setup;

        $installer->startSetup();
        /**
         * Create table faq_category
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('faq_category')
        )->addColumn(
            'category_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'category_id ID'
        )->addColumn(
            'name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false, 'default' => ''],
            'Name'
        )->addColumn(
            'ordering',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            255,
            ['nullable' => false, 'default' => '1'],
            'Ordering'
        )->addColumn(
            'status',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['nullable' => false, 'default' => '1'],
            'Status'
        );
        $installer->getConnection()->createTable($table);

        /**
         * create table faq
         */

        $table = $installer->getConnection()->newTable(
            $installer->getTable('faq')
        )->addColumn(
            'faq_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'faq_id ID'
        )->addColumn(
            'title',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false, 'default' => ''],
            'Title'
        )->addColumn(
            'category_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['nullable' => false, 'unsigned' => true],
            'Category Id'
        )->addColumn(
            'description',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            ['nullable' => true],
            'Description'
        )->addColumn(
            'status',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['nullable' => false, 'default' => '1'],
            'Status'
        )->addColumn(
            'created_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
            null,
            ['nullable' => true],
            'Created Time'
        )->addColumn(
            'updated_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
            null,
            ['nullable' => true],
            'Updated Time'
        )->addColumn(
            'url_key',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false, 'default' => ''],
            'Url Key'
        )->addColumn(
            'ordering',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            255,
            ['nullable' => false, 'default' => '0'],
            'Ordering'
        )->addColumn(
            'most_frequently',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['nullable' => false, 'default' => '1'],
            'Most Frequently'
        )->addColumn(
            'tag',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            255,
            ['nullable' => false, 'default' => '0'],
            'Tag'
        )->addColumn(
            'metakeyword',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            ['nullable' => false, 'default' => ''],
            'Metakeyword'
        )->addColumn(
            'metadescription',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            ['nullable' => false, 'default' => ''],
            'Metadescription'
        )->addForeignKey(
            $installer->getFkName(
                'faq',
                'category_id',
                'faq_category',
                'category_id'
            ),
            'category_id',
            $installer->getTable('faq_category'),
            'category_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        );

        $installer->getConnection()->createTable($table);

        /**
         * Create table faq_value
         */

        $table = $installer->getConnection()->newTable(
            $installer->getTable('faq_value')
        )->addColumn(
            'faq_value_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'faq_value_id ID'
        )->addColumn(
            'faq_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['nullable' => false, 'unsigned' => true],
            'Faq Id'
        )->addColumn(
            'store_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['nullable' => false, 'unsigned' => true],
            'Store Id'
        )->addColumn(
            'attribute_code',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false, 'default' => ''],
            'Attribute Code'
        )->addColumn(
            'value',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            ['nullable' => false, 'default' => ''],
            'Value'
        )->addForeignKey(
            $installer->getFkName(
                'faq_value',
                'faq_id',
                'faq',
                'faq_id'
            ),
            'faq_id',
            $installer->getTable('faq'),
            'faq_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        )->addForeignKey(
            $installer->getFkName(
                'faq_value',
                'store_id',
                'store',
                'store_id'
            ),
            'store_id',
            $installer->getTable('store'),
            'store_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        );

        $installer->getConnection()->createTable($table);

        /**
         * Create table faq_category_value
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('faq_category_value')
        )->addColumn(
            'category_value_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'category_value_id ID'
        )->addColumn(
            'category_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['nullable' => false, 'unsigned' => true],
            'Category Id'
        )->addColumn(
            'store_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['nullable' => false, 'unsigned' => true],
            'Store Id'
        )->addColumn(
            'attribute_code',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false, 'default' => ''],
            'Attribute Code'
        )->addColumn(
            'value',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            ['nullable' => false, 'default' => ''],
            'value'
        )->addForeignKey(
            $installer->getFkName(
                'faq_category_value',
                'category_id',
                'faq_category',
                'category_id'
            ),
            'category_id',
            $installer->getTable('faq_category'),
            'category_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        )->addForeignKey(
            $installer->getFkName(
                'faq_category_value',
                'store_id',
                'store',
                'store_id'
            ),
            'store_id',
            $installer->getTable('store'),
            'store_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        );

        $installer->getConnection()->createTable($table);

        /**
         * End
         */
        $installer->endSetup();
    }
}

?>