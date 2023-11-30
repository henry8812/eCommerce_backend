namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

class HandleApiAuthenticationExceptions 
{
    public function handle(Request $request, Closure $next)
    {
        try {
            return $next($request);
        } catch (AuthenticationException $exception) {
            return response()->json(['message' => 'No autorizado'], 401);
        }
    }
}
