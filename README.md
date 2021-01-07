# Laravel Realtime Chat Pusher

[![Latest Stable Version](https://poser.pugx.org/febrihidayan/laravel-realtime-chat-pusher/v)](//packagist.org/packages/febrihidayan/laravel-realtime-chat-pusher) [![Total Downloads](https://poser.pugx.org/febrihidayan/laravel-realtime-chat-pusher/downloads)](//packagist.org/packages/febrihidayan/laravel-realtime-chat-pusher) [![Latest Unstable Version](https://poser.pugx.org/febrihidayan/laravel-realtime-chat-pusher/v/unstable)](//packagist.org/packages/febrihidayan/laravel-realtime-chat-pusher) [![License](https://poser.pugx.org/febrihidayan/laravel-realtime-chat-pusher/license)](//packagist.org/packages/febrihidayan/laravel-realtime-chat-pusher)

![Image](https://i.ibb.co/6trP5t0/117851429-1152870708464796-2804219607738423233-o.jpg)

## Installasi
Cara install cukup mudah, jalankan perintah composer dibawah ini.
```
composer create-project  --prefer-dist febrihidayan/laravel-realtime-chat-pusher
```

Kemudian konfirgurasi file `.env`

untuk database
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=chatdb
DB_USERNAME=root
DB_PASSWORD=
```

untuk pusher

```
BROADCAST_DRIVER=pusher
PUSHER_APP_ID=1134231
PUSHER_APP_KEY=f10ed7a75ed3594bfe67
PUSHER_APP_SECRET=96f3200f3926fe9b39e8
PUSHER_APP_CLUSTER=ap1
```

Jangan lupa lakukan printah artisan berikut

- `php artisan migrate`

Kemudian lakukan penginstalan packages

- `npm install` atau `yarn`

## Pemakaian

**Developer**
- `php artisan serve`
- `npm run watch` or `yarn watch`

**Produksi**
- `php artisan serve`
- `npm run prod` or `yarn prod`

