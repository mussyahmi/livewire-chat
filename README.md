## Realtime chat using TALL Stack

The TALL stack consists of these awesome technologies:
- [Tailwind CSS](https://tailwindcss.com/)
- [AlphineJS](https://alpinejs.dev/)
- [Laravel](https://laravel.com/)
- [Livewire](https://laravel-livewire.com/)

## How to install? (MacOS)

1. Install [Homebrew](https://brew.sh/)
```bash
  # Command to install
  /bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"

  # Command to add to PATH
  (echo; echo 'eval "$(/opt/homebrew/bin/brew shellenv)"') >> /Users/mussyahmi/.zprofile
    eval "$(/opt/homebrew/bin/brew shellenv)"
```
2. Install [Mysql 5.7](https://gist.github.com/wpconsulate/40469bfdafad9fdd0afc3e260a5586a7)
```bash
# Command to install
brew install mysql@5.7

# Command to add to PATH
echo 'export PATH="/opt/homebrew/opt/mysql@5.7/bin:$PATH"' >> ~/.zshrc

# Close and open new Terminal to use mysql

# Enabling Service Management with Homebrew: Tapping into homebrew/services
brew tap homebrew/services

# Load and start the MySQL service
brew services start mysql@5.7
```
3. Install Sequel Pro
4. Install [NVM](https://github.com/nvm-sh/nvm)
```bash
# Command to install
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.5/install.sh | bash

# Close and open new Terminal to use nvm
nvm install 20.10.0
```
5. Install PHP and Composer via [Laravel Herd](https://herd.laravel.com/)
6. Get SSH key
```bash
# Generate SSH key
ssh-keygen -t rsa -b 4096 -C "your_email@example.com"

# View and copy the key
cat ~/.ssh/id_rsa.pub
```
7. Add the SSH key to your personal Github settings.
8. Clone the project via SSH

# Versions Used
- MySQL v5.7
- Node v20.10.0
- NPM v10.2.3
- PHP v8.3.0 via [Laravel Herd](https://herd.laravel.com/)
- Composer v2.6.5 via [Laravel Herd](https://herd.laravel.com/)
- Npm v10.2.3
- Laravel 10
- Laravel installer 5.1.2

- Clone project
- composer install
- npm install
- php artisan serve
- npm run dev
- php artisan queue:work
