<?php

namespace Database\Factories;
use App\Models\Users;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Users>
 */
class UsersFactory extends Factory
{
    protected $model = Users::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => "Harvey",
            'apellido' => "Riascos",
            'email' => "harveympv33@gmail.com",
            'telefono' => "3226755570",
            'password' => bcrypt('password'), // Contraseña por defecto
        ];
    }
}
