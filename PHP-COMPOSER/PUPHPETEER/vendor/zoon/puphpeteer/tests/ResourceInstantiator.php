<?php

namespace Nesk\Puphpeteer\Tests;

use Nesk\Puphpeteer\Puppeteer;
use Nesk\Puphpeteer\Resources\Browser;
use Nesk\Puphpeteer\Resources\Frame;
use Nesk\Puphpeteer\Resources\HTTPResponse;
use Nesk\Puphpeteer\Resources\Page;
use Nesk\Rialto\Data\JsFunction;

/**
 * @method Page Page(Puppeteer $puppeteer)
 * @method Browser Browser(Puppeteer $puppeteer)
 * @method Frame Frame(Puppeteer $puppeteer)
 * @method HTTPResponse HttpResponse(Puppeteer $puppeteer)
 */
class ResourceInstantiator
{
    protected $resources = [];

    public function __construct(
        public array $browserOptions,
        public string $url
     ) {

        $this->resources = [
            'Accessibility' => function (Puppeteer $puppeteer) {
                return $this->Page($puppeteer)->accessibility;
            },
            'Browser' => function (Puppeteer $puppeteer): Browser {
                return $puppeteer->launch($this->browserOptions);
            },
            'BrowserContext' => function (Puppeteer $puppeteer) {
                return $this->Browser($puppeteer)->createBrowserContext();
            },
            'CDPSession' => function (Puppeteer $puppeteer) {
                return $this->Target($puppeteer)->createCDPSession();
            },
            'ConsoleMessage' => function () {
                return new UntestableResource;
            },
            'Coverage' => function ($puppeteer) {
                return $this->Page($puppeteer)->coverage;
            },
            'Dialog' => function () {
                return new UntestableResource;
            },
            'ElementHandle' => function ($puppeteer) {
                return $this->Page($puppeteer)->querySelector('body');
            },
            'EventEmitter' => function (Puppeteer $puppeteer) {
                return $puppeteer->launch($this->browserOptions);
            },
            'FileChooser' => function () {
                return new UntestableResource;
            },
            'Frame' => function (Puppeteer $puppeteer) {
                return $this->Page($puppeteer)->mainFrame();
            },
            'HTTPRequest' => function (Puppeteer $puppeteer) {
                return $this->HTTPResponse($puppeteer)->request();
            },
            'HTTPResponse' => function (Puppeteer $puppeteer): HTTPResponse {
                return $this->Page($puppeteer)->goto($this->url);
            },
            'JSHandle' => function (Puppeteer $puppeteer) {
                return $this->Page($puppeteer)->evaluateHandle(JsFunction::createWithBody('window'));
            },
            'Keyboard' => function (Puppeteer $puppeteer) {
                return $this->Page($puppeteer)->keyboard;
            },
            'Mouse' => function (Puppeteer $puppeteer) {
                return $this->Page($puppeteer)->mouse;
            },
            'Page' => function (Puppeteer $puppeteer): Page  {
                return $this->Browser($puppeteer)->newPage();
            },
            'SecurityDetails' => function (Puppeteer $puppeteer) {
                return new RiskyResource(function () use ($puppeteer) {
                    return $this->Page($puppeteer)->goto('https://example.com')->securityDetails();
                });
            },
            'Target' => function (Puppeteer $puppeteer) {
                return $this->Page($puppeteer)->target();
            },
            'TimeoutError' => function () {
                return new UntestableResource;
            },
            'Touchscreen' => function (Puppeteer $puppeteer) {
                return $this->Page($puppeteer)->touchscreen;
            },
            'Tracing' => function (Puppeteer $puppeteer) {
                return $this->Page($puppeteer)->tracing;
            },
            'WebWorker' => function (Puppeteer $puppeteer) {
                $page = $this->Page($puppeteer);
                $page->goto($this->url, ['waitUntil' => 'networkidle0']);
                return $page->workers()[0];
            },
        ];
    }

    public function getResourceNames(): array
    {
        return array_keys($this->resources);
    }

    public function __call(string $name, array $arguments)
    {
        if (!isset($this->resources[$name])) {
            throw new \InvalidArgumentException("The $name resource is not supported.");
        }

        return $this->resources[$name](...$arguments);
    }
}
