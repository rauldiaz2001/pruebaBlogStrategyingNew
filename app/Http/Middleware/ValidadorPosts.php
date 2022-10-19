<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidadorPosts
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
         $validator = Validator::make(
             $request->all(),
             [
                'titulo' => 'string',
                'subtitulo' => 'string',
                'categoria' => 'string',
                'name' => 'string',
             ]
         );

        if ($validator->fails()) {
            return response([
                'errors' => $validator->errors(),
                'body' => $request->all(),
            ], 400);
    }

        return $next($request);
    }
}
