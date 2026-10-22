<?php

namespace Tests\Unit;

use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Http\Request;
use Illuminate\Session\TokenMismatchException;
use PHPUnit\Framework\TestCase;

class CsrfProtectionTest extends TestCase
{
    public function test_request_without_csrf_token_is_rejected(): void
    {
        $app = $this->createMock(Application::class);
        $app->method('runningInConsole')->willReturn(false);
        $app->method('runningUnitTests')->willReturn(false);

        $encrypter = $this->createMock(Encrypter::class);

        $middleware = new PreventRequestForgery($app, $encrypter);

        $request = Request::create('/admin/posts', 'POST');

        $session = new \Illuminate\Session\Store(
            'test',
            new \Illuminate\Session\ArraySessionHandler(120)
        );

        $session->start();
        $session->put('_token', str_repeat('a', 40));
        $request->setLaravelSession($session);

        $this->expectException(TokenMismatchException::class);

        $middleware->handle($request, function ($request) {
            return response('This should not be reached.');
        });
    }
}
