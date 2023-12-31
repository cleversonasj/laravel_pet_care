<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RacasSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $racas = [
            'Abissínio',
        'Afegão Hound',
        'Affenpinscher',
        'Airedale Terrier',
        'Akita',
        'American Staffordshire Terrier',
        'Angorá',
        'Basenji',
        'Basset Hound',
        'Beagle',
        'Beagle Harrier',
        'Bearded Collie',
        'Bedlington Terrier',
        'Bengala',
        'Bichon Frisé',
        'Birmanês',
        'Bloodhound',
        'Bobtail',
        'Boiadeiro Australiano',
        'Boiadeiro Bernês',
        'Border Collie',
        'Border Terrier',
        'Borzoi',
        'Boston Terrier',
        'Boxer',
        'Buldogue Francês',
        'Buldogue Inglês',
        'Bull Terrier',
        'Bulmastife',
        'Cairn Terrier',
        'Cane Corso',
        'Cão de Água Português',
        'Cão de Crista Chinês',
        'Cavalier King Charles Spaniel',
        'Chartreux',
        'Chesapeake Bay Retriever',
        'Chihuahua',
        'Chow Chow',
        'Cocker Spaniel Americano',
        'Cocker Spaniel Inglês',
        'Collie',
        'Cornish Rex',
        'Coton de Tuléar',
        'Curl Americano',
        'Dachshund',
        'Dálmata',
        'Dandie Dinmont Terrier',
        'Devon Rex',
        'Dobermann',
        'Dogo Argentino',
        'Dogue Alemão',
        'Fila Brasileiro',
        'Fox Terrier (Pelo Duro e Pelo Liso)',
        'Foxhound Inglês',
        'Galgo Escocês',
        'Galgo Irlandês',
        'Golden Retriever',
        'Grande Boiadeiro Suiço',
        'Greyhound',
        'Grifo da Bélgica',
        'Himalaio',
        'Husky Siberiano',
        'Jack Russell Terrier',
        'King Charles',
        'Komondor',
        'Labradoodle',
        'Labrador Retriever',
        'Lakeland Terrier',
        'Leonberger',
        'Lhasa Apso',
        'Lulu da Pomerânia',
        'Malamute do Alasca',
        'Maine Coon',
        'Maltês',
        'Mastife',
        'Mastim Napolitano',
        'Mastim Tibetano',
        'Munchkin',
        'Napoleon',
        'Norfolk Terrier',
        'Norueguês',
        'Norwich Terrier',
        'Ocicat',
        'Outra',
        'Papillon',
        'Pastor Alemão',
        'Pastor Australiano',
        'Pelo Curto Americano',
        'Pelo Curto Oriental',
        'Persa',
        'Pinscher Miniatura',
        'Poodle',
        'Pug',
        'Ragdoll',
        'Rottweiler',
        'Russian Blue',
        'Scottish Fold',
        'Selkirk Rex',
        'Sem Raça Definida (SRD)',
        'ShihTzu',
        'Silky Terrier',
        'Singapura',
        'Skye Terrier',
        'Snowshoe',
        'Somali',
        'Sphynx',
        'Staffordshire Bull Terrier',
        'Terra Nova',
        'Terrier Escocês',
        'Tosa',
        'Weimaraner',
        'Welsh Corgi (Cardigan)',
        'Welsh Corgi (Pembroke)',
        'West Highland White Terrier',
        'Whippet',
        'Xoloitzcuintli',
        'Yorkshire Terrier',
    ];

    $data = [];
    foreach ($racas as $raca) {
        $data[] = ['nome' => $raca];
    }

    DB::table('racas')->insert($data);
    }
}
