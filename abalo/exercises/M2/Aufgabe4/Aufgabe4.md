# <u>Aufgabe</u>: 
Vergleich mit bekannter Programmiersprache. Sie haben die ersten Grundlagen
von JavaScript kennengelernt. Sie kennen bereits mindestens eine weitere
Programmiersprache wie C/C++ oder PHP (z.B. durch Ihr Studium).
Nennen Sie 6 Gemeinsamkeiten sowie 6 Unterschiede zwischen JavaScript und
einer weiteren Ihnen bekannten Programmiersprache. Geben Sie kurze Beispiele.

Im Folgenden werden wir JavaScript mit PHP vergleichen.

## Gemeinsamkeiten
### 1. Syntax
Beide nutzen ähnliche Syntax wie z.B. if-Bedingungen:

JavaScript:
```js
if (x == true) {console.log(x);}
```

PHP:
```PHP
if ($x == true) {echo $x;}
```

### 2. Dynamische Typisierung von Variablen
Beide Programmiersprachen verwenden dynamische Typisierung:
JavaScript:

```js
let zahl = 10;
```

PHP:
```PHP
$zahl = 10;
```

### 3. Unterstützung von Funktionen
Beide Programmiersprachen ermöglichen Funktionen und Parameterübergaben:
JavaScript:

```js
function add(a, b) { return a + b; }
```

PHP:
```PHP
function add($a, $b) { return $a + $b; }
```

### 4. Arrays und Objekte
Beide bieten Array-Strukturen und Objektähnliche Datenstrukturen:

JavaScript:
```js
let arr = [1,2,3];
let obj = {names: "Bobby & Erhan"};
```

PHP:
```PHP
$arr = array(1,2,3);
$obj = (object)["names" => "Bobby & Erhan"];
```

### 5. Kontrollstrukturen
Schleifen (for, while) werden ähnlich genutzt:

JavaScript:
```js
for(let i=0; i<5; i++) { console.log(i); }
```

PHP:
```PHP
for($i=0; $i<5; $i++) { echo $i; }
```

### 6. Operatoren
Arithmetische und logische Operatoren sind in beiden Sprachen ähnlich:

JavaScript:
```js
let ergebnis = (3 > 2) && (1 < 5);
```

PHP:
```PHP
$ergebnis = (3 > 2) && (1 < 5);
```


## Unterschiede
### 1. Ausführung
JavaScript läuft clientseitig im Browser, PHP serverseitig auf einem Server.

JavaScript:
```js
// Browserausgabe
alert("Hallo Welt");
```

PHP:
```PHP
// Serverseitige Ausgabe
echo "Hallo Welt";
```

### 2. Syntax bei Variablendeklarationen
In JavaScript müssen Variablen mit let, var oder const definiert werden, PHP benötigt das nicht (nur $ vor dem Variablennamen).

JavaScript:
```js
let x = 5;
```

PHP:
```PHP
$x = 5;
```


### 3. String-Konkatenation
JavaScript nutzt +, PHP nutzt den Operator .

JavaScript:
```js
let greeting = "Hallo " + "Welt!";
```

PHP:
```PHP
$greeting = "Hallo " . "Welt!";
```


### 4. Array-Definition
In JavaScript definiert man Arrays mit eckigen Klammern [ ], PHP benutzt array().
In JavaScript bräuchte man das Schlüsselwort ```new```.

JavaScript:
```js
let arr = [1,2,3];
```

PHP:
```PHP
$arr = array(1,2,3);
```


### 5. Funktion für Ausgabe
IJavaScript nutzt oft console.log() zur Ausgabe, PHP hingegen echo oder print.

JavaScript:
```js
console.log("Hallo");
```

PHP:
```PHP
echo "Hallo";
```


### 6. Datentyp-Umwandlungen
PHP führt bei Operationen häufig automatische Datentyp-Konvertierungen durch, JavaScript ist hierbei strikter:

JavaScript:
```js
let summe = "5" + 10; // ergibt "510" (String)
```

PHP:
```PHP
$summe = "5" + 10; // ergibt 15 (Integer) durch Type-Juggling
```


