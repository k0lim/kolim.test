<?
namespace Kolim\Test;
use Kolim\Test;


class Runner 
{

    public static function start()
    {
		\Kolim\Test\AddOrders::Add();
		return "\Kolim\Test\Runner::start();";
    }

}