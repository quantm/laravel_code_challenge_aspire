# Aspire REST API

Laravel Code Challenge

<h2>Introduction</h2>

It is a simple REST API's for the private loan application. Authenticated users can able to request loan from lenders through loan application. Based on approval, loan will get sanction and repayment will start as per the term which customer mentioned in the loan request.  

<h3>Prerequisites</h3>

<ul>
	<li>PHP >= 7.4</li><li>Laravel >= 8.45</li><li>MySQL >= 10.4</li><li>Postman</li>
</ul>

<h3>Installation (Laravel 8.x)</h3>

<p><em>Clone or download this repository</em></p>

<p><pre>$ git clone https://github.com/quantm/laravel_code_challenge_aspire.git</pre></p>

<hr></hr>

<p><em>Run in project folder</em></p>

<p><pre>$ composer install</pre></p>

<hr></hr>

<p><em>Rename the .env.example to .env</em></p>

<p><strong>Configure database connection</strong></p>

<hr></hr>

<h3>Migration and Seed</h3>

<p><em><strong>Run in project folder:</strong></em></p>

<p><pre>$ php artisan migrate:fresh --seed</pre></p>

<p><pre>$ php artisan key:generate</pre></p>

<hr></hr>

<p><em><strong>In this demo, Have used laravel-passport package, which should install before start</strong></em></p>

<p><pre>$ composer require laravel/passport</pre></p>

<hr></hr>

<p><em><strong>Run in project folder:</strong></em></p>

<p><pre>$ php artisan passport:install</pre></p>

<p><pre>$ php artisan passport:client --personal</pre></p>

<hr></hr>

<h3> Default User Credentials </h3>

<p><em><strong>User email account available under 'Users' table 'email' column.</strong></em></p>

<p><em><strong>All seeded accounts use '<b>aspire@123</b>' password as well</strong></em></p>

<h3>Postman Setup</h3>

<p><em>Import Aspire_Loan_App.json file into Postman Collections</em></p>

<p><em>Configure postman environment variable as your application root path</em></p>

<h3>Final Steps</h3>

<p><em><strong>Step 1: </strong>Configure 'Headers' to support 'JSON' response.</em></p>

<p><em><strong>Step 2: </strong>Run Login API with respective valid username and password.</em></p>

<p><em><strong>Step 3: </strong>Copy the response authorized token.</em></p>

<p><em><strong>Step 4: </strong>To access loans API, Need to configure authorization 'Headers' with 'Bearer authorized-token'</em></p>

<h3>Testing</h3>
Run `php artisan test` to execute feature test and unit test

