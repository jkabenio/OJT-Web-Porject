<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class IPWhitelistMiddleware
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
        // Define the allowed IP addresses or ranges
        $allowedIPs = [
            '::1',                // Single IP address
            // '192.168.10.0/24',            // IP range using CIDR notation
            // '10.0.0.0/16',
            '131.226.104.24',    
            '100.66.24.190',
            '192.168.60.66',
            '192.168.199.81',
            '192.168.199.66'            // Another example IP range
        ];

        // Get the client's IP address
        $clientIP = $request->ip();

        // Check if the client's IP matches any allowed IP addresses or ranges
        foreach ($allowedIPs as $allowedIP) {
            if ($this->checkIP($clientIP, $allowedIP)) {
                return $next($request);
            }
        }

        // If the client's IP is not allowed, you can customize the response
        // return response('Unauthorized.', 401);
        // return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        abort(Response::HTTP_UNAUTHORIZED, 'Unauthorized');
    }

     /**
     * Check if an IP address matches an allowed IP or IP range.
     *
     * @param  string  $ip
     * @param  string  $allowedIP
     * @return bool
     */
    private function checkIP($ip, $allowedIP)
    {
        // Check if the allowed IP is a single IP address
        if (strpos($allowedIP, '/') === false) {
            return $ip === $allowedIP;
        }

        // If the allowed IP is a range, use CIDR notation to check if the IP falls within the range
        list($subnet, $mask) = explode('/', $allowedIP);

        $subnet = ip2long($subnet);
        $mask = ~((1 << (32 - $mask)) - 1);

        $ip = ip2long($ip);

        return ($ip & $mask) === ($subnet & $mask);
    }
}
