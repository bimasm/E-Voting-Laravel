
<?php
return [
    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],
    // Guard
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'api' => [
            'driver' => 'token',
            'provider' => 'users',
        ],
        'admin' => [
          'driver' => 'session',
          'provider' => 'admin',
        ],
        'admin-api' => [
            'driver' => 'token',
            'provider' => 'admin',
        ],
        'panitia' => [
          'driver' => 'session',
          'provider' => 'panitia',
        ],
        'panitia-api' => [
            'driver' => 'token',
            'provider' => 'panitia',
        ],
        'mahasiswa' => [
          'driver' => 'session',
          'provider' => 'mahasiswa',
        ],
        'mahasiswa-api' => [
            'driver' => 'token',
            'provider' => 'mahasiswa',
        ],
        
    ],
    //  Providers
    'providers' => [
        'panitia' => [
            'driver' => 'eloquent',
            'model' => App\Panitia::class,
        ],
        'admin' => [
          'driver' => 'eloquent',
          'model' => App\Admin::class,
        ],
        'users' => [
          'driver' => 'eloquent',
          'model' => App\User::class,
        ],
        'mahasiswa' => [
          'driver' => 'eloquent',
          'model' => App\Mahasiswa::class,
        ],
        
    ],
    // Password
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],
];