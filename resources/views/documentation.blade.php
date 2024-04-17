@extends('layouts.app')

@section('content')
<link href="{{ asset('storage/css/subPages.css')}}" rel="stylesheet" type="text/css" >
<div class=".container-fluid">
    <div class="documentation-section">
        <h2>#1 Prvý kód v C++</h2>
        <p>Každý program v jazyku C++ začína funkciou main. Táto funkcia je vstupným bodom vášho programu. Na konci kódu sa musí vždy nachádzať návratová hodnota, väčšinou je to 0. Túto návratovú hodnotu píšeme ako <code>return 0;</code> V jazyku C++ vieme písať komentáre do kódu, ktoré slúžia len pre objasnenie čo v kóde robíme, píše sa to za <code>//</code>. Na konci každého riadku musíme zapísať <code>;</code> aby počítač pri spustení programu vedel kde končí funkcia, ktorú programátor napísal.</p>
        <pre><code>#include &lt;iostream&gt;

int main() {
    // Tu píšeme kód
    return 0;
}

// using namespace std; pod knižnicou iostream umožňuje zjednodušené písanie kódu 
</code></pre>
        <p>Takže prvý krok pri vytváraní kódu bude začínať následovne:</p>
        <pre><code>#include &lt;iostream&gt;
using namespace std;

int main() {
    // Tu píšeme kód
    return 0;
}
</code></pre>
    </div>

    <div class="documentation-section">
        <h2>#2 Vytvorenie premenných a výpis programu</h2>
        <p>V programovaní používame premenné, ktoré treba na začiatku deklarovať. Máme niekoľko typov ako sú <code>int</code>, <code>double</code>, <code>char</code>.</p>
        <ul>
            <li><code>int</code> predstavuje celé číslo</li>
            <li><code>double</code> predstavuje desatinné číslo</li>
            <li><code>char</code> predstavuje znak, ako napríklad písmeno, alebo rôzne iné znaky</li>
        </ul>
        <pre><code>#include &lt;iostream&gt;
using namespace std;

int main() {
    int celeCislo = 1;
    double desatinneCislo = 1.29;
    char znak = 'A';
    char znakDva = '+';

    return 0;
}
</code></pre>
        <p>Príklad výpisu premenných pomocou <code>cout</code>:</p>
        <pre><code>#include &lt;iostream&gt;
using namespace std;
            
int main() {
    int celeCislo = 1;
    double desatinneCislo = 1.29;
    char znak = 'A';
    char znakDva = '+';

    cout &lt;&lt; "Cele cislo: " &lt;&lt; celeCislo &lt;&lt; endl;
    cout &lt;&lt; "Desatinne cislo: " &lt;&lt; desatinneCislo &lt;&lt; endl;
    cout &lt;&lt; "Znak: " &lt;&lt; znak &lt;&lt; endl;
    cout &lt;&lt; "Druhy znak: " &lt;&lt; znakDva &lt;&lt; endl;

    return 0;
}
</code></pre>
    </div>

    <div class="documentation-section">
        <h2>#3 Sčítavanie, odčítavanie, násobenie, delenie</h2>
        <p>Keď už vieme deklarovať (vytvárať) premenné, tak s nimi môžeme pracovať a to tak, že použijeme medzi nimi rôzne operandy (napríklad <code>+</code> <code>-</code> <code>/</code> <code>*</code>).</p>
        <pre><code>#include &lt;iostream&gt;
using namespace std;

int main() {
    int x = 1;
    int y = 2;
    int vysledok = 0;

    double xDouble = 1.45;
    double yDouble = 2.15;
    double vysledokDouble = 0;

    vysledok = x - y; // vysledok bude rovny cislu -1
    vysledokDouble = xDouble + yDouble; // vysledokDouble bude rovny 3.6

    return 0;
}
</code></pre>
    </div>

    <div class="documentation-section">
        <h2>#4 Cyklus for</h2>
        <p>Cyklus <code>for</code> je jedným z najpoužívanejších programátorských nástrojov, ktorý umožňuje opakované vykonávanie určitého bloku kódu. Je ideálny pre situácie, kde viete, koľko krát chcete opakovať daný kód.</p>
        <pre><code>#include &lt;iostream&gt;
using namespace std;
            

int main() {
    // Cyklus for na výpis čísel od 1 do 5
    for (int i = 1; i &lt;= 5; i++) {
        cout &lt;&lt; i &lt;&lt; endl;
    }

    return 0;
}
</code></pre>
    </div>

    {{-- Predchádzajúce sekcie --}}

<div class="documentation-section">
    <h2>#5 Vnorené cykly</h2>
    <p>Vnorené cykly sú cykly, ktoré sa nachádzajú vnútri iného cyklu. Sú užitočné pre prácu s viacrozmernými dátovými štruktúrami, ako sú napríklad dvojrozmerné polia (matica). Každá iterácia vonkajšieho cyklu môže spustiť celý vnútorný cyklus.</p>
    
    <h3>Príklad vnoreného cyklu for</h3>
    <p>Predstavme si, že chceme vytvoriť tabuľku násobkov pre čísla od 1 do 5. Na tento účel môžeme použiť vnorené cykly for:</p>
    
    <pre><code class="language-cpp">// Vnorené cykly for na vytvorenie tabuľky násobkov
#include &lt;iostream&gt;
using namespace std;

int main() {
    for (int i = 1; i &lt;= 5; i++) {
        for (int j = 1; j &lt;= 5; j++) {
            cout &lt;&lt; i * j &lt;&lt; ' ';
        }
        cout &lt;&lt; endl; // Po dokončení vnútorného cyklu prejdeme na nový riadok
    }
    return 0;
}
</code></pre>
    
    <p>V tomto príklade, vonkajší cyklus (s premennou <code>i</code>) sa vykonáva päťkrát. Pre každú iteráciu vonkajšieho cyklu sa vnútorný cyklus (s premennou <code>j</code>) tiež vykonáva päťkrát. Výsledkom je výpis tabuľky násobkov od 1 do 5.</p>
    
    <h3>Tipy pre prácu s vnorenými cyklami</h3>
    <ul>
        <li>Dbajte na to, aby ste mali správne nastavené podmienky pre ukončenie cyklov, aby ste predišli nekonečným cyklom.</li>
        <li>Používajte vhodné názvy premenných, ktoré jasne odrážajú ich účel a rozsah použitia.</li>
        <li>Pre lepšiu čitateľnosť kódu odsadzujte vnútorné cykly oproti vonkajším.</li>
    </ul>
</div>


</div>

<div class="documentation-section">
    <h2>#6 Argumenty v hlavnej funkcii main</h2>
    <p>V jazyku C++ môžete použiť argumenty v hlavnej funkcii <code>main</code> - <code>argc</code> a <code>argv</code>. <code>argc</code> obsahuje počet argumentov predaných programu a <code>argv</code> je pole reťazcov obsahujúce tieto argumenty.</p>
    <pre><code>#include &lt;iostream&gt;
using namespace std;

int main(int argc, char* argv[]) {
    // argc obsahuje počet argumentov
    // argv je pole reťazcov obsahujúce argumenty

    cout &lt;&lt; "Počet argumentov: " &lt;&lt; argc &lt;&lt; endl;

    cout &lt;&lt; "Argumenty:" &lt;&lt; endl;
    for (int i = 0; i &lt; argc; ++i) {
        cout &lt;&lt; "argv[" &lt;&lt; i &lt;&lt; "] = " &lt;&lt; argv[i] &lt;&lt; endl;
    }

    // Príklad: Uloženie argumentov do premenných
    if (argc &gt;= 2) {
        // Argumenty sú k dispozícii vo forme reťazcov v poli argv
        // Prevedieme ich na požadované dátové typy a uložíme do premenných
        int argument1 = atoi(argv[1]); // Príklad: Prvý argument je celé číslo
        double argument2 = atof(argv[2]); // Príklad: Druhý argument je desatinné číslo
        string argument3 = argv[3]; // Príklad: Tretí argument je reťazec

        // Teraz môžete použiť tieto premenné vo vašom kóde
        cout &lt;&lt; "Prvý argument: " &lt;&lt; argument1 &lt;&lt; endl;
        cout &lt;&lt; "Druhý argument: " &lt;&lt; argument2 &lt;&lt; endl;
        cout &lt;&lt; "Tretí argument: " &lt;&lt; argument3 &lt;&lt; endl;
    } else {
        cout &lt;&lt; "Nedostatočný počet argumentov." &lt;&lt; endl;
    }

    return 0;
}
</code></pre>
</div>



@endsection
