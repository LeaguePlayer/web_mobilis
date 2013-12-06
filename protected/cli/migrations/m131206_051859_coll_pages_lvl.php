<?php
/**
 * Миграция m131206_051859_coll_pages_lvl
 *
 * @property string $prefix
 */
 
class m131206_051859_coll_pages_lvl extends CDbMigration
{
    // таблицы к удалению, можно использовать '{{table}}'
	private $dropped = array('lvl');
 
    public function __construct()
    {
        $this->execute('SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;');
        $this->execute('SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;');
        $this->execute('SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE="NO_AUTO_VALUE_ON_ZERO";');
    }
 
    public function __destruct()
    {
        $this->execute('SET SQL_MODE=@OLD_SQL_MODE;');
        $this->execute('SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;');
        $this->execute('SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;');
    }
 
    public function safeUp()
    {
 
        $this->addColumn('{{Pages}}','lvl', 'int');
    }
 
    public function safeDown()
    {
        $this->dropColumn();
    }
    protected function getPrefix(){
        return $this->getDbConnection()->tablePrefix;
    }
}