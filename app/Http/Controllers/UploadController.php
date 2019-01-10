<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Exceptions\UploadImageException;
use App\Services\UploadImageService;
use App\Http\Requests\UploadImageRequest;
use Illuminate\Http\JsonResponse;

class UploadController extends Controller
{
    /** @var UploadImageService $uploadImageService */
    private $uploadImageService;

    public function __construct()
    {
        $this->uploadImageService = new UploadImageService();
    }

    /**
     * @param UploadImageRequest $request
     *
     * @return JsonResponse
     */
    public function storeImage(UploadImageRequest $request): JsonResponse
    {
        try {
            $imageStored = $this->uploadImageService->store($request->file('image'));
            return response()->json(['path' => $imageStored['path']]);
        } catch (UploadImageException $exception) {
            return response()->json(['message' => 'Image upload fail.'], 500);
        }
    }
}
