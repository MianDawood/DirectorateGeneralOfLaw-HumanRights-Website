<?php

namespace App\Support;

use chillerlan\QRCode\Common\EccLevel;
use chillerlan\QRCode\Output\QRGdImagePNG;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

class CertificateQrGenerator
{
    /**
     * Build a high-contrast PNG QR code as a data URI (GD — no Imagick required).
     */
    public static function verificationDataUri(string $url): string
    {
        $options = new QROptions([
            'outputInterface' => QRGdImagePNG::class,
            'eccLevel' => EccLevel::H,
            'scale' => 10,
            'outputBase64' => true,
            'addQuietzone' => true,
            'quietzoneSize' => 4,
        ]);

        return (string) (new QRCode($options))->render($url);
    }
}
