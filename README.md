A few weeks ago (as of november 2023) I went through the Laravel Bootcamp to build a simple twitter clone, I loved it so much that I decided to remake it on my own fully unguided. in the process I added a bunch of features:

- Like functionality
- A profile page
- Authentication with username instead of email
- in-app notifications **(coming soon!)**

## How to use

Clone the repo

```bash
git clone https://github.com/spcbfr/BloodyTwitter.git

cd BloodyTwitter
```

Install [composer](https://getcomposer.org/download/) if you don't have it already, next install PHP dependencies.

```bash
composer install
```

laravel uses vite for HMR on the frontend, so go ahead and install the JS dependencies too.

```bash
npm install
```

run the following command so that vite can generate our assets

```bash
npm run dev
```

Finally, open the `artisan` development server, you're all set now

```bash
php artisan serve
```
