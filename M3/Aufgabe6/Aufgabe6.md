# 1. GitHub REST API

### Zweck und Datenaustausch
- GitHub API dient zur Verwaltung von Ressourcen rund um Softwareentwicklung  
  → Repositories, Issues, Pull Requests, Nutzer:innen, Organisationen etc.
- Daten werden im JSON-Format übertragen  
  → Abfragen, Erstellen, Bearbeiten und Löschen ist möglich.

### REST-Prinzipien
- **Client-Server:** klare Trennung zwischen Client (z. B. Webanwendung) und Server (GitHub)
- **Zustandslosigkeit:** jede Anfrage ist unabhängig, Authentifizierung per Token
- **Cachefähigkeit:** GET-Anfragen können zwischengespeichert werden
- **Einheitliche Schnittstelle:** konsistente Ressourcenstruktur z. B. `/users/{username}/repos`
- **Mehrschichtige Architektur:** Absicherung, Ratenbegrenzung, Authentifizierung etc.
- **Code on Demand:** nicht umgesetzt

### RMM-Level (Richardson Maturity Model)
- **Level 2**: Ressourcen haben eigene URIs und es werden passende HTTP-Methoden verwendet (GET, POST, PATCH, DELETE)
- HATEOAS wird nicht verwendet → kein Level 3

### Versionierung
- Versionierung erfolgt über HTTP-Header
```
Accept: application/vnd.github.v3+json
```

---

# 2. OpenWeatherMap API

### Zweck und Datenaustausch
- OpenWeatherMap liefert Wetterdaten wie Temperatur, Wind, Luftfeuchtigkeit und Prognosen  
  → wird in Apps, Smart Cities, IoT-Anwendungen verwendet
- Daten werden per GET-Anfragen abgerufen und im JSON-Format geliefert

### REST-Prinzipien
- **Client-Server:** Client sendet Anfragen mit API-Key, Server liefert Wetterdaten zurück
- **Zustandslosigkeit:** jede Anfrage enthält alle nötigen Infos (Ort, API-Key)
- **Cachefähigkeit:** GET-Anfragen können zwischengespeichert werden
- **Einheitliche Schnittstelle:** z. B. `/data/2.5/weather?q=Berlin`
- **Mehrschichtige Architektur:** API-Key, Caching, Load Balancer etc.
- **Code on Demand:** nicht umgesetzt

### RMM-Level (Richardson Maturity Model)
- **Level 1–2**: Ressourcen über eigene URIs, jedoch fast ausschließlich GET-Anfragen
- keine HATEOAS-Unterstützung → kein Level 3

### Versionierung
- Versionierung erfolgt über den Pfad in der URL:
```
https://api.openweathermap.org/data/2.5/weather
```