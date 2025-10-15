# HNGX13 Stage 0 — Dynamic Profile API (PHP)

A simple **RESTful API** built for **HNGX13 Backend Wizards — Stage 0 Task**.  
It returns your my information along with a **dynamic cat fact** fetched from the **Cat Facts API**.

---

## 🚀 Features

- Dynamic `/me` endpoint that:
  - Returns my **profile info** (name, email, backend stack)
  - Fetches a **random cat fact** from [https://catfact.ninja/fact](https://catfact.ninja/fact)
  - Includes a **current UTC timestamp** in ISO 8601 format
- Proper error handling with fallback messages
- Clean, modular PHP structure
- deployed to **EC2 Instance**

---

## 🧠 Tech Stack

- **Language:** PHP 8+
- **HTTP Client:** Guzzle
- **Hosting:** EC2 Instance

---

## 📁 Project Structure

| File / Folder | Description |
|----------------|-------------|
| `.gitignore` | Git ignore file (excludes `vendor/` folder) |
| `composer.json` | Composer dependencies and autoload config |
| `composer.lock` | Composer lock file (dependency versions) |
| `composer-setup.php` | Composer installation setup |
| `config.php` | Key-value configuration (email, name, stack, etc.) |
| `functions.php` | Functions (e.g., fetch cat fact) |
| `index.php` | Main entry point — handles routes |
| `routes.php` | Contains `/me` endpoint definition |
| `README.md` | Documentation file (this one) |
| `vendor/` | Composer dependencies (auto-generated) |

---

## ⚙️ Installation & Setup

Follow the steps below to set up and run this project locally.

### 1. Clone the repository
```bash
git clone https://github.com/EmmyAnieDev/hngx13-stage-0.git
cd hngx13-stage-0
```

### 2. Install dependencies

Make sure you have Composer installed.
Then install required PHP packages:
```bash
composer install
```

### 3. Verify Guzzle installation
```bash
composer show guzzlehttp/guzzle
```

You should see details about the installed Guzzle version.

---

## 🧩 Configuration

Open `config.php` and ensure it contains these details:
```php
<?php
return [
    'name' => 'Emmy Anie',
    'email' => 'emmanuelekwere19@gmail.com',
    'stack' => 'PHP',
    'url' => 'https://catfact.ninja/fact'
];
```

---

## ▶️ Running the API Locally

Start a local PHP development server:
```bash
php -S localhost:8000
```

---

## 🧪 Test the /me Endpoint

You can test using curl and jq for formatted JSON output.

### Testing Locally

```bash
curl -X GET -H 'accept: application/json' -H 'content-type: application/json' http://localhost:8000/me | jq
```

### Testing Deployed URL

```bash
curl -X GET -H 'accept: application/json' -H 'content-type: application/json' http://34.207.151.28/me | jq
```

### Expected Response Format

```json
{
  "status": "success",
  "user": {
    "email": "emmanuelekwere19@gmail.com",
    "name": "Emmanuel Ekwere",
    "stack": "PHP/Laravel"
  },
  "timestamp": "2025-10-15T22:14:03.000Z",
  "fact": "In relation to their body size, cats have the largest eyes of any mammal."
}
```

### Response Fields

- **status**: Indicates the success of the request
- **user**: Object containing user information
  - **email**: User's email address
  - **name**: User's full name
  - **stack**: Technology stack/framework preference
- **timestamp**: ISO 8601 formatted timestamp of the response
- **fact**: Random interesting fact returned with each request

---

## 🧰 Dependencies

| Package | Description |
|---------|-------------|
| php | PHP runtime (>= 8.0) |
| guzzlehttp/guzzle | HTTP client for fetching cat facts |

Install via Composer:
```bash
composer require guzzlehttp/guzzle
```

---

## 🔐 Environment Variables

Currently, this project doesn't require any `.env` configuration.
All key-value pairs are stored in `config.php`.

---

## 💬 Author

**Emmy Anie**  
📧 emmanuelekwere19@gmail.com  
🐙 GitHub: [EmmyAnieDev](https://github.com/EmmyAnieDEV)
