# 💻 GTI Desenvolvimento Web II - IFPR Campus Pinhais

Repositório dedicado aos exercícios da disciplina **Desenvolvimento Web II** do
curso de **Gestão da Tecnologia da Informação (GTI)** do **Instituto Federal do
Paraná (IFPR) – Campus Pinhais**.

---

## 📌 Visão Geral

Este projeto reúne os exercícios e projetos desenvolvidos ao longo da
disciplina, utilizando tecnologias como **PHP**, **HTML**, **CSS**,
**JavaScript**, **Alpine.js**, **Tailwind CSS**, **Bootstrap**, **jQuery** e
**Vue.js**.

Além dos exercícios semanais, o repositório inclui o projeto **TMA** (Trabalho
de Conclusão do Semestre), uma aplicação web com autenticação e busca de cursos,
integrando frontend React e backend PHP com sessões.

---

## 📂 Estrutura do Projeto

```
gti-desenvolvimento-web-2/
├── aula-02/
├── aula-03/
├── aula-04/
├── aula-05/
├── aula-06/
├── aula-07/
├── aula-08/
├── aula-09/
├── aula-10/
├── aula-11/
├── aula-12/
├── components/
│   ├── header.php
│   ├── footer.php
│   └── menu.php
├── tma/
│   ├── index.php
│   ├── api.php
│   ├── config.php
├── .github/
│   └── workflows/
│       └── fly-deploy.yml
├── .dockerignore
├── Dockerfile
├── fly.toml
└── README.md
```

---

## 🛠️ Tecnologias Utilizadas

### 🔸 Front-end

- **HTML5** – Estrutura semântica
- **CSS3 / Tailwind CSS** – Estilização moderna
- **Bootstrap** – Componentes responsivos
- **JavaScript / jQuery** – Interatividade
- **Vue.js** – Formulários reativos
- **Alpine.js** – Interações declarativas simples

### 🔹 Back-end

- **PHP 8.2+** – Processamento de lógica e dados
- **Sessões PHP** – Autenticação de usuários
- **Validação de Formulários** – `isset()`, `empty()`, `$_SERVER`
- **Integração com banco de dados**
- **APIs REST com JSON**

---

## 📁 Destaque: `/tma` – Trabalho de Conclusão do Semestre

A pasta `tma/` contém uma aplicação web com foco em:

- 🔐 **Autenticação de usuários** com sessões PHP
- 🔍 **Busca de cursos** via API
- ⚙️ **Integração com frontend React** hospedado na Vercel
- 🌐 **Deploy do backend via Fly.io** com suporte a cookies cross-site
- 🧪 **Ambiente seguro com CORS, HTTPS e sessões persistentes**

Esse projeto simula uma aplicação real com separação de frontend e backend,
autenticação segura e consumo de dados dinâmico.

---

## 🐳 Ambiente de Desenvolvimento com Docker

Este projeto pode ser executado sem instalar nada localmente, usando **Docker**.

### 🏗️ Construir a imagem

```bash
docker build -t gti-web .
```

### 🚀 Executar o container

```bash
docker run -p 8080:80 gti-web
```

### 🌐 Acessar via navegador

```
http://localhost:8080
```

> Arquivos como `upload/`, `log.txt`, e `node_modules/` são ignorados via
> `.dockerignore`.

---

## 🔄 Deploy Automatizado (Fly.io)

O projeto é implantado automaticamente via GitHub Actions para a **Fly.io**.

- Arquivo de workflow: `.github/workflows/fly-deploy.yml`
- Configuração Fly: `fly.toml`

Ao dar push na branch `main`, o deploy é acionado automaticamente.

---

## 🎯 Destaques dos Exercícios por Aula

| Aula    | Conteúdo Principal                                              |
| ------- | --------------------------------------------------------------- |
| Aula 02 | Introdução ao PHP, `echo`, variáveis e operadores               |
| Aula 03 | Condicionais (`if`, `else`, `switch`) e operadores lógicos      |
| Aula 04 | Simulação de pedidos, calculadora de troco e lógica condicional |
| Aula 05 | Dashboards com Alpine.js e Tailwind, ranking de vendedores      |
| Aula 06 | Arrays associativos e multidimensionais                         |
| Aula 07 | Layouts com imagens, estilização avançada                       |
| Aula 08 | Tabelas responsivas e manipulação de dados                      |
| Aula 09 | Formulários com validação e persistência                        |
| Aula 10 | Introdução ao JavaScript e manipulação DOM                      |
| Aula 11 | Integração com Vue.js e formulários reativos                    |
| Aula 12 | Consumo de APIs e exibição dinâmica de dados                    |

---

## 👨‍💻 Autor

**João Junior**  
Estudante de Gestão da Tecnologia da Informação  
Instituto Federal do Paraná – Campus Pinhais

🔗 GitHub: [https://github.com/joaojuniorbr](https://github.com/joaojuniorbr)

---

📌 **Este projeto é voltado exclusivamente para fins educacionais.**  
📅 **Atualizado em: Julho de 2025**
