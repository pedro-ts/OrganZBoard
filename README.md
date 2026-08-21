# 📌 OrganZBoard

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
</p>

<p align="center">
  <a href="#"><img src="https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 12"></a>
  <a href="#"><img src="https://img.shields.io/badge/PHP-8.3%2B-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.3"></a>
  <a href="#"><img src="https://img.shields.io/badge/Architecture-Clean%20%2F%20Nativa-green?style=for-the-badge" alt="Clean Architecture"></a>
  <a href="#"><img src="https://img.shields.io/badge/License-MIT-blue.style=for-the-badge" alt="License"></a>
</p>

---

## 🎯 Sobre o OrganZBoard

O **OrganZBoard** é uma API e plataforma de organização pessoal e produtividade de código aberto. A proposta central do projeto é ser um hub unificado onde o usuário pode gerenciar todos os aspectos da sua rotina — desde **locais, lembretes, tarefas e eventos**, até um futuro **módulo de controle financeiro completo**.

O grande diferencial do **OrganZBoard** é sua **Dashboard Modular e Customizável**: o usuário poderá construir seu próprio modo de visualização, escolhendo quais blocos e informações deseja acompanhar em tempo real, centralizando tudo em um único lugar de forma simples, intuitiva e fluida.

---

## 🧪 Propósito de Aprendizado & Arquitetura Limpa

Este repositório é um **projeto público de estudos** focado em dominar e aplicar os padrões de **Arquitetura de Software extremamente limpos** utilizando os recursos **100% nativos do Laravel** da forma mais pura, robusta e elegante possível.

A meta principal é construir uma API escalável e desacoplada, preparada para consumo por qualquer frontend moderno (**React / Next.js**), garantindo que a adição de novos modelos e regras de negócio seja rápida, padronizada e segura.

### 📐 Padrões de Arquitetura Aplicados

```
[ HTTP Request ] 
       │
       ▼
[ Form Request ]   ───► Validar e autorizar entrada de dados
       │
       ▼
[ DTO (Data Class) ] ──► Tipagem estrita e imutabilidade dos dados de transporte
       │
       ▼
[ Service Layer ]  ───► Encapsular 100% das regras de negócio
       │
       ▼
[ Eloquent Model ] ───► Mapeamento ORM, Scopes Globais e Bootstrapping de eventos
       │
       ▼
[ API Resource ]   ───► Formatação e isolamento do contrato de resposta (JSON)
```

- **Data Transfer Objects (DTOs):** Garantem que a transferência de dados entre Controllers e Services seja fortemente tipada, imutável e suporte atualizações parciais (`PUT`/`PATCH`).
- **Service Layer:** Controllers magros (*Thin Controllers*) que apenas orquestram as requisições, delegando toda a regra de negócio para a camada de serviços.
- **Form Requests Dedicados:** Validação rigorosa e sanitização dos payloads de entrada antes de atingirem a aplicação.
- **API Eloquent Resources:** Desacoplamento entre a estrutura de colunas do banco de dados e o contrato JSON retornado para a API.
- **Global Scopes & Booted Events:** Isolamento automático e transparente dos dados do usuário autenticado (Multi-tenant por usuário) sem poluir consultas no código.

---

## ✨ Recursos da Aplicação

- [x] 🔐 **Autenticação Stateless (Laravel Sanctum)** — Registro, login e gestão de tokens.
- [x] 📍 **Gestão de Locais & Endereços** — Cadastro completo com validações estritas, isolamento por usuário e DTOs.
- [ ] 📝 **Lembretes e Notas** *(Em desenvolvimento)*.
- [ ] 📅 **Eventos e Calendário** *(Planejado)*.
- [ ] 📊 **Dashboard Dinâmica Customizável** *(Planejado)*.
- [ ] 💰 **Módulo Financeiro Integrado** *(Planejado)*.

---

## 🛠️ Stack Tecnológica

- **Backend:** PHP 8.3+, Laravel 12.x
- **Autenticação:** Laravel Sanctum
- **Qualidade de Código:** Laravel Pint
- **Análise Estática:** PHPStan / Larastan
- **Testes:** Pest PHP
- **Frontend Futuro:** React / Next.js / Inertia.js

---

## 🚀 Como Executar o Projeto Localmente

### Pré-requisitos
- PHP 8.3 ou superior
- Composer
- Banco de dados (MySQL, PostgreSQL ou SQLite)

### Passo a Passo

1. **Clone o repositório:**
   ```bash
   git clone https://github.com/seu-usuario/organizboard.git
   cd organizboard
   ```

2. **Instale as dependências do Composer:**
   ```bash
   composer install
   ```

3. **Configure o arquivo de ambiente:**
   ```bash
   cp .env.example .env
   ```
   *Ajuste as credenciais do seu banco de dados no arquivo `.env`.*

4. **Gere a chave da aplicação:**
   ```bash
   php artisan key:generate
   ```

5. **Execute as migrations:**
   ```bash
   php artisan migrate
   ```

6. **Inicie o servidor de desenvolvimento:**
   ```bash
   php artisan serve
   ```
   A API estará acessível em `http://localhost:8000`.

---

## 📜 Licença

Este projeto está sob a licença [MIT](LICENSE). Sinta-se à vontade para estudar, contribuir ou usar como referência para seus próprios projetos!
