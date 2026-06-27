<?php

declare(strict_types=1);

namespace Modules\LangOlbanian\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\LangOlbanian\Classes\Padonki;
use Symfony\Component\HttpFoundation\Response;

/**
 * При включённой локали ol коверкает весь HTML-вывод страницы в «языг падонкафф»
 * (заголовки, меню, тела — всё), пропуская теги, скрипты, стили, код и поля форм.
 */
class PadonkiMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (! $response instanceof Response || app()->getLocale() !== 'ol') {
            return $response;
        }

        // Только обычные HTML-ответы: не трогаем JSON, редиректы, RSS, файлы.
        // У стримов getContent() === false — guard ниже их пропускает.
        $contentType = (string) $response->headers->get('Content-Type', '');
        if (! str_contains($contentType, 'text/html')) {
            return $response;
        }

        $content = $response->getContent();
        if ($content !== false && $content !== '') {
            $response->setContent(Padonki::distort($content));
        }

        return $response;
    }
}
