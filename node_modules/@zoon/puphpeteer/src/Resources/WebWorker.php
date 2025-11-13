<?php

namespace Nesk\Puphpeteer\Resources;

use Nesk\Rialto\Data\BasicResource;

/**
 * @property \Nesk\Puphpeteer\Resources\TimeoutSettings $timeoutSettings
 * @property-read \Nesk\Puphpeteer\Resources\CDPSession $client
 * @method \Nesk\Puphpeteer\Resources\Realm mainRealm()
 * @method-extended \Nesk\Puphpeteer\Resources\Realm mainRealm()
 * @method string url()
 * @method-extended string url()
 * @method mixed evaluate(mixed|string $func, mixed ...$args)
 * @method-extended mixed evaluate(mixed|string $func, mixed ...$args)
 * @method mixed evaluateHandle(mixed|string $func, mixed ...$args)
 * @method-extended mixed evaluateHandle(mixed|string $func, mixed ...$args)
 * @method void close()
 * @method-extended void close()
 */
class WebWorker extends BasicResource
{
}
