<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SystemSetting;

class SystemSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SystemSetting::create([
            'system_name' => 'Huila Place',
            'tagline' => 'O seu lugar de tecnologia e inovação em Huíla!',
            'description' => 'Huila Place é uma plataforma que oferece soluções tecnológicas avançadas para empresas e indivíduos, focada em desenvolvimento de sistemas, mobile apps, e consultoria em TI. Nosso objetivo é trazer inovação e eficiência para os nossos clientes, com um toque de excelência em cada projeto.',
            'email' => 'josequembi@gmail.com',
            'phone' => '+244 923 101 667',
            'address' => 'Bairro 11 de Novembro, Matala, Huíla, Angola',
            'logo' => 'path/to/logo.png', // Substitua pelo caminho real do logo
            'favicon' => 'path/to/favicon.ico', // Substitua pelo caminho real do favicon
            'social_facebook' => 'https://facebook.com/huilaplace',
            'social_twitter' => 'https://twitter.com/huilaplace',
            'social_linkedin' => 'https://linkedin.com/company/huilaplace',
            'social_instagram' => 'https://instagram.com/huilaplace',
            'footer_text' => '© 2024 Huila Place. Todos os direitos reservados.',
        ]);
    }
}
