<?

use Bitrix\Main\ModuleManager;
use Bitrix\Main\Config\Option;
use Bitrix\Main\EventManager;
use Bitrix\Main\Application;
use Bitrix\Main\IO\Directory;

use Bitrix\Main;
use Bitrix\Main\Localization\Loc;
use Kolim\Test;

Loc::loadMessages(__FILE__);

Class kolim_test extends CModule
{
	var $MODULE_ID = "kolim.test";
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_CSS;
	var $MODULE_GROUP_RIGHTS = "Y";

	function kolim_test()
	{
		$arModuleVersion = array();

		include(__DIR__.'/version.php');

		$this->MODULE_VERSION = $arModuleVersion["VERSION"];
		$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];

		$this->PARTNER_NAME = "Kolim"; 
		$this->PARTNER_URI = "https://t.me/k0lim";

		$this->MODULE_NAME = 'Wildberries Orders';
		$this->MODULE_DESCRIPTION = 'Модуль запрашивает данные о заказах поставщика на Wildberries, и создает таблицу заказов';
	}


	function InstallDB($install_wizard = true)
	{	
		global $DB;
		$DB->Query("CREATE TABLE IF NOT EXISTS `wildberries_orders_table`(
			`ID` int NOT NULL AUTO_INCREMENT,
			`number` int NOT NULL,
			`date` varchar(255) NOT NULL,
			`lastChangeDate` varchar(255) NOT NULL,
			`supplierArticle` varchar(255) NOT NULL,
			`techSize` varchar(255) NOT NULL,
			`barcode` int NOT NULL,
			`quantity` int NOT NULL,
			`totalPrice` int NOT NULL,
			`discountPercent` int NOT NULL,
			`warehouseName` varchar(255) NOT NULL,
			`oblast` varchar(255) NOT NULL,
			`incomeID` int NOT NULL,
			`odid` int NOT NULL,
			`nmId` int NOT NULL,
			`subject` varchar(255) NOT NULL,
			`category` varchar(255) NOT NULL,
			`brand` varchar(255) NOT NULL,
			`isCancel` boolean NOT NULL,
			`cancel_dt` varchar(255) NOT NULL,
			`gNumber` int NOT NULL,
			PRIMARY KEY (`ID`)	)"
		);

		RegisterModule("kolim.test");
		return true;
	}

	function UnInstallDB($arParams = Array())
	{
		global $DB;
		$DB->Query("DROP TABLE IF EXISTS wildberries_orders_table");

		UnRegisterModule("kolim.test");
		return true;
	}

	function InstallEvents()
	{

		return true;
	}

	function UnInstallEvents()
	{
		return true;
	}

	function InstallFiles()
	{
		return true;
	}

	function UnInstallFiles()
	{
		return true;
	}

	function DoInstall()
	{
		$this->InstallFiles();
		$this->InstallDB(false);

		CAgent::AddAgent(
			"\Kolim\Test\Runner::start();", // имя функции
			"kolim.test",                          // идентификатор модуля
			"N",                                  // агент не критичен к кол-ву запусков
			1800,                                // интервал запуска - 1 сутки
			"",                // дата первой проверки на запуск
			"Y",                                  // агент активен
			"");


	}

	function DoUninstall()
	{
		$this->UnInstallDB(false);

		CAgent::RemoveModuleAgents("kolim.test");
	}
}
?>