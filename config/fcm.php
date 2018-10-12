<?php

return [
    'driver' => env('FCM_PROTOCOL', 'http'),
    'log_enabled' => false,

    'http' => [
        'server_key' => env('FCM_SERVER_KEY', 'AAAAsQ0FGUQ:APA91bE8DQk-dUVu9DbD5JBoJ98vnL1lZFw7QbRPKqYa2XMDVTbGZXy-sVZ_Dvj9Z0bygbVF_cVPj5zatr7teRUmr3gfAbtKyJHZ-EJ8O78JpntdFTlKuAdrtyC1zBv--g1ITG8BHpS7'),
        'sender_id' => env('FCM_SENDER_ID', '760427649348'),
        'server_send_url' => 'https://fcm.googleapis.com/fcm/send',
        'server_group_url' => 'https://android.googleapis.com/gcm/notification',
        'timeout' => 30.0, // in second
    ],
];
/*
 * FCM_SERVER_KEY=AAAAsQ0FGUQ:APA91bE8DQk-dUVu9DbD5JBoJ98vnL1lZFw7QbRPKqYa2XMDVTbGZXy-sVZ_Dvj9Z0bygbVF_cVPj5zatr7teRUmr3gfAbtKyJHZ-EJ8O78JpntdFTlKuAdrtyC1zBv--g1ITG8BHpS7
FCM_SENDER_ID=my_secret_sender_id
 *
 *
 *
 *
 */