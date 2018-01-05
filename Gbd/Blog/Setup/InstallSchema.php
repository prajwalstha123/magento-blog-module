<?php
/*
 * Creates Schema for the module
 * @author Prajwal Shrestha
 * @since version 0.1.0
 * @see https://www.toptal.com/magento/magento-2-tutorial-building-a-complete-module
 */
namespace Gbd\Blog\Setup;

use \Magento\Framework\Setup\InstallSchemaInterface;
use \Magento\Framework\Setup\ModuleContextInterface;
use \Magento\Framework\Setup\SchemaSetupInterface;
use \Magento\Framework\DB\Ddl\Table;
/**
 * Class InstallSchema
 *
 * @package GBD\Blog\Setup
 */
class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $tableName = $setup->getTable( 'gbd_blog_post' );

        if( $setup->getConnection()->isTableExists( $tableName ) != true ){
            $table = $setup->getConnection()
                        ->newTable( $tableName )
                        ->addColumn(
                            'post_id',
                            Table::TYPE_INTEGER,
                            null,
                            [
                                'identity'  => true,
                                'unsigned'  => true,
                                'nullable'  => false,
                                'primary'   => true
                            ],
                            'ID'
                        )
                        ->addColumn(
                            'content',
                            Table::TYPE_TEXT,
                            null,
                            [ 'nullable'    => false ],
                            'Content',
                            ['nullable' => false, 'default' => Table::TIMESTAMP_INIT ],
                            'Created At'
                        )
                        ->setComment( 'GBD Blog - Posts' );
            $setup->getConnection()->createTable($table);
        }
        $setup->endSetup();
    }


}



