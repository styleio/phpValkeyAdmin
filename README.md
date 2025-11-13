# phpValkeyAdmin

A lightweight PHP web UI to browse and manage Valkey/Redis databases.  
No framework required; works with the phpredis extension when available and falls back to a simple socket client.

## Requirements

- PHP 7.4+ with session and sockets enabled.
- Optional: **phpredis** extension for better performance and TLS support.
- A running Valkey/Redis server the app can reach.
- A web server (Apache/Nginx) or the PHP built-in server.

## Quick Start

1. Download or clone this repository into your web root.
2. Copy `config.php` and adjust the server list to match your environment.
3. Start locally with the PHP built-in server:  
   ```sh
   php -S 127.0.0.1:8080
   ```
4. Open <http://127.0.0.1:8080> in your browser.

## Installation

### Apache/Nginx

- Place the project directory in your document root.
- Ensure PHP is enabled for the vhost/site.
- Open the directory (e.g., `https://your-host/phpValkeyAdmin/`).

### PHP built-in server

```sh
php -S 127.0.0.1:8080
```

Visit: <http://127.0.0.1:8080>

## Configuration

File: `config.php`

- **servers** — list one or more Valkey/Redis servers  
  - `host`: hostname or IP. For TLS use `tls://host` (requires phpredis).  
  - `port`: default 6379  
  - `password`: set if your server requires AUTH  
  - `database`: DB index, e.g., 0  
  - `timeout`: connection timeout in seconds (float)

- **page_size** — number of keys per page  
- **scan_count** — COUNT hint for SCAN  
- **allow_flush** — disable FLUSHDB if false  
- **default_language** — e.g., `en`, `ja`  
- **languages_path** — folder for language files  

**Notes**

- TLS is not supported by the socket fallback.  
  To use TLS you must install phpredis and use a `tls://` host.
- The first server in `servers` is used by default.

## Usage

### Keys

- Browse keys and filter with patterns (e.g., `user:*`).  
- Navigate using Next/Previous.  
- Inspect type and value; edit string values directly.

### Create

- Create new keys and initial values.  
- For lists/sets/zsets, use RPUSH / SADD / ZADD buttons.

### Actions

- Rename keys  
- Set TTL  
- Delete keys  
- FLUSHDB (if enabled)

### Servers and DBs

- Switch among configured servers  
- Select DB index from the UI

### Language

- Switch via UI selector or `?lang=en` / `?lang=ja`  
- Set a persistent default in `config.php`

## Security

- No authentication built in — protect with Basic Auth, IP allowlist, SSO, or VPN.
- **Do NOT expose this tool publicly.**
- Consider disabling `allow_flush` in production.

## Troubleshooting

### Cannot connect

- Check host / port / password  
- For TLS, ensure phpredis is installed and use `tls://host`

### Slow or huge keyspaces

- Increase `scan_count`  
- Tune `page_size`
