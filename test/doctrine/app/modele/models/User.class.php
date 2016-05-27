<?
class User extends Doctrine_Record
{
	public function setTableDefinition()
    {
    	$this->hasColumn('id', 'integer', 8, array('primary' => true,'autoincrement' => true));
        $this->hasColumn('name',   'string',  255,  array('notnull' => true));
        $this->hasColumn('password', 'string',  255, array('notnull' => true));
        $this->hasColumn('user_id', 'integer', null, array());
        
    }

    public function setUp()
    {
    	$this->hasOne
    	(
    		'Article as article', 
    		array(
    			'local' => 'user_id',
    			'foreign' => 'user_id'
    			)
		);
    }

}