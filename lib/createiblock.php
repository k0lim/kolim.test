<?
namespace Kolim\Test;

use Kolim\Test; 

class CreateIblock 
{
    public static function add()
    {

      //===================================//
      // Создаем новый тип инфоблока      //
      //===================================//
		$iblocktypeCode = "wb_orders";

		$obIBlockType =  new CIBlockType;
		$arrayFields = Array(
			  "ID"=>$iblocktype,
			  "SECTIONS"=>"Y",
			  "LANG"=>Array(
				 "ru"=>Array(
					"NAME"=>"Инфоблок заказов с Wildberries",               
				 )   
			  )
		   );
		$res = $obIBlockType->Add($arrayFields);
		if(!$res){ 
			$error = $obIBlockType->LAST_ERROR;
		}

      $ib = new CIBlock;

      $SITE_ID = "s1"; // ID сайта
      
      /*
      // Айдишники групп, которым будем давать доступ на инфоблок
      $contentGroupId = $this->GetGroupIdByCode("CONTENT");
      $editorGroupId = $this->GetGroupIdByCode("EDITOR");
      $ownerGroupId = $this->GetGroupIdByCode("OWNER");
      */

      //===================================//
      // Создаем инфоблок пользователей //
      //===================================//

      // Настройка доступа
      $arAccess = array(
         "2" => "R", // Все пользователи
         );
         if ($contentGroupId) $arAccess[$contentGroupId] = "X"; // Полный доступ
         if ($editorGroupId) $arAccess[$editorGroupId] = "W"; // Запись
         if ($ownerGroupId) $arAccess[$ownerGroupId] = "X"; // Полный доступ

      $arFields = Array(
         "ACTIVE" => "Y",
         "NAME" => "Список заказов",
         "CODE" => "order_list",
         "IBLOCK_TYPE_ID" => $iblocktypeCode,
         "SITE_ID" => $SITE_ID,
         "SORT" => "5",
         "GROUP_ID" => $arAccess, // Права доступа
         "FIELDS" => array(
            "DETAIL_PICTURE" => array(
               "IS_REQUIRED" => "N", // не обязательное
               "DEFAULT_VALUE" => array(
                  "SCALE" => "Y", // возможные значения: Y|N. Если равно "Y", то изображение будет отмасштабировано. 
                  "WIDTH" => "600", // целое число. Размер картинки будет изменен таким образом, что ее ширина не будет превышать значения этого поля. 
                  "HEIGHT" => "600", // целое число. Размер картинки будет изменен таким образом, что ее высота не будет превышать значения этого поля.
                  "IGNORE_ERRORS" => "Y", // возможные значения: Y|N. Если во время изменения размера картинки были ошибки, то при значении "N" будет сгенерирована ошибка. 
                  "METHOD" => "resample", // возможные значения: resample или пусто. Значение поля равное "resample" приведет к использованию функции масштабирования imagecopyresampled, а не imagecopyresized. Это более качественный метод, но требует больше серверных ресурсов. 
                  "COMPRESSION" => "95", // целое от 0 до 100. Если значение больше 0, то для изображений jpeg оно будет использовано как параметр компрессии. 100 соответствует наилучшему качеству при большем размере файла.
               ),
            ),
            "PREVIEW_PICTURE" => array(
               "IS_REQUIRED" => "N", // не обязательное
               "DEFAULT_VALUE" => array(
                  "SCALE" => "Y", // возможные значения: Y|N. Если равно "Y", то изображение будет отмасштабировано. 
                  "WIDTH" => "140", // целое число. Размер картинки будет изменен таким образом, что ее ширина не будет превышать значения этого поля. 
                  "HEIGHT" => "140", // целое число. Размер картинки будет изменен таким образом, что ее высота не будет превышать значения этого поля.
                  "IGNORE_ERRORS" => "Y", // возможные значения: Y|N. Если во время изменения размера картинки были ошибки, то при значении "N" будет сгенерирована ошибка. 
                  "METHOD" => "resample", // возможные значения: resample или пусто. Значение поля равное "resample" приведет к использованию функции масштабирования imagecopyresampled, а не imagecopyresized. Это более качественный метод, но требует больше серверных ресурсов. 
                  "COMPRESSION" => "95", // целое от 0 до 100. Если значение больше 0, то для изображений jpeg оно будет использовано как параметр компрессии. 100 соответствует наилучшему качеству при большем размере файла.
                  "FROM_DETAIL" => "Y", // возможные значения: Y|N. Указывает на необходимость генерации картинки предварительного просмотра из детальной. 
                  "DELETE_WITH_DETAIL" => "Y", // возможные значения: Y|N. Указывает на необходимость удаления картинки предварительного просмотра при удалении детальной.
                  "UPDATE_WITH_DETAIL" => "Y", // возможные значения: Y|N. Указывает на необходимость обновления картинки предварительного просмотра при изменении детальной.
               ),
            ),
            "SECTION_PICTURE" => array(
               "IS_REQUIRED" => "N", // не обязательное
               "DEFAULT_VALUE" => array(
                  "SCALE" => "Y", // возможные значения: Y|N. Если равно "Y", то изображение будет отмасштабировано. 
                  "WIDTH" => "235", // целое число. Размер картинки будет изменен таким образом, что ее ширина не будет превышать значения этого поля. 
                  "HEIGHT" => "235", // целое число. Размер картинки будет изменен таким образом, что ее высота не будет превышать значения этого поля.
                  "IGNORE_ERRORS" => "Y", // возможные значения: Y|N. Если во время изменения размера картинки были ошибки, то при значении "N" будет сгенерирована ошибка. 
                  "METHOD" => "resample", // возможные значения: resample или пусто. Значение поля равное "resample" приведет к использованию функции масштабирования imagecopyresampled, а не imagecopyresized. Это более качественный метод, но требует больше серверных ресурсов. 
                  "COMPRESSION" => "95", // целое от 0 до 100. Если значение больше 0, то для изображений jpeg оно будет использовано как параметр компрессии. 100 соответствует наилучшему качеству при большем размере файла.
                  "FROM_DETAIL" => "Y", // возможные значения: Y|N. Указывает на необходимость генерации картинки предварительного просмотра из детальной. 
                  "DELETE_WITH_DETAIL" => "Y", // возможные значения: Y|N. Указывает на необходимость удаления картинки предварительного просмотра при удалении детальной.
                  "UPDATE_WITH_DETAIL" => "Y", // возможные значения: Y|N. Указывает на необходимость обновления картинки предварительного просмотра при изменении детальной.
               ),
            ),
            // Символьный код элементов
            "CODE" => array(
               "IS_REQUIRED" => "N", // Обязательное
               "DEFAULT_VALUE" => array(
                  "UNIQUE" => "N", // Проверять на уникальность
                  "TRANSLITERATION" => "Y", // Транслитерировать
                  "TRANS_LEN" => "30", // Максмальная длина транслитерации
                  "TRANS_CASE" => "L", // Приводить к нижнему регистру
                  "TRANS_SPACE" => "-", // Символы для замены
                  "TRANS_OTHER" => "-",
                  "TRANS_EAT" => "Y",
                  "USE_GOOGLE" => "N",
                  ),
               ),
            // Символьный код разделов
            "SECTION_CODE" => array(
               "IS_REQUIRED" => "Y",
               "DEFAULT_VALUE" => array(
                  "UNIQUE" => "Y",
                  "TRANSLITERATION" => "Y",
                  "TRANS_LEN" => "30",
                  "TRANS_CASE" => "L",
                  "TRANS_SPACE" => "-",
                  "TRANS_OTHER" => "-",
                  "TRANS_EAT" => "Y",
                  "USE_GOOGLE" => "N",
                  ),
               ),
            "DETAIL_TEXT_TYPE" => array(      // Тип детального описания
               "DEFAULT_VALUE" => "html",
               ),
            "SECTION_DESCRIPTION_TYPE" => array(
               "DEFAULT_VALUE" => "html",
               ),
            "IBLOCK_SECTION" => array(         // Привязка к разделам обязательно
               "IS_REQUIRED" => "Y",
               ),            
            "LOG_SECTION_ADD" => array("IS_REQUIRED" => "Y"), // Журналирование
            "LOG_SECTION_EDIT" => array("IS_REQUIRED" => "Y"),
            "LOG_SECTION_DELETE" => array("IS_REQUIRED" => "Y"),
            "LOG_ELEMENT_ADD" => array("IS_REQUIRED" => "Y"),
            "LOG_ELEMENT_EDIT" => array("IS_REQUIRED" => "Y"),
            "LOG_ELEMENT_DELETE" => array("IS_REQUIRED" => "Y"),
         ),
         
         // Шаблоны страниц
         "LIST_PAGE_URL" => "#SITE_DIR#/order_list/",
         "SECTION_PAGE_URL" => "#SITE_DIR#/order_list/#SECTION_CODE#/",
         "DETAIL_PAGE_URL" => "#SITE_DIR#/order_list/#SECTION_CODE#/#ELEMENT_CODE#/",         

         "INDEX_SECTION" => "Y", // Индексировать разделы для модуля поиска
         "INDEX_ELEMENT" => "Y", // Индексировать элементы для модуля поиска

         "VERSION" => 1, // Хранение элементов в общей таблице

         "ELEMENT_NAME" => "Заказ",
         "ELEMENTS_NAME" => "Заказы",
         "ELEMENT_ADD" => "Добавить Заказ",
         "ELEMENT_EDIT" => "Изменить Заказ",
         "ELEMENT_DELETE" => "Удалить Заказ",
         "SECTION_NAME" => "Категории",
         "SECTIONS_NAME" => "Категория",
         "SECTION_ADD" => "Добавить категорию",
         "SECTION_EDIT" => "Изменить категорию",
         "SECTION_DELETE" => "Удалить категорию",

         "SECTION_PROPERTY" => "Y", // Разделы каталога имеют свои свойства (нужно для модуля интернет-магазина)
      );

      $ID = $ib->Add($arFields);
      if ($ID > 0)
      {
         echo "&mdash; инфоблок \"Список заказов\" успешно создан<br />";
      }
      else
      {
         echo "&mdash; ошибка создания инфоблока \"Список заказов\"<br />";
         return false;
      }

      
      //=======================================//
      // Добавляем свойства к Списку пользователей //
      //=======================================//

      // Определяем, есть ли у инфоблока свойства
      $dbProperties = CIBlockProperty::GetList(array(), array("IBLOCK_ID"=>$ID));
      if ($dbProperties->SelectedRowsCount() <= 0)
      {
         $ibp = new CIBlockProperty;

         $arFields = Array(
            "NAME" => "Номер заказа",
            "ACTIVE" => "Y",
            "SORT" => 1, // Сортировка
            "CODE" => "ODER_NUMBER",
            "PROPERTY_TYPE" => "S", // Список
            "FILTRABLE" => "Y", // Выводить на странице списка элементов поле для фильтрации по этому свойству
            "IBLOCK_ID" => $ID
           );
         $propId = $ibp->Add($arFields);
         if ($propId > 0)
         {
            $arFields["ID"] = $propId;
            $arCommonProps[$arFields["CODE"]] = $arFields;
            echo "&mdash; Добавлено свойство ".$arFields["NAME"]."<br />";
         }
         else
            echo "&mdash; Ошибка добавления свойства ".$arFields["NAME"]."<br />";


         $arFields = Array(
            "NAME" => "Дата заказа",
            "ACTIVE" => "Y",
            "SORT" => 2,
            "CODE" => "ODER_DATE",
            "PROPERTY_TYPE" => "S", 
            "FILTRABLE" => "Y", // Выводить на странице списка элементов поле для фильтрации по этому свойству 
            "IBLOCK_ID" => $ID
           );
         $propId = $ibp->Add($arFields);
         if ($propId > 0)
         {
            $arFields["ID"] = $propId;
            $arCommonProps[$arFields["CODE"]] = $arFields;
            echo "&mdash; Добавлено свойство ".$arFields["NAME"]."<br />";
         }
         else
            echo "&mdash; Ошибка добавления свойства ".$arFields["NAME"]."<br />";


         $arFields = Array(
            "NAME" => "Дата последнего изменения",
            "ACTIVE" => "Y",
            "SORT" => 3, // Сортировка
            "CODE" => "LAST_CHANGE_DATE",
            "PROPERTY_TYPE" => "S", 
            "FILTRABLE" => "Y", // Выводить на странице списка элементов поле для фильтрации по этому свойству 
            "IBLOCK_ID" => $ID
           );
         $propId = $ibp->Add($arFields);
         if ($propId > 0)
         {
            $arFields["ID"] = $propId;
            $arCommonProps[$arFields["CODE"]] = $arFields;
            echo "&mdash; Добавлено свойство ".$arFields["NAME"]."<br />";
         }
         else
            echo "&mdash; Ошибка добавления свойства ".$arFields["NAME"]."<br />";

         $arFields = Array(
            "NAME" => "Артикул поставщика",
            "ACTIVE" => "Y",
            "SORT" => 4, // Сортировка
            "CODE" => "SUPPLIER_ARTICLE",
            "PROPERTY_TYPE" => "S", 
            "FILTRABLE" => "Y", // Выводить на странице списка элементов поле для фильтрации по этому свойству 
            "IBLOCK_ID" => $ID
           );
         $propId = $ibp->Add($arFields);
         if ($propId > 0)
         {
            $arFields["ID"] = $propId;
            $arCommonProps[$arFields["CODE"]] = $arFields;
            echo "&mdash; Добавлено свойство ".$arFields["NAME"]."<br />";
         }
         else
            echo "&mdash; Ошибка добавления свойства ".$arFields["NAME"]."<br />";


         $arFields = Array(
            "NAME" => "Размер",
            "ACTIVE" => "Y",
            "SORT" => 5, // Сортировка
            "CODE" => "TECH_SIZE",
            "PROPERTY_TYPE" => "S", 
            "FILTRABLE" => "Y", // Выводить на странице списка элементов поле для фильтрации по этому свойству 
            "IBLOCK_ID" => $ID
           );
         $propId = $ibp->Add($arFields);
         if ($propId > 0)
         {
            $arFields["ID"] = $propId;
            $arCommonProps[$arFields["CODE"]] = $arFields;
            echo "&mdash; Добавлено свойство ".$arFields["NAME"]."<br />";
         }
         else
            echo "&mdash; Ошибка добавления свойства ".$arFields["NAME"]."<br />";

         $arFields = Array(
            "NAME" => "Штрих-код",
            "ACTIVE" => "Y",
            "SORT" => 6, // Сортировка
            "CODE" => "BARCODE",
            "PROPERTY_TYPE" => "S", 
            "FILTRABLE" => "Y", // Выводить на странице списка элементов поле для фильтрации по этому свойству 
            "IBLOCK_ID" => $ID
           );
         $propId = $ibp->Add($arFields);
         if ($propId > 0)
         {
            $arFields["ID"] = $propId;
            $arCommonProps[$arFields["CODE"]] = $arFields;
            echo "&mdash; Добавлено свойство ".$arFields["NAME"]."<br />";
         }
         else
            echo "&mdash; Ошибка добавления свойства ".$arFields["NAME"]."<br />";

         $arFields = Array(
            "NAME" => "Количество товара в заказе",
            "ACTIVE" => "Y",
            "SORT" => 7, // Сортировка
            "CODE" => "QUANTITY",
            "PROPERTY_TYPE" => "S", 
            "FILTRABLE" => "Y", // Выводить на странице списка элементов поле для фильтрации по этому свойству 
            "IBLOCK_ID" => $ID
           );
         $propId = $ibp->Add($arFields);
         if ($propId > 0)
         {
            $arFields["ID"] = $propId;
            $arCommonProps[$arFields["CODE"]] = $arFields;
            echo "&mdash; Добавлено свойство ".$arFields["NAME"]."<br />";
         }
         else
            echo "&mdash; Ошибка добавления свойства ".$arFields["NAME"]."<br />";

         $arFields = Array(
            "NAME" => "Общая стоимость заказа",
            "ACTIVE" => "Y",
            "SORT" => 8, // Сортировка
            "CODE" => "TOTAL_PRICE",
            "PROPERTY_TYPE" => "S", 
            "FILTRABLE" => "Y", // Выводить на странице списка элементов поле для фильтрации по этому свойству 
            "IBLOCK_ID" => $ID
           );
         $propId = $ibp->Add($arFields);
         if ($propId > 0)
         {
            $arFields["ID"] = $propId;
            $arCommonProps[$arFields["CODE"]] = $arFields;
            echo "&mdash; Добавлено свойство ".$arFields["NAME"]."<br />";
         }
         else
            echo "&mdash; Ошибка добавления свойства ".$arFields["NAME"]."<br />";

         $arFields = Array(
            "NAME" => "Размер скидки в %",
            "ACTIVE" => "Y",
            "SORT" => 9, // Сортировка
            "CODE" => "DISCOUNT_PERCENT",
            "PROPERTY_TYPE" => "S", 
            "FILTRABLE" => "Y", // Выводить на странице списка элементов поле для фильтрации по этому свойству 
            "IBLOCK_ID" => $ID
           );
         $propId = $ibp->Add($arFields);
         if ($propId > 0)
         {
            $arFields["ID"] = $propId;
            $arCommonProps[$arFields["CODE"]] = $arFields;
            echo "&mdash; Добавлено свойство ".$arFields["NAME"]."<br />";
         }
         else
            echo "&mdash; Ошибка добавления свойства ".$arFields["NAME"]."<br />";

         $arFields = Array(
            "NAME" => "Название склада",
            "ACTIVE" => "Y",
            "SORT" => 10, // Сортировка
            "CODE" => "WAREHOUSE_NAME",
            "PROPERTY_TYPE" => "S", 
            "FILTRABLE" => "Y", // Выводить на странице списка элементов поле для фильтрации по этому свойству 
            "IBLOCK_ID" => $ID
           );
         $propId = $ibp->Add($arFields);
         if ($propId > 0)
         {
            $arFields["ID"] = $propId;
            $arCommonProps[$arFields["CODE"]] = $arFields;
            echo "&mdash; Добавлено свойство ".$arFields["NAME"]."<br />";
         }
         else
            echo "&mdash; Ошибка добавления свойства ".$arFields["NAME"]."<br />";

         $arFields = Array(
            "NAME" => "Название области",
            "ACTIVE" => "Y",
            "SORT" => 11, // Сортировка
            "CODE" => "OBLAST_NAME",
            "PROPERTY_TYPE" => "S", 
            "FILTRABLE" => "Y", // Выводить на странице списка элементов поле для фильтрации по этому свойству 
            "IBLOCK_ID" => $ID
           );
         $propId = $ibp->Add($arFields);
         if ($propId > 0)
         {
            $arFields["ID"] = $propId;
            $arCommonProps[$arFields["CODE"]] = $arFields;
            echo "&mdash; Добавлено свойство ".$arFields["NAME"]."<br />";
         }
         else
            echo "&mdash; Ошибка добавления свойства ".$arFields["NAME"]."<br />";

         $arFields = Array(
            "NAME" => "Входящий идентификатор",
            "ACTIVE" => "Y",
            "SORT" => 12, // Сортировка
            "CODE" => "INCOME_ID",
            "PROPERTY_TYPE" => "S", 
            "FILTRABLE" => "Y", // Выводить на странице списка элементов поле для фильтрации по этому свойству 
            "IBLOCK_ID" => $ID
           );
         $propId = $ibp->Add($arFields);
         if ($propId > 0)
         {
            $arFields["ID"] = $propId;
            $arCommonProps[$arFields["CODE"]] = $arFields;
            echo "&mdash; Добавлено свойство ".$arFields["NAME"]."<br />";
         }
         else
            echo "&mdash; Ошибка добавления свойства ".$arFields["NAME"]."<br />";

         $arFields = Array(
            "NAME" => "Идентификатор odid",
            "ACTIVE" => "Y",
            "SORT" => 13, // Сортировка
            "CODE" => "ODID",
            "PROPERTY_TYPE" => "S", 
            "FILTRABLE" => "Y", // Выводить на странице списка элементов поле для фильтрации по этому свойству 
            "IBLOCK_ID" => $ID
           );
         $propId = $ibp->Add($arFields);
         if ($propId > 0)
         {
            $arFields["ID"] = $propId;
            $arCommonProps[$arFields["CODE"]] = $arFields;
            echo "&mdash; Добавлено свойство ".$arFields["NAME"]."<br />";
         }
         else
            echo "&mdash; Ошибка добавления свойства ".$arFields["NAME"]."<br />";

         $arFields = Array(
            "NAME" => "Идентификатор nmld",
            "ACTIVE" => "Y",
            "SORT" => 14, // Сортировка
            "CODE" => "NMLD",
            "PROPERTY_TYPE" => "S", 
            "FILTRABLE" => "Y", // Выводить на странице списка элементов поле для фильтрации по этому свойству 
            "IBLOCK_ID" => $ID
           );
         $propId = $ibp->Add($arFields);
         if ($propId > 0)
         {
            $arFields["ID"] = $propId;
            $arCommonProps[$arFields["CODE"]] = $arFields;
            echo "&mdash; Добавлено свойство ".$arFields["NAME"]."<br />";
         }
         else
            echo "&mdash; Ошибка добавления свойства ".$arFields["NAME"]."<br />";

         $arFields = Array(
            "NAME" => "Название товара",
            "ACTIVE" => "Y",
            "SORT" => 15, // Сортировка
            "CODE" => "SUBJECT",
            "PROPERTY_TYPE" => "S", 
            "FILTRABLE" => "Y", // Выводить на странице списка элементов поле для фильтрации по этому свойству 
            "IBLOCK_ID" => $ID
           );
         $propId = $ibp->Add($arFields);
         if ($propId > 0)
         {
            $arFields["ID"] = $propId;
            $arCommonProps[$arFields["CODE"]] = $arFields;
            echo "&mdash; Добавлено свойство ".$arFields["NAME"]."<br />";
         }
         else
            echo "&mdash; Ошибка добавления свойства ".$arFields["NAME"]."<br />";

         $arFields = Array(
            "NAME" => "Категория товара",
            "ACTIVE" => "Y",
            "SORT" => 16, // Сортировка
            "CODE" => "CATEGORY",
            "PROPERTY_TYPE" => "S", 
            "FILTRABLE" => "Y", // Выводить на странице списка элементов поле для фильтрации по этому свойству 
            "IBLOCK_ID" => $ID
           );
         $propId = $ibp->Add($arFields);
         if ($propId > 0)
         {
            $arFields["ID"] = $propId;
            $arCommonProps[$arFields["CODE"]] = $arFields;
            echo "&mdash; Добавлено свойство ".$arFields["NAME"]."<br />";
         }
         else
            echo "&mdash; Ошибка добавления свойства ".$arFields["NAME"]."<br />";

         $arFields = Array(
            "NAME" => "Торговый брэнд",
            "ACTIVE" => "Y",
            "SORT" => 17, // Сортировка
            "CODE" => "BRAND",
            "PROPERTY_TYPE" => "S", 
            "FILTRABLE" => "Y", // Выводить на странице списка элементов поле для фильтрации по этому свойству 
            "IBLOCK_ID" => $ID
           );
         $propId = $ibp->Add($arFields);
         if ($propId > 0)
         {
            $arFields["ID"] = $propId;
            $arCommonProps[$arFields["CODE"]] = $arFields;
            echo "&mdash; Добавлено свойство ".$arFields["NAME"]."<br />";
         }
         else
            echo "&mdash; Ошибка добавления свойства ".$arFields["NAME"]."<br />";

         $arFields = Array(
            "NAME" => "Отмена заказа",
            "ACTIVE" => "Y",
            "SORT" => 18, // Сортировка
            "CODE" => "IS_CANCEL",
            "PROPERTY_TYPE" => "S", 
            "FILTRABLE" => "Y", // Выводить на странице списка элементов поле для фильтрации по этому свойству 
            "IBLOCK_ID" => $ID
           );
         $propId = $ibp->Add($arFields);
         if ($propId > 0)
         {
            $arFields["ID"] = $propId;
            $arCommonProps[$arFields["CODE"]] = $arFields;
            echo "&mdash; Добавлено свойство ".$arFields["NAME"]."<br />";
         }
         else
            echo "&mdash; Ошибка добавления свойства ".$arFields["NAME"]."<br />";

         $arFields = Array(
            "NAME" => "Дата отмены заказа",
            "ACTIVE" => "Y",
            "SORT" => 19, // Сортировка
            "CODE" => "CANCEL_DATE_TIME",
            "PROPERTY_TYPE" => "S", 
            "FILTRABLE" => "Y", // Выводить на странице списка элементов поле для фильтрации по этому свойству 
            "IBLOCK_ID" => $ID
           );
         $propId = $ibp->Add($arFields);
         if ($propId > 0)
         {
            $arFields["ID"] = $propId;
            $arCommonProps[$arFields["CODE"]] = $arFields;
            echo "&mdash; Добавлено свойство ".$arFields["NAME"]."<br />";
         }
         else
            echo "&mdash; Ошибка добавления свойства ".$arFields["NAME"]."<br />";

         $arFields = Array(
            "NAME" => "gNumber",
            "ACTIVE" => "Y",
            "SORT" => 20, // Сортировка
            "CODE" => "G_NUMBER",
            "PROPERTY_TYPE" => "S", 
            "FILTRABLE" => "Y", // Выводить на странице списка элементов поле для фильтрации по этому свойству 
            "IBLOCK_ID" => $ID
           );
         $propId = $ibp->Add($arFields);
         if ($propId > 0)
         {
            $arFields["ID"] = $propId;
            $arCommonProps[$arFields["CODE"]] = $arFields;
            echo "&mdash; Добавлено свойство ".$arFields["NAME"]."<br />";
         }
         else
            echo "&mdash; Ошибка добавления свойства ".$arFields["NAME"]."<br />";


	  }

      
      //===================//
      // Свойства разделов //
      //===================//

      $obUserType = new CUserTypeEntity();

      $fieldTitle = "Сео-заголовок (title)";
      $arPropFields = array(
         "ENTITY_ID" => "IBLOCK_".$ID."_SECTION",
         "FIELD_NAME" => "UF_SEO_TITLE",
         "USER_TYPE_ID" => "string",
         "XML_ID" => "",
         "SORT" => -777,
         "MULTIPLE" => "N", // Множественное
         "MANDATORY" => "N", // Обязательное 
         "SHOW_FILTER" => "S",
         "SHOW_IN_LIST" => "Y",
         "EDIT_IN_LIST" => "Y",
         "IS_SEARCHABLE" => "N",
         "SETTINGS" => array(
               "SIZE" => "70", // длина поля ввода
               "ROWS" => "1" // высота поля ввода
            ),
         "EDIT_FORM_LABEL" => array("ru" => $fieldTitle, "en" => ""),
         "LIST_COLUMN_LABEL" => array("ru" => $fieldTitle, "en" => ""),
         "LIST_FILTER_LABEL" => array("ru" => $fieldTitle, "en" => ""),
      );
      $FIELD_ID = $obUserType->Add($arPropFields);

      $fieldTitle = "Ключевые слова (keywords)";
      $arPropFields = array(
         "ENTITY_ID" => "IBLOCK_".$ID."_SECTION",
         "FIELD_NAME" => "UF_SEO_KEYWORDS",
         "USER_TYPE_ID" => "string",
         "XML_ID" => "",
         "SORT" => -777,
         "MULTIPLE" => "N", // Множественное
         "MANDATORY" => "N", // Обязательное 
         "SHOW_FILTER" => "S",
         "SHOW_IN_LIST" => "Y",
         "EDIT_IN_LIST" => "Y",
         "IS_SEARCHABLE" => "N",
         "SETTINGS" => array(
               "SIZE" => "70", // длина поля ввода
               "ROWS" => "3" // высота поля ввода
            ),
         "EDIT_FORM_LABEL" => array("ru" => $fieldTitle, "en" => ""),
         "LIST_COLUMN_LABEL" => array("ru" => $fieldTitle, "en" => ""),
         "LIST_FILTER_LABEL" => array("ru" => $fieldTitle, "en" => ""),
      );
      $FIELD_ID = $obUserType->Add($arPropFields);

      $fieldTitle = "Описание (description)";
      $arPropFields = array(
         "ENTITY_ID" => "IBLOCK_".$ID."_SECTION",
         "FIELD_NAME" => "UF_SEO_DESCRIPTION",
         "USER_TYPE_ID" => "string",
         "XML_ID" => "",
         "SORT" => -777,
         "MULTIPLE" => "N", // Множественное
         "MANDATORY" => "N", // Обязательное 
         "SHOW_FILTER" => "S",
         "SHOW_IN_LIST" => "Y",
         "EDIT_IN_LIST" => "Y",
         "IS_SEARCHABLE" => "N",
         "SETTINGS" => array(
               "SIZE" => "70", // длина поля ввода
               "ROWS" => "3" // высота поля ввода
            ),
         "EDIT_FORM_LABEL" => array("ru" => $fieldTitle, "en" => ""),
         "LIST_COLUMN_LABEL" => array("ru" => $fieldTitle, "en" => ""),
         "LIST_FILTER_LABEL" => array("ru" => $fieldTitle, "en" => ""),
      );
      $FIELD_ID = $obUserType->Add($arPropFields);


      // Возвращаем номер добавленного инфоблока
      return $ID;
   }


}