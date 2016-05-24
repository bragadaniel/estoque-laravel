<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call('ProdutoTableSeeder');
    }
}

class ProdutoTableSeeder extends Seeder{

    public function run(){

        DB::insert('insert into produtos (nome, quantidade, valor, descricao) values(?,?,?,?)',
            array('Geladeira', 2, 690.00, 'Side by Side com gelo na porta') );

        DB::insert('insert into produtos (nome, quantidade, valor, descricao) values(?,?,?,?)',
            array('Microondas', 2, 500.00, 'Manda sms quanto termina de esquentar') );

        DB::insert('insert into produtos (nome, quantidade, valor, descricao) values(?,?,?,?)',
            array('Fogão', 1, 90.00, 'Quatro bocas') );

       DB::insert('insert into produtos (nome, quantidade, valor, descricao) values(?,?,?,?)',
            array('Lanterna', 3, 10.00, 'Acende uma luz') );

    }
}
