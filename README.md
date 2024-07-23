# My Championship API

My-championship é uma API desenvolvida em Laravel que simula um campeonato eliminatório com oito times. 
A aplicação permite gerenciar times e campeonatos, além de gerar e simular jogos.

## Funcionalidades

- Inserção de oito times participantes do campeonato.
- Simulação de campeonatos com um sistema eliminatório que inicia-se nas quartas de final.
- Sorteio de jogos para as quartas de final, semifinais e finais.
- Cálculo de pontuações baseado em gols marcados e sofridos.
- CRUD de times (`Team`) e campeonatos (`Championship`).
- Geração de jogos (`PlayChampionship`).
- Documentação da API utilizando Swagger.
     ```bash
  http://localhost:8000/api/documentation

#### Estruturas:
- Utilizei algumas camadas do Clean Architecture, para separa claramente as camadas para uma melhor organização do código. A API também realiza consultas a um script Python para simular os resultados dos jogos e inclui testes específicos no entrypoint teams para garantir a funcionalidade adequada.

#### Ambientes:
- Laravel no docker (sail)

#### Documentação:
- Biblioteca l5-Swagger

## Instalação

### Pré-requisitos

- Docker

### Passos

1. Clone o repositório:

   ```bash
   git clone https://github.com/math3us2021/my-championship

2. Copie o arquivo .env.example para .env:

   ```bash
   cp .env.example .env

3. Configure as variáveis de ambiente no arquivo .env.
4. Suba os containers com o Laravel Sail:
   ```bash
   ./vendor/bin/sail up -d
Obs: Se o banco não iniciar automaticamente, acessar o shell do laravel sail e criar manualmente o banco

5. Instale as dependências do Composer:
   ```bash
   ./vendor/bin/sail composer install
   
6. Execute as migration e seeders
   ```bash
   ./vendor/bin/sail artisan migrate --seed
   
