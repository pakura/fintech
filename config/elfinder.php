<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Public dir
    |--------------------------------------------------------------------------
    |
    | The public dir with extra options.
    |
    */

    'public' => [
        'files' => [
            'alias' => 'Public files',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Filesystem disks (Flysytem)
    |--------------------------------------------------------------------------
    |
    | Define an array of Filesystem disks, which use Flysystem.
    | You can set extra options, example:
    |
    | 'my-disk' => [
    |        'URL' => url('to/disk'),
    |        'alias' => 'Local storage',
    |    ]
    */

    'disks' => [],

    /*
    |--------------------------------------------------------------------------
    | Global roots options
    |--------------------------------------------------------------------------
    |
    | Roots global extra options for all of the Filesystem disks.
    |
    */

    'roots_options' => [
        'uploadAllow' => [
            /*
             * image
             */
            'image/png', 'image/jpeg', 'image/gif', 'image/x-icon', 'image/svg+xml',

            /*
             * application
             */
            'application/zip', 'application/x-rar', 'application/x-gzip', 'application/x-bzip2', 'application/x-tar',
            'application/x-7z-compressed', 'application/pdf', 'application/xml',
            // Microsoft Office
            'application/vnd.ms-office', // old documents
            'application/msword', // doc, dot

            'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // docx
            'application/vnd.openxmlformats-officedocument.wordprocessingml.template', // dotx
            'application/vnd.ms-word.document.macroEnabled.12', // docm
            'application/vnd.ms-word.template.macroEnabled.12', // dotm

            'application/vnd.ms-excel', // xls, xlt, xla

            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // xlsx
            'application/vnd.openxmlformats-officedocument.spreadsheetml.template', // xltx
            'application/vnd.ms-excel.sheet.macroEnabled.12', // xlsm
            'application/vnd.ms-excel.template.macroEnabled.12', // xltm
            'application/vnd.ms-excel.addin.macroEnabled.12', // xlam
            'application/vnd.ms-excel.sheet.binary.macroEnabled.12', // xlsb

            'application/vnd.ms-powerpoint', // ppt, pot, pps, ppa

            'application/vnd.openxmlformats-officedocument.presentationml.presentation', // pptx
            'application/vnd.openxmlformats-officedocument.presentationml.template', // potx
            'application/vnd.openxmlformats-officedocument.presentationml.slideshow', // ppsx
            'application/vnd.ms-powerpoint.addin.macroEnabled.12', // ppam
            'application/vnd.ms-powerpoint.presentation.macroEnabled.12', // pptm
            'application/vnd.ms-powerpoint.template.macroEnabled.12', // potm
            'application/vnd.ms-powerpoint.slideshow.macroEnabled.12', // ppsm

            'application/vnd.ms-access', // mdb

            /*
             * text
             */
            'text/plain', 'text/html',

            /*
             * video
             */
            'video/mp4', 'video/mpeg', 'video/x-msvideo',

            /*
             * audio
             */
            'audio/mpeg'
        ],
        'uploadDeny'  => ['all'],
        'uploadOrder' => 'deny, allow'
    ],

    /*
    |--------------------------------------------------------------------------
    | Routes group config
    |--------------------------------------------------------------------------
    |
    | The default group settings for the elFinder routes.
    |
    */

    'route' => [
        'prefix' => 'filemanager',
        'middleware' => ['web', 'cms.auth'], //Set to null to disable middleware filter
    ],

    /*
    |--------------------------------------------------------------------------
    | Access filter
    |--------------------------------------------------------------------------
    |
    | Filter callback to check the files
    |
    */

    'access' => 'Barryvdh\Elfinder\Elfinder::checkAccess',

    /*
    |--------------------------------------------------------------------------
    | Roots
    |--------------------------------------------------------------------------
    |
    | By default, the roots file is LocalFileSystem, with the above public dir.
    | If you want custom options, you can set your own roots below.
    |
    */

    'roots' => [],

    /*
    |--------------------------------------------------------------------------
    | Options
    |--------------------------------------------------------------------------
    |
    | These options are merged, together with 'roots' and passed to the Connector.
    | See https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options-2.1
    |
    */

    'options' => [],

];
