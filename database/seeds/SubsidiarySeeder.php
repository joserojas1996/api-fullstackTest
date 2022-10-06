<?php

use App\Models\Subsidiary;
use Illuminate\Database\Seeder;

class SubsidiarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();
        $city = [
            ['Argentina', 'AR', 'Peso argentino', 'ARS', '$'],
            ['Brazil', 'BR', 'Real brasileño', 'BRL', 'R$'],
            ['Chile', 'CL', 'Peso chileno', 'CLP', '$'],
            ['Colombia', 'CO', 'Peso colombiano', 'COP', '$'],
            ['Venezuela', 'VE', 'Bolívar', 'VES', 'Bs']
        ];
        foreach ($city as $item) {
            Subsidiary::create([
                'name'              => $item[0],
                'iso'               => $item[1],
                'currency_name'     => $item[2],
                'currency_code'     => $item[3],
                'currency_symbol'   => $item[4],
                'created_at'        => $now,
                'updated_at'        => $now
            ]);
        }
    }
}
