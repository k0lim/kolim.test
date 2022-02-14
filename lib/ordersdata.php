<?
namespace Kolim\Test;
use Bitrix\Main\Web\HttpClient; 
use Bitrix\Main\Config\Option;
use Kolim\Test\ApiKey;

class OrdersData 
{
    public static function getOrdersInArray()
    {

		$apiKey = Option::get("kolim.test", "api_key");

		$url = 'https://suppliers-stats.wildberries.ru/api/v1/supplier/orders?dateFrom=2017-03-25T21:00:00.000Z&flag=0&key='.$apiKey; 

		$httpClient = new HttpClient(); 
		$httpClient->query("GET", $url);
		$cookie = $httpClient->getCookies()->toArray(); 

		$httpClient->setHeader('Content-Type','application/x-www-form-urlencoded'); 
		$httpClient->setCookies($cookie); 
		$response = $httpClient->get($url);
		
		$ordersInArray = json_decode($response,true,512,0);
		Logger::getLogger("ordersDataClass")->log($ordersInArray);

		return $ordersInArray;
    }

}