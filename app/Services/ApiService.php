<?php
namespace App\Services;

use App\Services\Interfaces\ApiServiceInterface;

class ApiService implements ApiServiceInterface
{
    /**
     * Build a successful response.
     *
     * @param string $message
     * @param mixed|array $payload
     * @return \Illuminate\Http\JsonResponse
     */
    public function success(string $message = 'success', mixed $payload = []): \Illuminate\Http\JsonResponse
    {
        return $this->build(true, $message, payload: $payload);
    }

    /**
     * Build an error response.
     *
     * @param string $message
     * @param mixed|array $payload
     * @return \Illuminate\Http\JsonResponse
     */
    public function error(string $message = 'error', mixed $payload = []): \Illuminate\Http\JsonResponse
    {
        return $this->build(false, $message, payload: $payload);
    }

    /**
     * Build response
     *
     * @param bool $success
     * @param string $message
     * @param int|null $code
     * @param mixed|array $payload
     * @return \Illuminate\Http\JsonResponse
     */
    public function build(bool $success, string $message, null|int $code = null, mixed $payload  = []): \Illuminate\Http\JsonResponse
    {
        $data = [
            'success' => $success,
            'message' => $message,
            'code' => $code
        ];
        $data = array_merge($data, ['payload' => $payload]);

        if (is_null($code)) {
            $code = $success ? 201 : 422;
        }

        return response()->json($data, $code);
    }
}
