<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurantsData = [
            [
                'name' => "ร้านอาหารเพลิน",
                'address' => "7/428 ถนน วิภาวดีรังสิต แขวงจตุจักร เขตจตุจักร กรุงเทพมหานคร 10900",
                'latitude' => 13.8234846,
                'longitude' => 100.5050303,
            ],
            [
                'name' => "ร้านอาหารมุมทอง",
                'address' => "155/51 หมู่ 5 หมู่บ้านสมชาย ตำบลบางกรวย อำเภอบางกรวย นนทบุรี 11130",
                'latitude' => 13.808336,
                'longitude' => 100.4605312,
            ],
            [
                'name' => "บ้านตา-ยาย ร้านอาหารไทย",
                'address' => "10 ซอย วิภาวดีรังสิต 13 แขวงจตุจักร เขตจตุจักร กรุงเทพมหานคร 10900",
                'latitude' => 13.8222788,
                'longitude' => 100.5189982,
            ],
            [
                'name' => "ร้านอาหารประพักตร์",
                'address' => "89/165 ถนน เทศบาลสงเคราะห์ แขวงลาดยาว เขตจตุจักร กรุงเทพมหานคร 10900",
                'latitude' => 13.8222788,
                'longitude' => 100.5189982,
            ],
            [
                'name' => "ร้านอาหารบ้านไอซ์ ประชาชื่น",
                'address' => "99/203 ถนน เทศบาลสงเคราะห์ แขวงลาดยาว เขตจตุจักร กรุงเทพมหานคร 10900",
                'latitude' => 13.8222788,
                'longitude' => 100.5189982,
            ],
            [
                'name' => "ร้านอาหารมุมทอง",
                'address' => "155/51 หมู่ 5 หมู่บ้านสมชาย ตำบลบางกรวย อำเภอบางกรวย นนทบุรี 11130",
                'latitude' => 13.808336,
                'longitude' => 100.4605312,
            ],
            [
                'name' => "ร้านครัวใจดี",
                'address' => "40, 31 ถ. กำแพงเพชร 6 แขวงลาดยาว เขตจตุจักร กรุงเทพมหานคร 10900",
                'latitude' => 13.850017,
                'longitude' => 100.5235494,
            ],
            [
                'name' => "ร้านอาหารไก่เพชร",
                'address' => "7 6 ซอย ลาดพร้าว 8 แยก 3 แขวงจอมพล เขตจตุจักร กรุงเทพมหานคร 10900",
                'latitude' => 13.8103156,
                'longitude' => 100.5261512,
            ],
            [
                'name' => "Three Mangoes บ้านไทย ชายคลอง",
                'address' => "76 ถ. นครอินทร์ ตำบล บางขนุน อำเภอบางกรวย นนทบุรี 11130",
                'latitude' => 13.8237315,
                'longitude' => 100.428911,
            ],
            [
                'name' => "ร้านอาหารตามสั่ง ครัวมิตรภาพ พหลโยธิน 23",
                'address' => "4 117 ถนน วิภาวดีรังสิต แขวงจตุจักร เขตจตุจักร กรุงเทพมหานคร 10900",
                'latitude' => 13.8260839,
                'longitude' => 100.5228115,
            ],
        ];
        foreach ($restaurantsData as $restaurantData) {
            Restaurant::create($restaurantData);
        };
    }
}
