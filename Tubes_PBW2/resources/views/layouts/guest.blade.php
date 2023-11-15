<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom-colours.css') }}">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased dark:bg-black">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[color:#002F5B]  bg-[color:#002F5B]">
            <div>
                <a href="https://tenor.com/view/jerma-stare-gif-25080910">
                    <svg width="172" height="111" viewBox="0 0 172 111" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M82.7636 8.8252V15.9502H75.3975V20.7002H82.7636V27.8252H87.6743V20.7002H95.0404V15.9502H87.6743V8.8252H82.7636Z" fill="#FF0000"></path>
                        <path d="M85.0595 0C74.5132 0 66 8.51324 66 19.0595C66 31.7658 85.0595 50.8253 85.0595 50.8253C85.0595 50.8253 104.119 31.7658 104.119 19.0595C104.119 8.51324 95.6057 0 85.0595 0ZM85.0595 6.35316C92.1115 6.35316 97.7658 12.071 97.7658 19.0595C97.7658 26.1115 92.1115 31.7658 85.0595 31.7658C78.071 31.7658 72.3532 26.1115 72.3532 19.0595C72.3532 12.071 78.071 6.35316 85.0595 6.35316Z" fill="white"></path>
                        <g filter="url(#filter0_d_17_2)">
                        <path d="M27.3906 101H21.8975V82.1523C21.8975 81.1595 22.0114 79.776 22.2393 78.002L17.3076 97.5088H14.4023L9.44629 78.002C9.67415 79.8086 9.78809 81.1921 9.78809 82.1523V101H4.29492V62.792H9.69043L15.6963 83.9102C15.7614 84.138 15.8102 84.7158 15.8428 85.6436C15.8428 85.2367 15.8916 84.6589 15.9893 83.9102L21.9951 62.792H27.3906V101ZM47.6299 97.9482C47.6299 99.9827 46.5801 101 44.4805 101H34.8369C32.7373 101 31.6875 99.9827 31.6875 97.9482V79.3936C31.6875 77.359 32.7373 76.3418 34.8369 76.3418H44.4805C46.5801 76.3418 47.6299 77.359 47.6299 79.3936V88.4512L46.0918 89.9893H37.0342V96.8984H42.2832V92.7969H47.6299V97.9482ZM42.2832 86.3516V80.4434H37.0342V86.3516H42.2832ZM68.0645 101H62.498V100.146C58.722 100.813 56.6061 101.146 56.1504 101.146C54.7507 101.146 53.652 100.74 52.8545 99.9258C52.057 99.0957 51.6582 97.9727 51.6582 96.5566V81.2979C51.6582 79.2959 52.3743 77.9043 53.8066 77.123C54.8483 76.5371 56.4271 76.2441 58.543 76.2441C59.015 76.2441 59.6986 76.2604 60.5938 76.293C61.4889 76.3255 62.1237 76.3418 62.498 76.3418V62.792H68.0645V101ZM62.498 96.1904V81.0049H59.0557C57.8187 81.0049 57.2002 81.6234 57.2002 82.8604V94.6523C57.2002 95.8568 57.7861 96.459 58.958 96.459C59.2347 96.459 60.4147 96.3695 62.498 96.1904ZM89.0117 67.8457H82.7129V101H77.0244V67.8457H70.7256V62.792H89.0117V67.8457ZM107.2 86.6445H101.658V81.0049L97.2393 81.1025V101H91.6484V76.3418H97.2393V77.2451C98.3949 77.0335 99.5423 76.8219 100.682 76.6104C102.065 76.3662 103.221 76.2441 104.148 76.2441C106.183 76.2441 107.2 77.2451 107.2 79.2471V86.6445ZM126.243 101H120.896V100.146C119.627 100.341 118.357 100.536 117.088 100.731C115.428 100.976 114.166 101.098 113.304 101.098C111.269 101.098 110.252 100.097 110.252 98.0947V89.208C110.252 87.1735 111.302 86.1562 113.401 86.1562H120.945V80.4922H115.599V84.0078H110.545V79.3936C110.545 77.359 111.595 76.3418 113.694 76.3418H123.143C125.21 76.3418 126.243 77.359 126.243 79.3936V101ZM120.945 96.5566V89.9404H115.599V96.752L120.945 96.5566ZM167.332 101H161.375L156.468 89.6963V101H150.877V62.792H156.468V85.7412L160.887 76.3418H166.722V76.4395L161.033 87.6455L167.332 101Z" fill="white"></path>
                        </g>
                        <path d="M140.146 77.66C135.249 77.5836 130.633 80.5977 128.912 85.475C126.75 91.5992 129.96 98.3101 136.085 100.471C140.962 102.193 146.206 100.491 149.22 96.6305C147.984 96.5996 146.704 96.4285 145.457 95.9884C139.333 93.8271 136.123 87.1162 138.285 80.992C138.725 79.7449 139.367 78.6316 140.146 77.66Z" fill="white"></path>
                        <defs>
                        <filter id="filter0_d_17_2" x="0.294922" y="62.792" width="171.037" height="46.3545" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix>
                        <feOffset dy="4"></feOffset>
                        <feGaussianBlur stdDeviation="2"></feGaussianBlur>
                        <feComposite in2="hardAlpha" operator="out"></feComposite>
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"></feColorMatrix>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_17_2"></feBlend>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_17_2" result="shape"></feBlend>
                        </filter>
                        </defs>
                        </svg>
                    <!-- ganti logo, sesuain sama app -->
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
