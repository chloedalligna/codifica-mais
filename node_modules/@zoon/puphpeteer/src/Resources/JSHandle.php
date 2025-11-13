<?php

namespace Nesk\Puphpeteer\Resources;

use Nesk\Rialto\Data\BasicResource;

/**
 * @property \Nesk\Rialto\Data\JsFunction $move
 * @property-read \Nesk\Puphpeteer\Resources\Realm $realm
 * @property-read bool $disposed
 * @property-read string|null $id
 * @method mixed evaluate(\Nesk\Rialto\Data\JsFunction $pageFunction, mixed ...$args)
 * @method-extended mixed evaluate(callable|\Nesk\Rialto\Data\JsFunction $pageFunction, mixed ...$args)
 * @method mixed evaluateHandle(\Nesk\Rialto\Data\JsFunction $pageFunction, mixed ...$args)
 * @method-extended mixed evaluateHandle(callable|\Nesk\Rialto\Data\JsFunction $pageFunction, mixed ...$args)
 * @method \Nesk\Puphpeteer\Resources\JSHandle|mixed[] getProperty(string $propertyName)
 * @method-extended \Nesk\Puphpeteer\Resources\JSHandle|mixed[] getProperty(string $propertyName)
 * @method array|string[]|\Nesk\Puphpeteer\Resources\JSHandle[] getProperties()
 * @method-extended array|string[]|\Nesk\Puphpeteer\Resources\JSHandle[] getProperties()
 * @method mixed jsonValue()
 * @method-extended mixed jsonValue()
 * @method \Nesk\Puphpeteer\Resources\ElementHandle|mixed[]|null asElement()
 * @method-extended \Nesk\Puphpeteer\Resources\ElementHandle|mixed[]|null asElement()
 * @method void dispose()
 * @method-extended void dispose()
 * @method string toString()
 * @method-extended string toString()
 * @method mixed remoteObject()
 * @method-extended mixed remoteObject()
 */
class JSHandle extends BasicResource
{
}
