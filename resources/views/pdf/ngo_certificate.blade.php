<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>NGO Registration Certificate</title>

    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* A4 page settings */
        @page {
            margin: 0;
            size: 190mm 297mm;
        }

        html,
        body {
            width: 190mm;
            height: 297mm;
            margin: 0;
            padding: 0;
            background: #fff;
            overflow: hidden;
        }

        body {
            font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            color: #000;
        }

        /* Certificate page */
        .certificate-page {
            width: 190mm;
            height: 297mm;
            position: relative;
            background: #fff;
            overflow: hidden;
        }

        /* Outer green border */
        .outer-border {
            position: absolute;
            top: 10mm;
            left: 10mm;
            right: 10mm;
            bottom: 10mm;
            border: 17px solid #0d4d30;
            z-index: 10;
        }

        /* Inner black border */
        .inner-border {
            position: absolute;
            top: calc(10mm + 35px);
            left: calc(10mm + 35px);
            right: calc(10mm + 35px);
            bottom: calc(10mm + 35px);
            border: 2px solid #000;
            z-index: 11;
        }

        /* Decorative ribbon */
        .corner-ribbon {
            position: absolute;
            top: 10mm;
            left: calc(10mm + 35px);
            width: 15mm;
            height: 30mm;
            background: #075a2c;
            z-index: 12;
        }

        /* Ribbon pointed bottom */
        .corner-ribbon:after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 0;
            height: 0;
            border-left: 7.5mm solid transparent;
            border-right: 7.5mm solid transparent;
            border-bottom: 5mm solid #ffffff;
        }

        /* Watermark */
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            opacity: 0.10;
            z-index: 1;
            pointer-events: none;
        }

        .watermark img {
            width: 100%;
            height: auto;
        }

        /* Content area */
        .content-area {
            position: absolute;
            top: calc(10mm + 17px);
            left: calc(10mm + 17px);
            right: calc(10mm + 17px);
            bottom: calc(10mm + 17px);
            z-index: 5;

            display: flex;
            flex-direction: column;

            padding: 25px 35px 20px 35px;
        }

        /* Header */
        .header-section {
            flex-shrink: 0;
            margin-bottom: 12px;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
        }

        .header-table td {
            vertical-align: middle;
        }

        .logo-cell {
            width: 22%;
            text-align: center;
        }

        .logo-cell img {
            width: 78px;
            height: auto;
            max-height: 78px;
        }

        .header-text {
            width: 64%;
            text-align: center;
            padding: 0 8px;
        }

        .header-line-1,
        .header-line-2 {
            font-size: 24px;
            font-weight: 900;
            letter-spacing: 0.4px;
            line-height: 1.1;
            text-transform: uppercase;
        }

        .header-line-3 {
            font-size: 20px;
            font-weight: 700;
            margin-top: 3px;
            letter-spacing: 0.2px;
            text-transform: uppercase;
        }

        /* Certificate title */
        .title-section {
            flex-shrink: 0;
            text-align: center;
            margin: 10px 0 12px;
        }

        .cert-title {
            font-family: 'DejaVu Serif', 'Times New Roman', serif;
            font-size: 34px;
            font-weight: 700;
            letter-spacing: 1.6px;
            color: #000;
        }

        /* Meta information */
        .meta-section {
            flex-shrink: 0;
            margin-bottom: 16px;
            margin-top: 4px;
        }

        .meta-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 11.5px;
            font-weight: bold;
        }

        .meta-table td {
            padding: 3px 0;
        }

        .meta-right {
            text-align: right;
        }

        /* Body content */
        .body-section {
            flex: 1;
            flex-shrink: 0;
            margin-bottom: 16px;
            min-height: 0;
        }

        .body-text {
            font-size: 18px;
            line-height: 1.55;
            text-align: justify;
            overflow: hidden;
        }

        .body-text p {
            margin: 9px 0;
        }

        .intro-line {
            text-align: center;
            margin-bottom: 7px;
            font-size: 15px;
        }

        .ngo-name-block {
            text-align: center;
            margin: 9px 0 12px;
        }

        .ngo-name {
            font-size: 16.5px;
            font-weight: bold;
            letter-spacing: 0.4px;
            padding: 3px 11px;
            border-radius: 3px;
            display: inline-block;
        }

        .date-highlight {
            font-weight: bold;
            color: #000;
        }

        /* Footer */
        .footer-section {
            flex-shrink: 0;
            margin-top: auto;
            padding-top: 14px;
        }

        .footer-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .footer-table td {
            vertical-align: bottom;
        }

        /* QR code */
        .qr-column {
            width: 32%;
            vertical-align: bottom;
        }

        .qr-container {
            display: inline-block;
        }

        .qr-container img {
            width: 95px;
            height: 95px;
            display: block;
            border: 1px solid #ddd;
        }

        .qr-placeholder {
            width: 95px;
            height: 95px;
            background: #f0f0f0;
            border: 1px solid #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 9px;
            color: #999;
        }

        .qr-reg-no {
            font-weight: bold;
            font-size: 10.5px;
            margin-top: 5px;
            text-align: center;
        }

        /* Signature */
        .signature-column {
            width: 68%;
            text-align: right;
            vertical-align: bottom;
        }

        .signature-block {
            display: inline-block;
            text-align: center;
            width: 210px;
        }

        .signature-image {
            height: 46px;
            margin-bottom: 3px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .signature-image img {
            max-height: 46px;
            max-width: 170px;
        }

        .dg-title {
            font-weight: bold;
            font-size: 11.5px;
            line-height: 1.25;
            margin: 5px 0 7px;
        }

        .official-seal img {
            width: 65px;
            height: auto;
        }

        /* Contact footer */
        .contact-footer {
            margin-top: 13px;
            padding-top: 9px;
            text-align: center;
            font-size: 8.5px;
            line-height: 1.4;
        }

        .contact-footer strong {
            font-weight: bold;
        }

        /* Print optimization */
        @media print {

            html,
            body {
                width: 190mm;
                height: 297mm;
            }

            .certificate-page {
                page-break-after: avoid;
                page-break-inside: avoid;
            }

            * {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>
</head>

<body>

    @php
        // Certificate dates
        $issueDate =
            isset($application) && $application->certificate_issue_date
                ? \Carbon\Carbon::parse($application->certificate_issue_date)
                : \Carbon\Carbon::now();

        $expiryDate = $issueDate->copy()->addYears(3);

        // Main logo
        $logoPath = public_path('images/logo.jpg');

        $logoSrc =
            $logoSrc ??
            (file_exists($logoPath)
                ? 'data:image/jpeg;base64,' . base64_encode(file_get_contents($logoPath))
                : asset('images/logo.jpg'));

        // Certificate information
        $ngoName = $ngoName ?? '';

        $registrationNo =
            isset($application) && $application->registration_no
                ? $application->registration_no
                : 'KP-DGLHR-001';

        // Signature and QR code
        $signatureImage = $signatureImage ?? null;
        $qrCodeImage = $qrCodeImage ?? '';

        // Contact information
        $siteSettings = \App\Models\SiteSetting::getSettings();

        $contactEmail = $contactEmail ?? ($siteSettings->contact_email ?? '');
        $contactPhone = $contactPhone ?? ($siteSettings->contact_phone ?? '');
        $contactAddress = $contactAddress ?? ($siteSettings->contact_address ?? '');
    @endphp


    <div class="certificate-page">

        <!-- Outer border -->
        <div class="outer-border"></div>

        <!-- Inner border -->
        <div class="inner-border"></div>

        <!-- Decorative ribbon -->
        <div class="corner-ribbon"></div>


        <!-- Watermark -->
        <div class="watermark">
            <img src="{{ $logoSrc }}" alt="Watermark">
        </div>


        <!-- Certificate content -->
        <div class="content-area">

            <div style="min-height: 80% !important;">

                <!-- Header -->
                <div class="header-section">

                    <table class="header-table">

                        <tr>

                            <!-- Left logo -->
                            <td class="logo-cell">
                                <img src="{{ $logoSrc }}" alt="Logo">
                            </td>


                            <!-- Header text -->
                            <td class="header-text">

                                <div class="header-line-1">
                                    DIRECTORATE GENERAL
                                </div>

                                <div class="header-line-2">
                                    LAW &amp; HUMAN RIGHTS
                                </div>

                                <div class="header-line-3">
                                    GOVERNMENT OF KHYBER PAKHTUNKHWA
                                </div>

                            </td>


                            <!-- Right logo -->
                            <td class="logo-cell">
                                <img src="{{ $logoSrc }}" alt="Logo">
                            </td>

                        </tr>

                    </table>

                </div>


                <!-- Certificate title -->
                <div class="title-section">

                    <h1 class="cert-title">
                        REGISTRATION CERTIFICATE
                    </h1>

                </div>


                <!-- Registration information -->
                <div class="meta-section">

                    <table class="meta-table">

                        <tr>

                            <td>
                                Registration No. {{ $registrationNo }}
                            </td>

                            <td class="meta-right">
                                Issue Date: {{ $issueDate->format('d/m/Y') }}
                            </td>

                        </tr>

                    </table>

                </div>


                <!-- Certificate body -->
                <div class="body-section">

                    <div class="body-text">

                        <p class="intro-line">
                            This is to certify that
                        </p>


                        <div class="ngo-name-block">

                            <span class="ngo-name">
                                {{ strtoupper($ngoName) }}
                            </span>

                        </div>


                        <p>
                            has satisfied/fulfilled the requirements of the
                            Khyber Pakhtunkhwa Promotion, Protection and
                            Enforcement of Human Rights Act, 2014 and the
                            Khyber Pakhtunkhwa Non-Governmental Organizations
                            Registration Rules, 2024.
                        </p>


                        <p>
                            In view of the foregoing the registration certification
                            is hereby granted in favour of
                            <strong>{{ strtoupper($ngoName) }}</strong>
                            for a period of three years commencing from
                            <span class="date-highlight">
                                {{ $issueDate->format('d/m/Y') }}
                            </span>
                            and expiring on
                            <span class="date-highlight">
                                {{ $expiryDate->format('d/m/Y') }}
                            </span>.
                        </p>

                    </div>

                </div>

            </div>


            <!-- Footer -->
            <div class="footer-section">

                <table class="footer-table">

                    <tr>

                        <!-- QR code -->
                        <td class="qr-column">

                            <div class="qr-container">

                                @if ($qrCodeImage)

                                    <img
                                        src="{{ $qrCodeImage }}"
                                        alt="QR Code"
                                    >

                                @else

                                    <div class="qr-placeholder">
                                        QR Code
                                    </div>

                                @endif


                                <div class="qr-reg-no">
                                    {{ $registrationNo }}
                                </div>

                            </div>

                        </td>


                        <!-- Signature -->
                        <td class="signature-column">

                            <div class="signature-block">

                                <div class="signature-image">

                                    @if (
                                        !empty($signatureImage) &&
                                        file_exists(public_path('storage/' . $signatureImage))
                                    )

                                        <img
                                            src="{{ asset('storage/' . $signatureImage) }}"
                                            alt="Signature"
                                        >

                                    @endif

                                </div>


                                <div class="dg-title">
                                    Director General
                                    <br>
                                    Law &amp; Human Rights
                                </div>


                                <div class="official-seal">

                                    <img
                                        src="{{ $logoSrc }}"
                                        alt="Seal"
                                    >

                                </div>

                            </div>

                        </td>

                    </tr>

                </table>


                <!-- Contact information -->
                <div class="contact-footer">

                    <strong>Address:</strong>
                    {{ $contactAddress }}

                    &nbsp;&nbsp;|&nbsp;&nbsp;

                    <strong>Email:</strong>
                    {{ $contactEmail }}

                    &nbsp;&nbsp;|&nbsp;&nbsp;

                    <strong>Phone:</strong>
                    {{ $contactPhone }}

                </div>

            </div>

        </div>

    </div>

</body>

</html>
