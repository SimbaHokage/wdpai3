# wdpai3

## AppController

### Opis
Klasa AppController jest podstawowym kontrolerem aplikacji w języku PHP. Zapewnia podstawowe funkcje do zarządzania żądaniami HTTP, takimi jak GET i POST, oraz renderowania widoków.

### Metody

#### __construct()
- **Opis**: Konstruktor klasy AppController.
- **Argumenty**: Brak.
- **Działanie**: Inicjalizuje obiekt klasy AppController i ustawia zmienną $request na metodę żądania HTTP (GET, POST itp.).

#### isGet()
- **Opis**: Sprawdza, czy żądanie HTTP jest typu GET.
- **Argumenty**: Brak.
- **Zwracana wartość**: Wartość logiczna true, jeśli żądanie jest typu GET, w przeciwnym razie false.

#### isPost()
- **Opis**: Sprawdza, czy żądanie HTTP jest typu POST.
- **Argumenty**: Brak.
- **Zwracana wartość**: Wartość logiczna true, jeśli żądanie jest typu POST, w przeciwnym razie false.

#### render(string $template = null, array $variables = [])
- **Opis**: Renderuje widok, używając podanego szablonu i przekazanych zmiennych.
- **Argumenty**:
    - `$template` (string, opcjonalny): Nazwa szablonu widoku do renderowania.
    - `$variables` (array, opcjonalny): Tablica zmiennych do przekazania do widoku.
- **Działanie**: Sprawdza istnienie pliku szablonu widoku, jeśli istnieje, renderuje widok, przekazując mu zmienne z tablicy `$variables`. Wynik renderowania jest bezpośrednio wypisywany na stronie.

## AuthenticationController

### Opis
Klasa AuthenticationController odpowiada za autoryzację użytkowników w aplikacji. Zapewnia funkcje do sprawdzania, czy użytkownik jest zalogowany, oraz do pobierania zaszyfrowanego adresu e-mail użytkownika i jego deszyfrowania.

### Metody

#### isUserLogged()
- **Opis**: Sprawdza, czy użytkownik jest zalogowany poprzez sprawdzenie istnienia ciasteczka 'loggedUser'.
- **Argumenty**: Brak.
- **Zwracana wartość**: Wartość logiczna true, jeśli użytkownik jest zalogowany, w przeciwnym razie false.

#### getDecryptedEmail()
- **Opis**: Pobiera i deszyfruje adres e-mail zalogowanego użytkownika z ciasteczka 'loggedUser'.
- **Argumenty**: Brak.
- **Zwracana wartość**: Zdeszyfrowany adres e-mail użytkownika.

#### checkIsUserLogged()
- **Opis**: Sprawdza, czy użytkownik jest zalogowany. Jeśli nie, przekierowuje go do strony logowania.
- **Argumenty**: Brak.
- **Zwracana wartość**: Wartość logiczna true, jeśli użytkownik jest zalogowany, w przeciwnym razie przekierowuje do strony logowania i kończy wykonywanie skryptu.

## DefaultController

### Opis
Klasa DefaultController jest kontrolerem domyślnym aplikacji w języku PHP. Odpowiada za obsługę podstawowych żądań dotyczących różnych widoków, takich jak ekran powitalny, logowanie, rejestracja, przypomnienie hasła itp.

### Metody

#### index()
- **Opis**: Renderuje widok ekranu powitalnego.
- **Argumenty**: Brak.

#### login()
- **Opis**: Renderuje widok formularza logowania.
- **Argumenty**: Brak.

#### register()
- **Opis**: Renderuje widok formularza rejestracji.
- **Argumenty**: Brak.

#### trainingsToBe()
- **Opis**: Renderuje widok planowanych szkoleń.
- **Argumenty**: Brak.

#### welcomeScreen()
- **Opis**: Renderuje widok ekranu powitalnego.
- **Argumenty**: Brak.

#### forgotPassword()
- **Opis**: Renderuje widok formularza przypomnienia hasła.
- **Argumenty**: Brak.

### Dziedziczenie

Klasa DefaultController dziedziczy po klasie AppController, co oznacza, że dziedziczy wszystkie jej metody.

## ExerciseController

### Opis
Klasa ExerciseController jest kontrolerem odpowiedzialnym za zarządzanie ćwiczeniami w aplikacji. Obejmuje dodawanie nowych ćwiczeń do treningów oraz wyświetlanie planowanych treningów.

### Metody

#### __construct()
- **Opis**: Konstruktor klasy ExerciseController.
- **Argumenty**: Brak.
- **Działanie**: Inicjalizuje obiekty repozytoriów, kontrolera autoryzacji i repozytorium użytkowników.

#### trainingsToBe()
- **Opis**: Wyświetla planowane treningi.
- **Argumenty**: Brak.

#### addExercise()
- **Opis**: Dodaje nowe ćwiczenie do treningu.
- **Argumenty**: Brak.
- **Zwracana wartość**: Wynik renderowania widoku 'trainingsToBe' z listą ćwiczeń.

#### getLoggedUserID()
- **Opis**: Pobiera ID zalogowanego użytkownika.
- **Argumenty**: Brak.
- **Zwracana wartość**: ID zalogowanego użytkownika.
- **Wyjątek**: NotFoundException, jeśli użytkownik nie zostanie znaleziony.

### Dziedziczenie

Klasa ExerciseController dziedziczy po klasie AppController, co oznacza, że dziedziczy wszystkie jej metody.

## SecurityController

### Opis
Klasa SecurityController jest kontrolerem odpowiedzialnym za zarządzanie bezpieczeństwem użytkowników w aplikacji. Obejmuje funkcje logowania, rejestracji, resetowania hasła, wylogowywania oraz dostęp do ekranu powitalnego po zalogowaniu.

### Metody

#### loginFunction()
- **Opis**: Obsługuje proces logowania użytkownika.
- **Argumenty**: Brak.

#### register()
- **Opis**: Obsługuje proces rejestracji nowego użytkownika.
- **Argumenty**: Brak.

#### forgotPassword()
- **Opis**: Obsługuje proces resetowania hasła użytkownika.
- **Argumenty**: Brak.

#### welcomeScreenLoggeIn()
- **Opis**: Renderuje ekran powitalny po zalogowaniu.
- **Argumenty**: Brak.

#### logout()
- **Opis**: Obsługuje proces wylogowywania użytkownika.
- **Argumenty**: Brak.

#### setCookie(string $email)
- **Opis**: Ustawia ciasteczko z zaszyfrowanym adresem e-mail zalogowanego użytkownika.
- **Argumenty**:
    - `$email` (string): Adres e-mail zalogowanego użytkownika.

#### removeCookie()
- **Opis**: Usuwa ciasteczko z zalogowanego użytkownika.
- **Argumenty**: Brak.

### Dziedziczenie

Klasa SecurityController dziedziczy po klasie AppController, co oznacza, że dziedziczy wszystkie jej metody.

## TrainingController

### Opis
Klasa TrainingController jest kontrolerem odpowiedzialnym za zarządzanie treningami w aplikacji. Obejmuje funkcje wyświetlania historii treningów, dodawania nowych treningów, dodawania treningów do bazy danych oraz usuwania treningów.

### Metody

#### __construct()
- **Opis**: Konstruktor klasy TrainingController.
- **Argumenty**: Brak.
- **Działanie**: Inicjalizuje obiekty repozytoriów, kontrolera autoryzacji i repozytorium użytkowników.

#### trainingHistory()
- **Opis**: Wyświetla historię treningów użytkownika.
- **Argumenty**: Brak.

#### addTraining()
- **Opis**: Renderuje formularz dodawania nowego treningu.
- **Argumenty**: Brak.

#### addTrainingDatabase()
- **Opis**: Dodaje nowy trening do bazy danych.
- **Argumenty**: Brak.

#### getData()
- **Opis**: Pobiera dane treningu z żądania POST, usuwa trening o podanej dacie i wyświetla zaktualizowaną historię treningów.
- **Argumenty**: Brak.

#### deleteTraining($date)
- **Opis**: Usuwa trening o podanej dacie z bazy danych i wyświetla zaktualizowaną historię treningów.
- **Argumenty**:
    - `$date` (string): Data treningu do usunięcia.

#### getLoggedUserID()
- **Opis**: Pobiera ID zalogowanego użytkownika.
- **Argumenty**: Brak.
- **Zwracana wartość**: ID zalogowanego użytkownika.
- **Wyjątek**: NotFoundException, jeśli użytkownik nie zostanie znaleziony.

### Dziedziczenie

Klasa TrainingController dziedziczy po klasie AppController, co oznacza, że dziedziczy wszystkie jej metody.

## ExerciseRepository

### Opis
Klasa ExerciseRepository jest repozytorium odpowiedzialnym za operacje na danych związanych z ćwiczeniami w bazie danych. Obejmuje funkcje pobierania pojedynczego ćwiczenia na podstawie identyfikatora, dodawania nowego ćwiczenia do bazy danych oraz pobierania wszystkich ćwiczeń związanych z danym treningiem.

### Metody

#### getExercise(int $id): ?Exercise
- **Opis**: Pobiera pojedyncze ćwiczenie na podstawie identyfikatora.
- **Argumenty**:
    - `$id` (int): Identyfikator ćwiczenia.
- **Zwracana wartość**: Obiekt klasy Exercise lub null, jeśli ćwiczenie nie zostanie znalezione.

#### addExercise(int $sets, int $reps, int $rpe, string $exercise_name, int $trainingID)
- **Opis**: Dodaje nowe ćwiczenie do bazy danych.
- **Argumenty**:
    - `$sets` (int): Liczba serii.
    - `$reps` (int): Liczba powtórzeń.
    - `$rpe` (int): Ocena trudności (RPE).
    - `$exercise_name` (string): Nazwa ćwiczenia.
    - `$trainingID` (int): Identyfikator treningu, do którego należy ćwiczenie.

- **Opis**: Pobiera wszystkie ćwiczenia związane z danym treningiem na podstawie jego identyfikatora.
- **Argumenty**:
    - `$trainingID` (int): Identyfikator treningu.
- **Zwracana wartość**: Tablica obiektów klasy `Exercise` reprezentujących ćwiczenia związane z danym treningiem.

#### Dziedziczenie

Klasa `ExerciseRepository` dziedziczy po klasie `Repository`, co oznacza, że dziedziczy wszystkie jej metody i właściwości.

## Repository

### Opis

Klasa `Repository` jest klasą bazową dla wszystkich repozytoriów w aplikacji. Odpowiada za inicjalizację połączenia z bazą danych za pomocą obiektu klasy `Database`.

### Metody

#### `__construct()`

- **Opis**: Konstruktor klasy `Repository`.
- **Argumenty**: Brak.
- **Działanie**: Inicjalizuje obiekt klasy `Database`, który będzie wykorzystywany do komunikacji z bazą danych.

### Właściwości

- `$database`: Obiekt klasy `Database` używany do komunikacji z bazą danych.

## TrainingRepository

### Opis

Klasa `TrainingRepository` jest repozytorium odpowiedzialnym za operacje na danych związanych z treningami w bazie danych. Obejmuje funkcje dodawania nowego treningu, pobierania najnowszego treningu, pobierania wszystkich treningów wykonanych, pobierania wszystkich treningów do wykonania, pobierania treningu na podstawie daty oraz usuwania treningu.

### Metody

#### `addTraining(string $date, int $idUser)`

- **Opis**: Dodaje nowy trening do bazy danych.
- **Argumenty**:
    - `$date` (string): Data treningu.
    - `$idUser` (int): Identyfikator użytkownika.

#### `getNewestTraining($idUser)`

- **Opis**: Pobiera najnowszy trening na podstawie identyfikatora użytkownika.
- **Argumenty**:
    - `$idUser` (int): Identyfikator użytkownika.
- **Zwracana wartość**: Obiekt klasy `Training` reprezentujący najnowszy trening.

#### `getAllTrainingDone($idUser)`

- **Opis**: Pobiera wszystkie treningi wykonane przez użytkownika.
- **Argumenty**:
    - `$idUser` (int): Identyfikator użytkownika.
- **Zwracana wartość**: Tablica obiektów klasy `Training` reprezentujących treningi wykonane.

#### `getAllTrainingToDo($idUser)`

- **Opis**: Pobiera wszystkie treningi do wykonania przez użytkownika.
- **Argumenty**:
    - `$idUser` (int): Identyfikator użytkownika.
- **Zwracana wartość**: Tablica obiektów klasy `Training` reprezentujących treningi do wykonania.

#### `getTrainingByDate($date)`

- **Opis**: Pobiera trening na podstawie daty.
- **Argumenty**:
    - `$date` (string): Data treningu.
- **Zwracana wartość**: Obiekt klasy `Training` reprezentujący trening o podanej dacie.

#### `deleteTraining($id, $date)`

- **Opis**: Usuwa trening z bazy danych na podstawie identyfikatora i daty.
- **Argumenty**:
    - `$id` (int): Identyfikator treningu.
    - `$date` (string): Data treningu.

#### Dziedziczenie

Klasa `TrainingRepository` dziedziczy po klasie `Repository`, co oznacza, że dziedziczy wszystkie jej metody i właściwości.

## UserRepository

### Opis

Klasa `UserRepository` jest repozytorium odpowiedzialnym za operacje na danych związanych z użytkownikami w bazie danych. Obejmuje funkcje pobierania użytkownika na podstawie adresu e-mail, dodawania nowego użytkownika oraz resetowania hasła użytkownika.

### Metody

#### `getUser(string $email): ?User`

- **Opis**: Pobiera użytkownika na podstawie adresu e-mail.
- **Argumenty**:
    - `$email` (string): Adres e-mail użytkownika.
- **Zwracana wartość**: Obiekt klasy `User` reprezentujący użytkownika lub null, jeśli użytkownik nie zostanie znaleziony.
- **Wyjątek**: `NotFoundException`, jeśli użytkownik nie zostanie znaleziony.

#### `addUser(string $email, string $username, string $password)`

- **Opis**: Dodaje nowego użytkownika do bazy danych.
- **Argumenty**:
    - `$email` (string): Adres e-mail użytkownika.
    - `$username` (string): Nazwa użytkownika.
    - `$password` (string): Hasło użytkownika.
- **Działanie**: Dodaje nowego użytkownika do tabeli `users` w bazie danych.

#### `forgotPassword(string $pass, User $user)`

- **Opis**: Resetuje hasło użytkownika.
- **Argumenty**:
    - `$pass` (string): Nowe hasło użytkownika.
    - `$user` (User): Obiekt klasy `User` reprezentujący użytkownika, którego hasło ma zostać zresetowane.
- **Działanie**: Aktualizuje hasło użytkownika w bazie danych na podstawie jego identyfikatora.

#### Dziedziczenie

Klasa `UserRepository` dziedziczy po klasie `Repository`, co oznacza, że dziedziczy wszystkie jej metody i właściwości.