## 💻 Getting Started <a name="getting-started"></a>

### Prerequisites

In order to run this project you need:

- [Git](https://git-scm.com/) installed and running. To get more information,
  read the [installation guide](https://git-scm.com/doc).

- [php](https://www.php.net/) installed and running.

- [composer](https://getcomposer.org/) installed and running.

### Setup

Clone this repository to your desired folder:

```
  clone the project either from github or from gitlab or extract from zip
  git clone https://github.com/AmineDerbal/tasks-manager.git or git clone https://gitlab.com/AmineDerbal/tasks-manager.git
  cd tasks-manager
```

### Install

Install the project dependencies with:

```
  composer install
```

### Usage <a name="usage"></a>

To run the project, execute the following command:

```
cp .env.example .env
php artisan key:generate
Setup your database in the env file
php artisan migrate
php artisan serve
```
