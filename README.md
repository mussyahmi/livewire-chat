## Realtime chat using TALL Stack

The TALL stack consists of these awesome technologies:
- [Tailwind CSS] (https://tailwindcss.com/)
- [AlphineJS] (https://alpinejs.dev/)
- [Laravel] (https://laravel.com/)
- [Livewire] (https://laravel-livewire.com/)

## How to install?

- Install [Homebrew] (https://brew.sh/)
- ```bash
  # Command to install
  /bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"

  # Command to add to PATH:
  (echo; echo 'eval "$(/opt/homebrew/bin/brew shellenv)"') >> /Users/mussyahmi/.zprofile
    eval "$(/opt/homebrew/bin/brew shellenv)"

# Versions Required
- PHP v8.3.0 via [Laravel Herd] (https://herd.laravel.com/)
- Composer v2.6.5 via [Laravel Herd] (https://herd.laravel.com/)
- Nvm
- Node v20.10.0
- Npm v10.2.3
- Laravel 10
- Laravel installer 5.1.2

- Clone project
- composer install
- npm install
- php artisan serve
- npm run dev
- php artisan queue:work
