<?php

declare(strict_types=1);

namespace App\Services;

use File;
use Storage;
use App\Exceptions\UploadImageException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class UploadImageService
{
    /**
     * @param UploadedFile $file
     *
     * @return array
     * @throws UploadImageException
     */
    public function store(UploadedFile $file): array
    {
        if (!$file->isValid()) {
            throw new UploadImageException('File is not valid.');
        }

        $disk = Storage::disk('public');
        try {
            $fileName = time() . '.' . $file->getClientOriginalExtension();

            if ($disk->put($fileName, File::get($file))) {
                $disk->setVisibility($fileName, 'public');

                return [
                    'path' => $fileName,
                    'url' => $disk->url($fileName),
                ];
            }
        } catch (FileNotFoundException $e) {
            throw new UploadImageException($e->getMessage());
        }

        throw new UploadImageException('The file did not load.');
    }

    /**
     * @param string $fileName
     *
     * @return string
     */
    public function url(string $fileName): string
    {
        return Storage::disk('public')->url($fileName);
    }
}
