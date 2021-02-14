<?php
namespace App\Traits;

trait Api
{
    public function successWithData( $response, $status = 'success', $code = 200 )
    {
        return response()->json([
            'code'      => $code,
            'status'    => $status,
            'result'    => $response,
        ], $code);
    }

    /**
     * success
     * Return Success Response as in json formate with success msg
     */
    public function success( $response, $url_helpers, $status = 'success', $code = 200 )
    {
        return response()->json([
            'code'          => $code,
            'status'         => $status,
            'result'        => $response,
            'url_helpers'   => $url_helpers
        ], $code);
    }

    /**
     * done
     * Return success msg
     */
    public static function done( $msg , $status = 'success', $code = 200 )
    {
        return response()->json([
            'code'          => $code,
            'status'         => $status,
            'msg'           => $msg,
        ], $code);
    }

    /**
     * error
     * Return Error Response as in json formate with error msg
     */
    public function error( $response = [], $msg = 'Error' ,  $status = 'error', $code = 200 )
    {
        return response()->json([
            'code'          => $code,
            'status'         => $status,
            'msg'           => $msg,
            'error'        => $response,
        ], $code);
    }

    /**
     * unauthorizedError
     * Return unauthorized Error Response as in json formate with error msg
     */
    public function unauthorizedError( $response = [], $msg = 'Your Are not Allowed to take this action' , $status = 'error', $code = 403 )
    {
        return response()->json([
            'code'          => $code,
            'status'         => $status,
            'msg'           => $msg,
            'result'        => $response,
        ], $code);
    }

    /**
     * unauthenticated
     * Return unauthorized Error Response as in json formate with error msg
     */
    public static function unauthenticated( $response = [], $msg = 'Your Are not Authenticated' , $status = 'error', $code = 403 )
    {
        return response()->json([
            'code'          => $code,
            'status'         => $status,
            'msg'           => $msg,
            'result'        => $response,
        ], $code);
    }

}
