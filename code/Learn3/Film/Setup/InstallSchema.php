<?php

namespace Learn3\Film\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Class InstallSchema
 * @package Magestore\Faq\Setup
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws \Zend_Db_Exception
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        /*
         * Drop tables if exists
         */
//        $installer->getConnection()->dropTable($installer->getTable('zero_training_four_category'));
//        $installer->getConnection()->dropTable($installer->getTable('zero_training_four_actor'));
//        $installer->getConnection()->dropTable($installer->getTable('zero_training_four_film'));
//        $installer->getConnection()->dropTable($installer->getTable('zero_training_four_film_category'));
//        $installer->getConnection()->dropTable($installer->getTable('zero_training_four_film_actor'));
        $table = $installer->getConnection()->newTable(
            $installer->getTable('zero_training_four_category')
        )->addColumn(
            'category_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
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
            'created_at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => true],
            'Created At'
        )->addColumn(
            'updated at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => true],
            'Update At'
        );
        $installer->getConnection()->createTable($table);
        $table = $installer->getConnection()->newTable(
            $installer->getTable('zero_training_four_actor')
        )->addColumn(
            'actor_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'ID'
        )->addColumn(
            'first_name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false, 'default' => ''],
            'First_Name'
        )->addColumn(
            'last_name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false, 'default' => ''],
            'Last_Name'
        )->addColumn(
            'created_at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => true],
            'Created At'
        )->addColumn(
            'updated at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => true],
            'Update At'
        );
        $installer->getConnection()->createTable($table);
        $table = $installer->getConnection()->newTable(
            $installer->getTable('zero_training_four_film')
        )->addColumn(
            'film_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'ID'
        )->addColumn(
            'title',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false, 'default' => ''],
            'Title'
        )->addColumn(
            'description',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            ['nullable' => false, 'default' => ''],
            'Last_Name'
        )->addColumn(
            'language_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            5,
            ['nullable' => false, 'unsigned' => true],
            'Language Id'
        )->addColumn(
            'original_language_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            5,
            ['nullable' => false, 'unsigned' => true],
            'Original Language Id'
        )->addColumn(
            'rental_duration',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            5,
            ['nullable' => false, 'unsigned' => true],
            'Rental Duration'
        )->addColumn(
            'rental_rate',
            \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
            '4,2',
            ['nullable' => false, 'unsigned' => true],
            'Rental Rate'
        )->addColumn(
            'length',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            5,
            ['nullable' => false],
            'Length'
        )->addColumn(
            'replacement_cost',
            \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
            '4,2',
            ['nullable' => false, 'unsigned' => true],
            'Replacement Cost'
        )->addColumn(
            'created_at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => true],
            'Created At'
        )->addColumn(
            'updated at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => true],
            'Update At'
        );
        $installer->getConnection()->createTable($table);
        $table = $installer->getConnection()->newTable(
            $installer->getTable('zero_training_four_film_category')
        )->addColumn(
            'film_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['nullable' => false, 'unsigned' => true],
            'Film Id'
        )->addColumn(
            'category_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['nullable' => false, 'unsigned' => true],
            'Category Id'
        )->addForeignKey(
            $installer->getFkName(
                'zero_training_four_film_category',
                'category_id',
                'zero_training_four_category',
                'category_id'
            ),
            'category_id',
            $installer->getTable('zero_training_four_category'),
            'category_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        )->addForeignKey(
            $installer->getFkName(
                'zero_training_four_film_category',
                'film_id',
                'zero_training_four_film',
                'film_id'
            ),
            'film_id',
            $installer->getTable('zero_training_four_film'),
            'film_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        );
        $installer->getConnection()->createTable($table);
        $table = $installer->getConnection()->newTable(
            $installer->getTable('zero_training_four_film_actor')
        )->addColumn(
            'film_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['nullable' => false, 'unsigned' => true],
            'Film Id'
        )->addColumn(
            'actor_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['nullable' => false, 'unsigned' => true],
            'Actor Id'
        )->addForeignKey(
            $installer->getFkName(
                'zero_training_four_film_actor',
                'actor_id',
                'zero_training_four_actor',
                'actor_id'
            ),
            'actor_id',
            $installer->getTable('zero_training_four_actor'),
            'actor_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        )->addForeignKey(
            $installer->getFkName(
                'zero_training_four_film_actor',
                'film_id',
                'zero_training_four_film',
                'film_id'
            ),
            'film_id',
            $installer->getTable('zero_training_four_film'),
            'film_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        );
        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}
