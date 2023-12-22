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
2. Install [MySQL 5.7](https://gist.github.com/wpconsulate/40469bfdafad9fdd0afc3e260a5586a7)
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

# Install Node version 20.10.0
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
9. Setup .env file for following details, you need to have [Pusher](https://pusher.com/) account and create new Channel
```bash
PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=
```
10. Install necessary packages
```bash
composer install

npm install
```

## How to run?
```bash
# Terminal 1
php artisan serve

# Terminal 2
npm run dev

# Terminal 3
php artisan queue:work

## Versions Used
- Homebrew v4.1.22
- MySQL v5.7
- Node v20.10.0
- NPM v10.2.3
- PHP v8.3.0 via
- Composer v2.6.5
- Laravel 10
- Laravel installer 5.1.2
