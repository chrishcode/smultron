![Smultron image](https://file.coffee/u/8irX4k8Qijd.png)

Smultron is a Laravel boilerplate app that makes it possible to charge money from your users. Your users will pay a one time fee to access you application. The only thing you have to do to get started is to clone this repository, enter your Stripe API keys and away you go.

# Installation
Clone this repository
`git clone https://github.com/chrishcode/smultron.git myApp`

Cd into myApp
`cd myApp`

Open the project in your favourite code editor, I’m using visual studio code which lets you open project by typing in your terminal
`code .`

Rename the `.env.example` file to `.env`

Go into your .env file and paste in your Stripe API keys, you can find these in your Stripe application dashboard right here [Stripe: Sign in](https://dashboard.stripe.com/)

```
STRIPE_KEY=stripeKey
STRIPE_SECRET=stripeSecretKey
```

Install dependencies
`composer update —no-scripts`

Generate an app key
`php artisan key:generate`

Create a database and paste in the name and credentials in your `.env` file
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=myDatabaseName
DB_USERNAME=root
DB_PASSWORD=
```

Migrate your database
`php artisan migrate`

Start your app on a local server
`php artisan serve`

That’s it! Now you have a new Laravel app that let’s you charge money from your users in order to access it.

![Smultron image](https://file.coffee/u/my4sZw3nfgl.png "")