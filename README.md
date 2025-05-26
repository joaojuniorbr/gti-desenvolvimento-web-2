# 💻 GTI Desenvolvimento Web II - IFPR Campus Pinhais

Repositório dedicado aos exercícios da disciplina **Desenvolvimento Web II** do
curso de **Gestão da Tecnologia da Informação (GTI)** do **Instituto Federal do
Paraná (IFPR) – Campus Pinhais**.

---

## 📌 Visão Geral

Este projeto contém uma coleção de exercícios utilizando **PHP**, **HTML**,
**CSS**, **JavaScript**, **Alpine.js**, **Tailwind CSS**, **Bootstrap**,
**jQuery** e **Vue.js**, cobrindo desde lógica de programação e manipulação de
formulários até dashboards interativos, consumo de dados e simulações.

Os exercícios estão organizados por aula, com exemplos práticos de uso de
arrays, estruturas condicionais, interação via formulário, persistência de dados
e criação de interfaces responsivas.

---

## 📂 Estrutura do Projeto

```

gti-desenvolvimento-web-2/
├── aula-04/
│   └── \[...].php
├── aula-05/
│   └── \[...].php
├── aula-07/
│   └── \[...].php
├── aula-08/
│   └── \[...].php
├── components/
│   ├── header.php
│   ├── footer.php
│   └── menu.php
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
- **Arrays e Estruturas Condicionais**
- **Validação de Formulários** – `isset()`, `empty()`, `$_SERVER`
- **Formulários GET/POST**

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

## 🎯 Destaques dos Exercícios

✅ **Aula 04** – Simulação de pedidos em quiosque, com calculadora de cédulas e
lógica condicional aplicada.

✅ **Aula 05** – Dashboards interativos com **Alpine.js** e **Tailwind**,
ranking de vendedores e análise de dados via arrays multidimensionais.

✅ **Aula 07** – Layouts com imagens e estilização avançada.

✅ **Aula 08** – Tabelas responsivas que se adaptam ao tamanho da tela.

---

## 🚀 Como Executar Manualmente

### Pré-requisitos

- PHP 8+ instalado
- Servidor local (XAMPP, WAMP, Laragon, ou PHP embutido)
- Navegador moderno

### Instalação

```bash
git clone https://github.com/joaojuniorbr/gti-desenvolvimento-web-2.git
cd gti-desenvolvimento-web-2
```

### Acesso manual

- Via navegador:

  ```
  http://localhost/gti-desenvolvimento-web-2/
  ```

---

## 👨‍💻 Autor

**João Junior** Estudante de Gestão da Tecnologia da Informação Instituto
Federal do Paraná – Campus Pinhais

🔗 GitHub: [https://github.com/joaojuniorbr](https://github.com/joaojuniorbr)

---

📌 **Este projeto é voltado exclusivamente para fins educacionais.**

📅 **Atualizado em: Maio de 2025**
