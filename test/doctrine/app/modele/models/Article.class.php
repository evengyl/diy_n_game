<?
class Article extends Doctrine_Record
{
	public function setTableDefinition()
    {
    	$this->hasColumn('id', 'integer', 8, array('primary' => true,'autoincrement' => true));
        $this->hasColumn('title',   'string',  255,  array('notnull' => true));
        $this->hasColumn('content', 'string',  null, array('notnull' => true));
        $this->hasColumn('user_id', 'integer', null, array());

    }

    public function setUp()
    {
    	$this->hasOne
    	(
    		'User as user', 
    		array(
    			'local' => 'user_id',
    			'foreign' => 'user_id'
    			)
		);
    }

}