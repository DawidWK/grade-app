# Dzienniczek Ucznia

## Opis
Dzienniczek Ucznia to aplikacja edukacyjna zaprojektowana, aby zarządzać i śledzić postępy uczniów. Aplikacja oferuje trzy poziomy uprawnień: Administrator, Nauczyciel oraz Użytkownik.

## Uprawnienia

### Administrator
- **Dodawanie użytkowników:** Administrator ma możliwość dodawania nowych użytkowników do systemu.
- **Edycja użytkowników:** Administrator może edytować informacje istniejących użytkowników.

### Nauczyciel
- **CRUD przedmiotów:** Nauczyciel może wprowadzać nowe przedmioty do systemu.
- **CRUD ocen:** Nauczyciel ma możliwość dodawania oraz edytowania ocen uczniów dla poszczególnych przedmiotów.

### Użytkownik (Uczeń)
- **Przegląd ocen:** Użytkownik ma dostęp do przeglądania swoich ocen z poszczególnych przedmiotów.

## Technologie
- **PHP**
- **Laravel**
- **Artisan**
- **Tailwind**

## Instalacja
### Local
- Skopiuj .env.local i stworz plik .env
- Zbuildu pliki statyczne
```
    npm run build
```
- Uruchom migracje
```
    php artisan migrate --force
```
- Odpal lokalny serwer
```
    php artisan serve
```

### DOCKER:
```
docker-compose up --build
```

