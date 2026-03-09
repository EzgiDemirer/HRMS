```
# Laravel Tabanlı Çalışan Yönetim Sistemi

## Proje Hakkında

Bu proje Laravel framework kullanılarak geliştirilmiş bir İnsan Kaynakları / Çalışan Yönetim Sistemidir.

Sistem sayesinde yöneticiler:

- Çalışan ekleyebilir
- Çalışan bilgilerini düzenleyebilir
- Departman ve pozisyon ataması yapabilir
- Şube ve vardiya yönetimi gerçekleştirebilir

Proje, Laravel ile CRUD işlemleri, veritabanı yönetimi ve admin panel geliştirme konularını göstermek amacıyla hazırlanmıştır.

------------------------------------------------

Özellikler

Bu sistem aşağıdaki modülleri içermektedir:

- Çalışan Yönetimi (Ekle / Düzenle / Sil / Listele)
- Departman Yönetimi
- İş Kategorileri Yönetimi
- Şube Yönetimi
- Vardiya Tipleri Yönetimi
- Eğitim / Qualification Yönetimi
- İzin Günleri (Occasions) Yönetimi
- İşten Ayrılma Sebepleri Yönetimi

------------------------------------------------

Kullanılan Teknolojiler

Projede aşağıdaki teknolojiler kullanılmıştır:

- Laravel
- PHP
- MySQL
- Blade Template Engine
- Bootstrap
- JavaScript
- jQuery
- Laravel Migration & Seeder

------------------------------------------------

Veritabanı Yapısı

Projede kullanılan temel tablolar:

- admins
- employees
- branches
- departements
- jobs_categories
- qualifications
- shifts_types
- resignations
- occasions

Veritabanı yapısı Laravel migration sistemi ile oluşturulmaktadır.

------------------------------------------------

Kurulum

1. Projeyi klonlayın

git clone https://github.com/kullanici-adi/proje-adi.git

2. Proje klasörüne girin

cd proje-adi

3. Gerekli paketleri yükleyin

composer install

4. .env dosyasını oluşturun

cp .env.example .env

5. Veritabanı ayarlarını yapın (.env dosyasında)

DB_DATABASE=employee_system
DB_USERNAME=root
DB_PASSWORD=

6. Laravel uygulama anahtarını oluşturun

php artisan key:generate

7. Migrationları çalıştırın

php artisan migrate

8. Demo verileri ekleyin

php artisan db:seed

9. Projeyi çalıştırın

php artisan serve

Tarayıcıdan açın:

http://127.0.0.1:8000
```