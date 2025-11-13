<?php

namespace Nesk\Puphpeteer\Resources;

use Nesk\Puphpeteer\Traits\AliasesEvaluationMethods;
use Nesk\Puphpeteer\Traits\AliasesSelectionMethods;
use Nesk\Rialto\Data\BasicResource;

/**
 * @property-read \Nesk\Puphpeteer\Resources\CDPSession $client
 * @property-read \Nesk\Puphpeteer\Resources\Accessibility $accessibility
 * @property-read bool $detached
 * @property-read bool $disposed
 * @method \Nesk\Puphpeteer\Resources\Page page()
 * @method-extended \Nesk\Puphpeteer\Resources\Page page()
 * @method \Nesk\Puphpeteer\Resources\HTTPResponse|null goto(string $url, array $options = [])
 * @method-extended \Nesk\Puphpeteer\Resources\HTTPResponse|null goto(string $url, array<string, mixed> $options = null)
 * @method \Nesk\Puphpeteer\Resources\HTTPResponse|null waitForNavigation(array $options = [])
 * @method-extended \Nesk\Puphpeteer\Resources\HTTPResponse|null waitForNavigation(array<string, mixed> $options = null)
 * @method \Nesk\Puphpeteer\Resources\Realm mainRealm()
 * @method-extended \Nesk\Puphpeteer\Resources\Realm mainRealm()
 * @method \Nesk\Puphpeteer\Resources\Realm isolatedRealm()
 * @method-extended \Nesk\Puphpeteer\Resources\Realm isolatedRealm()
 * @method void clearDocumentHandle()
 * @method-extended void clearDocumentHandle()
 * @method mixed|null frameElement()
 * @method-extended mixed|null frameElement()
 * @method mixed evaluateHandle(\Nesk\Rialto\Data\JsFunction $pageFunction, mixed ...$args)
 * @method-extended mixed evaluateHandle(callable|\Nesk\Rialto\Data\JsFunction $pageFunction, mixed ...$args)
 * @method mixed evaluate(\Nesk\Rialto\Data\JsFunction $pageFunction, mixed ...$args)
 * @method-extended mixed evaluate(callable|\Nesk\Rialto\Data\JsFunction $pageFunction, mixed ...$args)
 * @method mixed locator(\Nesk\Rialto\Data\JsFunction $func)
 * @method-extended mixed locator(callable(): mixed|\Nesk\Rialto\Data\JsFunction $func)
 * @method \Nesk\Puphpeteer\Resources\ElementHandle|mixed[]|null waitForSelector(mixed $selector, array $options = [])
 * @method-extended \Nesk\Puphpeteer\Resources\ElementHandle|mixed[]|null waitForSelector(mixed $selector, array<string, mixed> $options = null)
 * @method mixed waitForFunction(\Nesk\Rialto\Data\JsFunction $pageFunction, array $options = [], mixed ...$args)
 * @method-extended mixed waitForFunction(callable|\Nesk\Rialto\Data\JsFunction $pageFunction, array<string, mixed> $options = null, mixed ...$args)
 * @method string content()
 * @method-extended string content()
 * @method void setContent(string $html, array $options = [])
 * @method-extended void setContent(string $html, array<string, mixed> $options = null)
 * @method void setFrameContent(string $content)
 * @method-extended void setFrameContent(string $content)
 * @method string name()
 * @method-extended string name()
 * @method string url()
 * @method-extended string url()
 * @method \Nesk\Puphpeteer\Resources\Frame|null parentFrame()
 * @method-extended \Nesk\Puphpeteer\Resources\Frame|null parentFrame()
 * @method \Nesk\Puphpeteer\Resources\Frame[] childFrames()
 * @method-extended \Nesk\Puphpeteer\Resources\Frame[] childFrames()
 * @method bool isDetached()
 * @method-extended bool isDetached()
 * @method \Nesk\Puphpeteer\Resources\ElementHandle|mixed[] addScriptTag(array $options)
 * @method-extended \Nesk\Puphpeteer\Resources\ElementHandle|mixed[] addScriptTag(array<string, mixed> $options)
 * @method \Nesk\Puphpeteer\Resources\ElementHandle|mixed[] addStyleTag(array $options)
 * @method-extended \Nesk\Puphpeteer\Resources\ElementHandle|mixed[] addStyleTag(array<string, mixed> $options)
 * @method void click(string $selector, mixed $options = null)
 * @method-extended void click(string $selector, mixed $options = null)
 * @method void focus(string $selector)
 * @method-extended void focus(string $selector)
 * @method void hover(string $selector)
 * @method-extended void hover(string $selector)
 * @method string[] select(string $selector, string ...$values)
 * @method-extended string[] select(string $selector, string ...$values)
 * @method void tap(string $selector)
 * @method-extended void tap(string $selector)
 * @method void type(string $selector, string $text, mixed $options = null)
 * @method-extended void type(string $selector, string $text, mixed $options = null)
 * @method string title()
 * @method-extended string title()
 * @method mixed waitForDevicePrompt(array $options = [])
 * @method-extended mixed waitForDevicePrompt(array<string, mixed> $options = null)
 */
class Frame extends BasicResource
{
    use AliasesEvaluationMethods;
    use AliasesSelectionMethods;
}
