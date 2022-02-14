<?
namespace Kolim\Test;

use Bitrix\Main\Entity;

class OrdersTable extends Entity\DataManager
{

	public static function deleteAll()
	{
	   $connection = static::getEntity()->getConnection();
	   $connection->queryExecute('DELETE FROM '.static::getTableName());
	}

    public static function getTableName()
    {
        return 'wildberries_orders_table';
    }

    public static function getUfId()
    {
        return 'WILDBERRIES_ORDERS_TABLE';
    }

    public static function getMap()
    {
        return array(
            new Entity\IntegerField('ID', array(
                'primary' => true,
                'autocomplete' => true
            )),
            new Entity\IntegerField('number', array(
                'required' => false
            )),
            new Entity\StringField('date', array(
                'required' => false
            )),
            new Entity\StringField('lastChangeDate', array(
                'required' => false
            )),
            new Entity\StringField('supplierArticle', array(
                'required' => false
            )),
            new Entity\StringField('techSize', array(
                'required' => false
            )),
            new Entity\IntegerField('barcode', array(
                'required' => false
            )),
            new Entity\IntegerField('quantity', array(
                'required' => false
            )),
            new Entity\IntegerField('totalPrice', array(
                'required' => false
            )),
            new Entity\IntegerField('discountPercent', array(
                'required' => false
            )),
            new Entity\StringField('warehouseName', array(
                'required' => false
            )),
            new Entity\StringField('oblast', array(
                'required' => false
            )),
            new Entity\IntegerField('incomeID', array(
                'required' => false
            )),
            new Entity\IntegerField('odid', array(
                'required' => false
            )),
            new Entity\IntegerField('nmId', array(
                'required' => false
            )),
            new Entity\StringField('subject', array(
                'required' => false
            )),
            new Entity\StringField('category', array(
                'required' => false
            )),
            new Entity\StringField('brand', array(
                'required' => false
            )),
            new Entity\BooleanField('isCancel', array(
				'values' => array('N', 'Y'),
                'required' => false
            )),
            new Entity\StringField('cancel_dt', array(
                'required' => false
            )),
            new Entity\IntegerField('gNumber', array(
                'required' => false
            )),
        );
    }
}