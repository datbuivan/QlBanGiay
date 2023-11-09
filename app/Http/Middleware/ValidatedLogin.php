<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidatedLogin
{
    public function handle($request, Closure $next)
    {
        $validator = validator($request->all(), [
            'UserName' => 'required',
            'Password' => 'required',
        ]);

        return $next($request);
    }

    protected function validate($request, $rules)
    {
        // Sử dụng hàm validate() để kiểm tra dữ liệu và xử lý lỗi nếu có
        $request->validate($rules);
    }
}

?>