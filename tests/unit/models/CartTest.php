<?php namespace Lovata\OrdersShopaholic\Tests\Unit\Models;

include_once __DIR__.'/../../../../toolbox/vendor/autoload.php';
include_once __DIR__.'/../../../../../../tests/PluginTestCase.php';

use PluginTestCase;
use Lovata\Buddies\Models\User;
use Lovata\OrdersShopaholic\Models\Cart;
use Lovata\OrdersShopaholic\Models\CartElement;

/**
 * Class CartTest
 * @package Lovata\OrdersShopaholic\Tests\Unit\Models
 * @author Andrey Kharanenka, a.khoronenko@lovata.com, LOVATA Group
 *
 * @mixin \PHPUnit\Framework\Assert
 */
class CartTest extends PluginTestCase
{
    protected $sModelClass;

    /**
     * CartTest constructor.
     */
    public function __construct()
    {
        $this->sModelClass = Cart::class;
        parent::__construct();
    }

    /**
     * Check model "item" relation config
     */
    public function testHasItemRelation()
    {
        $sErrorMessage = $this->sModelClass.' model has not correct "item" relation config';

        /** @var Cart $obModel */
        $obModel = new Cart();
        self::assertNotEmpty($obModel->hasMany, $sErrorMessage);
        self::assertArrayHasKey('item', $obModel->hasMany, $sErrorMessage);
        self::assertEquals(CartElement::class, $obModel->hasMany['item'], $sErrorMessage);
    }

    /**
     * Check model "user" relation config
     */
    public function testHasUserRelation()
    {
        $sErrorMessage = $this->sModelClass.' model has not correct "user" relation config';

        /** @var CartElement $obModel */
        $obModel = new Cart();
        self::assertNotEmpty($obModel->belongsTo, $sErrorMessage);
        self::assertArrayHasKey('user', $obModel->belongsTo, $sErrorMessage);
        self::assertEquals(User::class, $obModel->belongsTo['user'], $sErrorMessage);
    }
}