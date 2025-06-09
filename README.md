## Instrukcja uruchomienia

### 1. Pobierz projekt
```bash
git clone https://github.com/MariaBrodowska/IBIF.git
cd IBIF
```

### 2. Zainstaluj zależności
```bash
composer install
```

### 3. Skonfiguruj bazę danych

**Utwórz nową bazę danych MySQL:**
```sql
CREATE DATABASE ibif;
```

**Zaimportuj strukturę bazy danych:**
1. Otwórz phpMyAdmin
2. Wybierz bazę danych `ibif`
3. Przejdź do zakładki "Import"
4. Wybierz plik `db.sql` z głównego katalogu projektu
5. Kliknij "Import"

### 4. Skonfiguruj plik środowiskowy

Utwórz plik `.env` w głównym katalogu projektu i wypełnij go swoimi danymi:

```env
# Konfiguracja bazy danych
DB_HOST=localhost
DB_NAME=ibif
DB_USER=ibif_user
DB_PASS=secure_password
DB_CHARSET=utf8mb4

# Konfiguracja SMTP do wysyłki maili za pomocą PHPMailer
SMTP_USER=zadanietestowebrodowska@gmail.com
SMTP_PASS="tymf kzsp mghf nfoa"
SMTP_MAILTO=mariabrodowska89@gmail.com
```

**Uwagi dotyczące konfiguracji:**
- `DB_HOST` - adres serwera bazy danych
- `DB_NAME` - nazwa utworzonej bazy danych
- `DB_USER` - użytkownik bazy danych
- `DB_PASS` - hasło do bazy danych
- `SMTP_USER` - adres email do wysyłki
- `SMTP_PASS` - hasło aplikacji
- `SMTP_MAILTO` - adres, na który będą wysyłane wiadomości z formularza kontaktowego

### 5. Uruchom aplikację

**Dla XAMPP:**
1. Uruchom Apache i MySQL w panelu kontrolnym XAMPP
2. Otwórz przeglądarkę i przejdź na: `http://localhost/IBIF/public`
