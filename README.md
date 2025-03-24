# Laravel CSV Parser 📄

![Packagist Version](https://img.shields.io/packagist/v/gitfullstacker/laravel-csv-parser)
![License](https://img.shields.io/github/license/gitfullstacker/laravel-csv-parser)
![Laravel Support](https://img.shields.io/badge/Laravel-8%2B-blue)

A simple and efficient Laravel package for parsing CSV files using **league/csv**. Provides an easy-to-use API with Laravel Collections.

---

## 🚀 Features

✅ Simple CSV parsing into Laravel Collections  
✅ Supports custom delimiters  
✅ Auto-detects headers  
✅ Lightweight and fast  

---

## 📦 Installation

You can install the package via Composer:

```php
composer require gitfullstacker/laravel-csv-parser
```

Laravel will automatically discover the service provider. No additional configuration is required.

---

## ⚙️ Usage

### Parsing a CSV File

```php
use GitFullStacker\CsvParser\Facades\CsvParser;

$csvData = CsvParser::parse(storage_path('data.csv'));

dd($csvData); // Returns Illuminate\Support\Collection of CSV rows
```

### Using a Custom Delimiter

```php
$csvData = CsvParser::parse(storage_path('semicolon-separated.csv'), ';');
```

### Handling Errors

```php
try {
    $csvData = CsvParser::parse(storage_path('missing.csv'));
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
```

---

## 🏗 Configuration (Optional)

If you need to manually register the service provider, add the following in config/app.php:

```php
'providers' => [
    GitFullStacker\CsvParser\CsvParserServiceProvider::class,
],
'aliases' => [
    'CsvParser' => GitFullStacker\CsvParser\Facades\CsvParser::class,
],
```

---

## 🔥 Testing

To run tests, install dependencies and execute PHPUnit:

```php
composer install
vendor/bin/phpunit
```

---

## 🧰 Requirements

- PHP 7.4 or higher  
- Laravel 8, 9, or 10  
- league/csv 9.x

---

## 🤝 Contributing

Contributions are welcome!
	1.	Fork the repository
	2.	Create a new branch (feature-branch)
	3.	Commit your changes
	4.	Push and submit a PR

---

## 📜 License

This package is open-sourced under the MIT License. See [LICENSE](./LICENSE) for details.

## 📩 Contact & Support

For issues or feature requests, [open an issue](https://github.com/gitfullstacker/laravel-csv-parser/issues).

Follow me on GitHub: [gitfullstacker](https://github.com/gitfullstacker) 🚀

---
