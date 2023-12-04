<?php

namespace App\Http\Controllers;

use App\Models\MainTask;
use Illuminate\Http\Request;

class MainTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //MainTask::all();
        // SELECT * FORM main-TASKA
        return view('main_task.mainTask');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MainTask $mainTask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MainTask $mainTask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MainTask $mainTask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MainTask $mainTask)
    {
        //
    }

    public function createMainTask()
    {
        MainTask::create([
            'level' => 1,
            'points' => 1,
            'name' => 'Počet áut',
            'description' => 'Starší pán si nevie zapamätať, koľko áut má. Vieme, že má jedno červené a jedno modré, uložte tento počet áut do premennej pocet_aut, následne mu vypíšte tento počet do konzoly.',
            'result' => '2',
        ]);

        MainTask::create([
            'level' => 1,
            'points' => 1,
            'name' => 'Tajomstvo zlatého pomeru',
            'description' => 'Matematik s menom Menelaos, považuje zlatý pomer za najkrajšie číslo, zlatý pomer sa v zlomku píše ako 2/3 vypíš ho pomocou desatinného čísla, nech vie ako vyzerá aj v tomto prípade.',
            'result' => '0.666',
        ]);

        MainTask::create([
            'level' => 1,
            'points' => 1,
            'name' => 'Denis a Sofia',
            'description' => 'Denis a Sofia sú súrodenci, obaja dostali od maminy 2 jablká, Denis ale stihol jedno zjesť, vypíšte do konzoly, koľko jabĺk má Denis a koľko Sofia. Vypíšte to v tvare: Denis ma <cislo> a Sofia ma <cislo>. Namiesto <cislo> vypíšte počet jabĺk.',
            'result' => 'Denis ma 1 a Sofia ma 2',
        ]);

        MainTask::create([
            'level' => 2,
            'points' => 2,
            'name' => 'Denis a Sofia (2)',
            'description' => 'Denis a Sofia dostali tentokrát od maminy hrušky, Denis dostal 19 a Sofia len 3, chceli by vedieť koľko ich dostali spolu, vypíš súčet hrušiek do konzoly.',
            'result' => '22',
        ]);

        MainTask::create([
            'level' => 2,
            'points' => 2,
            'name' => 'Programátorova výplata',
            'description' => 'Programátor pracuje už 1 rok pre firmu ITT, každý mesiac v roku zarobil 1399€ avšak raz dostal k výplate odmenu 300€ vypíšte celým číslom koľko eur zarobil za rok.',
            'result' => '17088',
        ]);

        MainTask::create([
            'level' => 2,
            'points' => 2,
            'name' => 'Objem kocky',
            'description' => 'Stavbár Jano kúpil kvádry v tvare kocky, ktorá má hranu 1.2m, vypočítajte objem tejto kocky a vypíšte ho do konzoly v tvare desatinného čísla.',
            'result' => '1,728',
        ]);

        MainTask::create([
            'level' => 3,
            'points' => 3,
            'name' => 'Výpis čísel',
            'description' => 'Vypíšte do konzoly čísla od 1 do 10 oddelné medzerou.',
            'result' => '1 2 3 4 5 6 7 8 9 10',
        ]);

        MainTask::create([
            'level' => 3,
            'points' => 3,
            'name' => 'Znaky vo vete',
            'description' => 'Dostali sme vetu: "Ucim sa programovat, prave teraz pracujem s cyklom for.", vypíšte do konzoly počet znakov v tejto vete.',
            'result' => '55',
        ]);

        MainTask::create([
            'level' => 3,
            'points' => 3,
            'name' => 'Výpis čísel (2)',
            'description' => 'Vypíšte do konzoly všetky párne čísla od 1 po 45 oddelené medzerou, vynechajte číslo 10.',
            'result' => '2 4 6 8 12 14 16 18 20 22 24 26 28 30 32 34 36 38 40 42 44',
        ]);

        MainTask::create([
            'level' => 4,
            'points' => 6,
            'name' => 'Stromček z hviezdičiek',
            'description' => 'Pomocou for cyklu vypíšte do konzoly stromček z hviezdičiek, ktorý bude mať 5 riadkov. bude vypadať takto: XXXX*XXXX\nXXX***XXX\nXX*****XX\nX*******X\n*********',
            'result' => 'XXXX*XXXX\nXXX***XXX\nXX*****XX\nX*******X\n*********',
        ]);
        return "Záznam bol úspešne vytvorený.";
    }
}
