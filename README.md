# Wanderlust Airline — Monorepo

Applicazione demo per gestione **voli e passeggeri**.  
Monorepo con **backend PHP** e materiale **frontend**.

## ✨ Funzionalità principali
- Home con link a:
  - Passenger and Flight Report
  - Passenger Entry Form
- Connessione a MySQL (database di esempio: `airportdb`)
- Routing Apache via `.htaccess`

## 📁 Struttura del progetto
backend/ # codice PHP
├─ public/ # DocumentRoot (index.php, asset, pagine)
│ └─ .htaccess
├─ config/ # config.php + .env (non in git)
└─ .env.example
frontend/ # vecchio sito/statici di esempio (non serviti da Apache)
database/
└─ schema.sql # dump SQL (crea DB airportdb con tabelle e dati demo)

## 🧰 Requisiti
- **PHP 8.1+** con Apache (XAMPP, MAMP, WAMP **oppure** Docker)
- **MySQL/MariaDB 10.4+**
- **Git**
- (opzionale) **Node.js** se vuoi lavorare al materiale `frontend/`

## 🚀 Avvio rapido con XAMPP (Windows)
1. **Importa il database**  
   - Apri `http://localhost/phpmyadmin` → *Importa* → carica `database/schema.sql`  
   - Dopo l’import a sinistra vedrai il DB **`airportdb`** con le tabelle.

2. **Configura variabili**  
   - Copia `backend/.env.example` in `backend/.env`  
   - Modifica i valori reali:
     ```
     APP_ENV=local
     APP_URL=http://localhost
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_NAME=airportdb
     DB_USER=root
     DB_PASS=
     ```

3. **Punta Apache alla cartella giusta**  
   - XAMPP → Apache → **Config** → `httpd.conf`  
   - imposta:
     ```
     DocumentRoot "C:/.../wonderlust/backend/public"
     <Directory "C:/.../wonderlust/backend/public">
         AllowOverride All
         Require all granted
     </Directory>
     ```
   - verifica che `mod_rewrite` sia attivo (riga `LoadModule rewrite_module ...` non commentata)  
   - **Riavvia** Apache

4. **Apri l’app**  
   - Vai su **http://localhost**  
   - Dovresti vedere la home “Wanderlust Airline Database”.

## 🐳 Avvio con Docker (opzionale)
> Solo per sviluppo rapido; personalizza credenziali secondo necessità.

```bash
docker compose up -d
# backend disponibile su http://localhost:8080
