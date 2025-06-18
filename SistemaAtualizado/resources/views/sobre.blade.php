@extends('template')
 
@section('titulo', 'Sobre')
 
@section('conteudo')
    <div class="container my-5 d-flex justify-content-center">
        <div class="card shadow rounded py-4 px-5" style="max-width: 900px; width: 100%;">
 
            <h2 class="fw-bold text-center">Framework PHP (Laravel)</h2>
 
            <p class="text-start">
               Laravel é um framework PHP gratuito e de código aberto, criado por Taylor B. Otwell. Ele é muito usado por quem está aprendendo ou já trabalha com desenvolvimento web, principalmente porque segue o padrão MVC (Model-View-Controller), o que ajuda bastante na organização do código.

Uma das coisas que mais chamam a atenção no Laravel é a facilidade de uso. A sintaxe dele é simples e direta, o que torna o aprendizado mais tranquilo. Além disso, ele tem um sistema modular bem bacana, usa o Composer para gerenciar pacotes e facilita o acesso ao banco de dados com várias ferramentas prontas. Tudo isso ajuda muito no dia a dia de quem está desenvolvendo um sistema e precisa de agilidade e organização.
            </p>
 
            <div class="row text-center justify-content-center my-4">
                <div class="col-md-4 p-3 bg-light rounded shadow-sm mx-2">
                    <h5 class="fw-bold">Requisitos do Laravel:</h5>
                    <ul class="text-start">
                        <li>PHP</li>
                        <li>Composer</li>
                    </ul>
                </div>
 
                <div class="col-md-4 p-3 bg-light rounded shadow-sm mx-2">
                    <h5 class="fw-bold">Características</h5>
                    <ol class="text-start">
                        <li>Sintaxe simples</li>
                        <li>Sintaxe concisa</li>
                        <li>Sistema modular</li>
                    </ol>
                </div>
            </div>
 
            <h3 class="fw-bold mt-5 mb-4 text-center">Equipe do Projeto</h3>
        <div class="row text-center justify-content-center">
            
            <div class="col-md-3 mx-3 mb-4">
                <div class="p-3 rounded shadow-sm bg-white">
                    <img src="https://avatars.githubusercontent.com/u/83845550?v=4" class="img-fluid rounded-circle mb-2" alt="">
                    <p class="fw-bold mb-0">Breno Morrisei Balog de Farias</p>
                    <p>Dev</p>
                    <a href="https://github.com/Breno-morrisei" class="link-dark">GitHub</a>
                </div>
            </div>

            <div class="col-md-3 mx-3 mb-4">
                <div class="p-3 rounded shadow-sm bg-white">
                    <img src="https://avatars.githubusercontent.com/u/189771411?v=4" class="img-fluid rounded-circle mb-2" alt="">
                    <p class="fw-bold mb-0">Karin Bagietto da Costa</p>
                    <p>Dev</p>
                    <a href="https://github.com/KarinBagietto" class="link-dark">GitHub</a>
                </div>
            </div>

</div>
 
        </div>
    </div>
@endsection