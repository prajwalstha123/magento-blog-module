<?php
/*
* Upgrade Schema for the module
* @author Prajwal Shrestha
* @since version 0.1.2
* @see https://www.toptal.com/magento/magento-2-tutorial-building-a-complete-module
*/

namespace Gbd\Blog\Setup;

use \Magento\Framework\Setup\UpgradeSchemaInterface;
use \Magento\Framework\Setup\ModuleContextInterface;
use \Magento\Framework\Setup\SchemaSetupInterface;
use \Magento\Framework\DB\Ddl\Table;

/**
 * Class UpgradeSchema
 * @package Gbd\Blog\Setup
 */

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if($context->getVersion() && version_compare( $context->getVersion(), '0.1.2' ) < 0 ) {
            $tableName = $setup->getTable( 'gbd_blog_post' );
            if( $setup->getConnection()->isTableExists( $tableName ) == true ){
                $setup->getConnection()
                    ->addColumn(
                        $tableName,
                        'title',
                        [ 'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 'nullable' => false, 'default' => '', 'afters' => 'post_id', 'comment' => 'Title' ]
                    );
                $setup->getConnection()
                    ->addColumn(
                        $tableName,
                        'created_at',
                        ['type' => \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP, 'nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT, 'afters' => 'content', 'comment' => 'Created At' ]
                    );
            }
        }
        $setup->endSetup();
    }
}