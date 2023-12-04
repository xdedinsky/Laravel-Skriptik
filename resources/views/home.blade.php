@extends('layouts.app')

@section('content')
<style>
  .intro-container {
    background-color: #181818;
    max-width: 800px;
    text-align: center;
    padding: 20px;
    border: 2px solid rgb(3, 252, 194);
    border-radius: 16px;
    box-shadow: 0 0 40px rgba(31, 251, 185, 0.5);
    margin: 20px;
    margin-left: calc(50% - 400px);
  }

  .intro-heading {
    font-size: 28px;
    font-weight: bold;
    color: rgb(3, 252, 194);
    margin-bottom: 20px;
  }

  .intro-text-white {
    font-size: 18px;
    color: #E1E2E2;
    margin-bottom: 10px;
  }

  .intro-text-yellow {
    font-size: 18px;
    color: rgb(3, 252, 194);
    margin-bottom: 10px;
  }

  .intro-list li {
    margin: 10px 0;
  }

  .intro-list {
    list-style-type: none;
    padding: 0;
    text-align: center;
  }

  .highlighted-text {
    font-size: 18px;
    color: rgb(3, 252, 194);
  }
</style>
<div class="center-div">
    <div class="intro-container">
        <h1 class="intro-heading">Vitajte na stránke "Mladý kóder"!</h1>
        <p class="intro-text-white">
            Toto je miesto určené pre mladých žiakov, ktorí sa chcú naučiť programovať a zdokonaľovať svoje
            programátorské schopnosti. Na tejto stránke nájdete 3 úrovne zložitosti + úroveň BONUS, ktoré Vám umožnia postupovať a
            zdokonaliť
            sa v programovaní. Za dané úlohy získavate body podľa úrovne.
        </p>
        <br>
        <p class="intro-text-white">
            Úlohy sú rozdelené do troch úrovní:
        <ul class="intro-list">
            <li>
                <span class="highlighted-text">1. úroveň:</span> <span class="intro-text-white">1 bod </span>
            </li>
            <li>
                <span class="highlighted-text">2. úroveň:</span> <span class="intro-text-white">2 body</span>
            </li>
            <li>
                <span class="highlighted-text">3. úroveň:</span> <span class="intro-text-white">3 body</span>
            </li>
            <li>
                <span class="highlighted-text">BONUS:</span> <span class="intro-text-white">6 bodov</span>
            </li>
        </ul>

        </p>
        <br>
        <p class="intro-text-white">
            Aby ste mohli získavať body za svoje riešenia, je potrebné si vytvoriť užívateľský účet. Tento účet Vám
            umožní
            sledovať svoj pokrok, zbierať body a porovnávať sa s ostatnými kódermi na stránke.
        </p>
        <br>
        <p class="intro-text-white">
            Takže neváhajte a začnite s programovaním! Zlepšujte svoje schopnosti, riešte úlohy na rôznych úrovniach a
            postupujte na špičku rebríčka. Tešíme sa na Vaše kódovanie!
        </p>
        <br>
        <p class="intro-text-white">
            Pripomíname, že naša stránka je určená len pre deti vo veku okolo 15 rokov, a preto prosím, aby ste si
            vytvorili
            účet s povolením rodiča alebo zákonného zástupcu.
        </p>
        <br>
        <p class="intro-text-white">
            Ak máte akékoľvek otázky, neváhajte nás kontaktovať. Želáme Vám veľa úspechov a zábavy s programovaním!
        </p>
        <br>
        <p class="intro-text-yellow">
            S pozdravom,
        </p>
        <p class="intro-text-yellow">
            Tím "Mladý kóder"
        </p>
    </div>
</div>
    @endsection