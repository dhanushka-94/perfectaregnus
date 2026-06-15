<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageUploadService
{
    private const MAX_SIZE_KB = 5120;

    private const ALLOWED_MIMES = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

    public function upload(UploadedFile $file, string $directory, ?string $oldPath = null): string
    {
        $this->validate($file);

        if ($oldPath) {
            $this->delete($oldPath);
        }

        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

        $file->storeAs($directory, $filename, 'public');

        return $directory . '/' . $filename;
    }

    public function delete(?string $path): void
    {
        if (! $path || str_starts_with($path, 'images/')) {
            return;
        }

        $storagePath = ltrim($path, '/');

        if (Storage::disk('public')->exists($storagePath)) {
            Storage::disk('public')->delete($storagePath);
        }
    }

    private function validate(UploadedFile $file): void
    {
        if (! in_array(strtolower($file->getClientOriginalExtension()), self::ALLOWED_MIMES, true)) {
            throw new \InvalidArgumentException('Invalid image type. Allowed: jpg, png, webp, gif.');
        }

        if ($file->getSize() > self::MAX_SIZE_KB * 1024) {
            throw new \InvalidArgumentException('Image must be smaller than 5MB.');
        }
    }
}
