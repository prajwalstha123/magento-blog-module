<?php
/*
* Upgrade Data for the module
* @author Prajwal Shrestha
* @since version 0.1.3
* @see https://www.toptal.com/magento/magento-2-tutorial-building-a-complete-module
*/
namespace Gbd\Blog\Setup;

use \Magento\Framework\Setup\UpgradeDataInterface;
use \Magento\Framework\Setup\ModuleContextInterface;
use \Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * Class UpgradeData
 * @package Gbd\Blog\Setup
 */

class UpgradeData implements UpgradeDataInterface
{
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if($context->getVersion() && version_compare( $context->getVersion(), '0.1.3' ) < 0 ) {
            $tableName = $setup->getTable( 'gbd_blog_post' );

            $data = [
                [
                    'title'     =>  'Post 1 Title',
                    'content'   =>  'Content of the first Post'
                ],
                [
                    'title'     =>  'Post 2 Title',
                    'content'   =>  'Content of the second Post'
                ],
            ];
            $setup->getConnection()
                ->insertMultiple( $tableName, $data );

        }
        $setup->endSetup();
    }
}