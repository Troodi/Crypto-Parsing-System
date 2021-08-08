<?php
namespace App\Services\Interfaces;

interface ApiServiceInterface
{
    /**
     * Build a successful response.
     *
     * @param string $message
     * @param mixed|array $payload
     * @return \Illuminate\Http\JsonResponse
     */
    public function success(string $message = 'success', mixed $payload = []): \Illuminate\Http\JsonResponse;

    /**
     * Build an error response.
     *
     * @param string $message
     * @param mixed|array $payload
     * @return \Illuminate\Http\JsonResponse
     */
    public function error(string $message = 'error', mixed $payload = []): \Illuminate\Http\JsonResponse;

    /**
     * Build response
     *
     * @param bool $success
     * @param string $message
     * @param int|null $code
     * @param mixed|array $payload
     * @return \Illuminate\Http\JsonResponse
     */
    public function build(bool $success, string $message, null|int $code, mixed $payload = []): \Illuminate\Http\JsonResponse;
}
