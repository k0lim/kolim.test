<?
namespace Kolim\Test;
use Bitrix\Main\Entity\Result;
use Kolim\Test; 

class AddOrders 
{
    public static function add()
    {

		$ordersInArray = OrdersData::getOrdersInArray();
		$res = OrdersTable::getEntity();

		if(!empty($ordersInArray)){
			if(empty($res)){
				$i = 0;
				foreach($ordersInArray as $order):
						$result = OrdersTable::add(array(
									"number"=>$order['number'],
									"date"=>$order['date'],
									"lastChangeDate"=>$order['lastChangeDate'],
									"supplierArticle"=>$order['supplierArticle'],
									"techSize"=>$order['techSize'],
									"barcode"=>$order['barcode'],
									"quantity"=>$order['quantity'],
									"totalPrice"=>$order['totalPrice'],
									"discountPercent"=>$order['discountPercent'],
									"warehouseName"=>$order['warehouseName'],
									"oblast"=>$order['oblast'],
									"incomeID"=>$order['incomeID'],
									"odid"=>$order['odid'],
									"nmId"=>$order['nmId'],
									"subject"=>$order['subject'],
									"category"=>$order['category'],
									"brand"=>$order['brand'],
									"isCancel"=>$order['isCancel'],
									"cancel_dt"=>$order['cancel_dt'],
									"gNumber"=>$order['gNumber']
								));
				$i++;
				endforeach;
			}
			else{
				OrdersTable::deleteAll();
				foreach($ordersInArray as $order):
						$result = OrdersTable::add(array(
									"number"=>$order['number'],
									"date"=>$order['date'],
									"lastChangeDate"=>$order['lastChangeDate'],
									"supplierArticle"=>$order['supplierArticle'],
									"techSize"=>$order['techSize'],
									"barcode"=>$order['barcode'],
									"quantity"=>$order['quantity'],
									"totalPrice"=>$order['totalPrice'],
									"discountPercent"=>$order['discountPercent'],
									"warehouseName"=>$order['warehouseName'],
									"oblast"=>$order['oblast'],
									"incomeID"=>$order['incomeID'],
									"odid"=>$order['odid'],
									"nmId"=>$order['nmId'],
									"subject"=>$order['subject'],
									"category"=>$order['category'],
									"brand"=>$order['brand'],
									"isCancel"=>$order['isCancel'],
									"cancel_dt"=>$order['cancel_dt'],
									"gNumber"=>$order['gNumber']
								));
				$i++;
				endforeach;
			}
		}
		else
		{
			AddOrders::add();
			Logger::getLogger("AddOrdersClass")->log("Данные от wildberries не получены");
		}
    }

}