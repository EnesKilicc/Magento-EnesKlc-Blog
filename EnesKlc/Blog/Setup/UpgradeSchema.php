<?php
namespace Enesklc\Blog\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
	public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context ) {
		$installer = $setup;

		$installer->startSetup();

		if(version_compare($context->getVersion(), '1.1.0', '<')) {
			if (!$installer->tableExists('enesklc_blog_post')) {
				$table = $installer->getConnection()->newTable(
					$installer->getTable('enesklc_blog_post')
				)
					->addColumn(
						'post_id',
						\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
						null,
						[
							'identity' => true,
							'nullable' => false,
							'primary'  => true,
							'unsigned' => true,
						],
						'Post ID'
					)
					->addColumn(
						'title',
						\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
						255,
						['nullable => false'],
						'Post Title'
					)
					->addColumn(
						'url_key',
						\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
						255,
						[],
						'Post URL Key'
					)
					->addColumn(
						'content',
						\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
						'64k',
						[],
						'Post Content'
					)
				
					
					
					->addColumn(
						'created_at',
						\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
						null,
						['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
						'Created At'
					)
					->setComment('Post Table');
				$installer->getConnection()->createTable($table);

				$installer->getConnection()->addIndex(
					$installer->getTable('enesklc_blog_post'),
					$setup->getIdxName(
						$installer->getTable('enesklc_blog_post'),
						['title','url_key','content'],
						\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
					),
					['title','url_key','content'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
				);
			}
		}

		$installer->endSetup();
	}
}