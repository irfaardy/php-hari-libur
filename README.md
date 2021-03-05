
# 📅 PHP Hari Libur
[![Maintainability](https://api.codeclimate.com/v1/badges/e94175abb35f041a77da/maintainability)](https://codeclimate.com/github/irfaardy/php-hari-libur/maintainability) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/irfaardy/php-hari-libur/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/irfaardy/php-hari-libur/?branch=master) [![Support me](https://img.shields.io/badge/Support-Buy%20me%20a%20coffee-yellow.svg?style=flat-square)](https://www.buymeacoffee.com/OBaAofN) [![ko-fi](https://www.ko-fi.com/img/githubbutton_sm.svg)](https://ko-fi.com/S6S52P7SN)

Plugin ini berfungsi untuk mengecek hari libur nasional, untuk sekarang baru libur nasional di Indonesia.

Hari libur pada plugin ini akan selalu di update tiap tahun.

<h3>🛠️ Installation with Composer </h3>

    composer require irfa/php-hari-libur

>You can get Composer [ here]( https://getcomposer.org/download/)

***


<h2>🛠️ Laravel Setup </h2>

<h3>Add to config/app.php</h3>

```php
'providers' => [
    ....
    Irfa\HariLibur\HariLiburServiceProvider::class,
     ];
```

<h3>Add to config/app.php</h3>

```php
'aliases' => [
         ....
        'HariLibur' => Irfa\HariLibur\Facades\HariLibur::class,

    ],
```

  <h2>Publish Vendor</h2>


    php artisan vendor:publish --tag=hari-libur

<h2>Konfigurasi untuk Laravel</h2>

```php
config/irfa/hari_libur.php
```

<h2>Konfigurasi non-Laravel</h2>

```
/vendor/irfa/php-hari-libur/config/hari_libur.php
```

Jika anda menggunakan framework Laravel anda bisa mengubah atau menambah tanggal libur di `resources/data-libur-nasional/XX.json` sedangkan jika anda menggunakan PHP Native atau non-Laravel anda bisa mengubahnya di `vendor/irfa/php-hari-libur/src/Data/XX.json`

<hr><h2>Usage</h2>

<hr>

<h3>Memanggil class HariLibur</h3>

<h3>PHP Native / Non-Laravel</h3>

```
use Irfa\HariLibur\Func\HariLibur;
```

Jika di Laravel bisa juga menggunakan ini

```php
use Irfa\HariLibur\Facades\HariLibur;
atau
use HariLibur;
```

<h3>
    Jika menggunakan PHP Native atau non-Laravel untuk contoh penggunaannya seperti ini
</h3>

```php
use Irfa\HariLibur\Func\HariLibur;
....
$libur = new HariLibur();
var_dump($libur->date("17-08-2021")->isHoliday());
```


<h3>Mengecek hari libur nasional pada tanggal yang dipilih</h3>

```php
HariLibur::date("17-08-2021")->isHoliday();
//return true
```

<h3>Contoh Penggunaan</h3>

```php
if(HariLibur::date("17-08-2021")->isHoliday())
{
    echo "Waktunya liburan.";
} else {
    echo "Waktunya bekerja.";
}
```

<h3>Mengecek hari libur akhir pekan pada tanggal yang dipilih</h3>

```php
HariLibur::date("17-03-2021")->isWeekend();
//return false
```

<h3>Contoh Penggunaan</h3>

```php
if(HariLibur::date("17-08-2021")->isWeekend())
{
    echo "Selamat berakhir pekan.";
} else {
    echo "Waktunya bekerja.";
}
```

<h3>Mengecek hari libur pada tanggal yang dipilih</h3>

Fungsi ini merupakan gabungan dari fungsi diatas.
Digunakan untuk mengecek tanggal merah dan akhir pekan.

```php
HariLibur::date("17-08-2021")->isDayOff();
//return true
```

<h3>Mengambil hari libur nasional sebelum dan setelahnya</h3>

```php
HariLibur::date("17-08-2021")->nextHoliday(); 
// mengambil data hari libur setelah tanggal 17-03-2021
HariLibur::date("17-08-2021")->prevHoliday(); 
// mengambil data hari libur setelah tanggal 17-03-2021
```

<h3>Contoh Penggunaan</h3>

```php
$date = HariLibur::date("17-08-2021");
//mengambil data hari libur sebelum tangal 17-08-2021
foreach ($date->nextHoliday() as $hariLibur) {
    echo "Tanggal: ".$hariLibur->date." Deskripsi: ".$hariLibur->description."<br>";
  }
//mengambil data hari libur sesudah tangal 17-08-2021
foreach ($date->prevHoliday() as $hariLibur) {
    echo "Tanggal: ".$hariLibur->date." Deskripsi: ".$hariLibur->description."<br>";
  }
```

<h3>Mengambil data hari libur</h3>

Mengambil semua data hari libur nasional sesuai regional yang diatur di konfigurasi.

```php
HariLibur::get();
```

<h3>Contoh Penggunaan</h3>

```php
foreach (HariLibur::get() as $hariLibur) {
		echo "Tanggal: ".$hariLibur->date." Deskripsi: ".$hariLibur->description."<br>";
	}
```



<h3>Mengambil informasi libur pada tanggal yang dipilih</h3>

```php
HariLibur::date("17-08-2021")->getInfo();
//return Hari Kemerdekaan Republik Indonesia
```

<h3>Mengatur Regional secara terprogram</h3>

```php
HariLibur::regional("ID")->get();
```

<hr>
<h2>Menghapus Plugin</h2>

<hr>

```php
composer remove irfa/php-hari-libur
```

setelah remove berhasil ada langkah tambahan jika menggunakan framework Laravel:

1. buka `config/app.php`
2. cari `providers` lalu hapus `Irfa\HariLibur\HariLiburServiceProvider::class`
3. cari `aliases` lalu hapus `'HariLibur' => Irfa\HariLibur\Facades\HariLibur::class,`
4. Simpan.

<hr><h2>How to Contributing?</h2>

1. Fork it (<https://github.com/irfaardy/php-hari-libur/fork>)
2. Commit your changes (`git commit -m 'New Feature'`)
3. Push to the branch (`git push origin your-branch`)
4. Create a new Pull Request ` your-branch -> master`

if you found bug or error, please post here https://github.com/irfaardy/php-hari-libur/issues so that they can be maintained together.



***
## Bagaimana cara berkontribusi?

1. Lakukan fork di (https://github.com/irfaardy/php-hari-libur/fork)
2. Commit perubahan yang anda lakukan (`git commit -m 'Fitur Baru'`)
3. Push ke branch master (`git push origin branch-kamu`)
4. Buat Pull Request baru `branch-kamu -> master`

---
## Issue
If you found issues or bug please create new issues here https://github.com/irfaardyphp-hari-libur/issues/new

Jika anda menemukan bug atau error silahkan posting disini https://github.com/irfaardy/php-hari-libur/issues agar dapat diperbaiki bersama-sama.

***

Sumber libur nasional Indonesia : https://kalenderindonesia.com/libur/masehi/2021#

<b>License</b><br>
[![GitHub license](https://img.shields.io/github/license/irfaardy/encrypt-file-laravel?style=flat-square)](https://github.com/irfaardy/encrypt-file-laravel/blob/master/LICENSE)
