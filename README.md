# Project Test - Laravel 8.0+ Jetstream and Tailwind CSS Admin Theme

## Requirements

- Laravel installer
- Composer
- Npm installer

## Installation

```
# Clone the repository dari GitHub:
git clone 

# cd masuk ke project direktori dengan cmd / bash
cd restoran

#install composer and npm packages
composer install
npm install && npm run dev

# Start prepare the environment:
cp .env.example .env // setup database saya menggunakan mysql
php artisan key:generate
php artisan migrate
php artisan storage:link

# Run your server
php artisan serve

```

## Rancangan Database
   - ada di root project dbdesign.pdf

## Api Documentation

```
apiMakanan.json di root project
import di postman

example
localhost:8000/api/kategoriMakanan  // method get 

response

{
    "success": true,
    "message": "successfully",
    "data": [
        {
            "id": 1,
            "resep_id": 4,
            "name": "Nasi Goreng",
            "created_at": "2021-09-15T06:27:07.000000Z",
            "updated_at": "2021-09-15T07:16:38.000000Z",
            "kategori": {
                "id": 4,
                "name": "main course",
                "created_at": "2021-09-15T03:49:07.000000Z",
                "updated_at": "2021-09-15T03:52:32.000000Z",
                "bahan": [
                    {
                        "id": 1,
                        "kategori_id": 4,
                        "name": "nasi",
                        "katerangan": "1 piring",
                        "created_at": "2021-09-15T04:17:50.000000Z",
                        "updated_at": "2021-09-15T04:17:50.000000Z"
                    },
                    {
                        "id": 2,
                        "kategori_id": 4,
                        "name": "Cabe",
                        "katerangan": "1 kilo",
                        "created_at": "2021-09-15T04:28:18.000000Z",
                        "updated_at": "2021-09-15T04:28:18.000000Z"
                    },
                    {
                        "id": 3,
                        "kategori_id": 4,
                        "name": "bawang butih",
                        "katerangan": "1 buah",
                        "created_at": "2021-09-15T05:55:26.000000Z",
                        "updated_at": "2021-09-15T05:55:26.000000Z"
                    },
                    {
                        "id": 4,
                        "kategori_id": 4,
                        "name": "bawang merah",
                        "katerangan": "2 buah",
                        "created_at": "2021-09-15T05:55:42.000000Z",
                        "updated_at": "2021-09-15T05:55:42.000000Z"
                    }
                ]
            }
        },
        {
            "id": 2,
            "resep_id": 6,
            "name": "coba",
            "created_at": "2021-09-15T07:16:04.000000Z",
            "updated_at": "2021-09-15T07:16:04.000000Z",
            "kategori": {
                "id": 6,
                "name": "baru",
                "created_at": "2021-09-15T07:15:23.000000Z",
                "updated_at": "2021-09-15T07:15:23.000000Z",
                "bahan": [
                    {
                        "id": 5,
                        "kategori_id": 6,
                        "name": "loncang",
                        "katerangan": "1 kilo",
                        "created_at": "2021-09-15T07:15:45.000000Z",
                        "updated_at": "2021-09-15T07:15:45.000000Z"
                    }
                ]
            }
        }
    ]
}
```

## Video 
-ada di root project video.mkv

<video>
    <source src="video.mkv" type="video/mp4">
</video>


