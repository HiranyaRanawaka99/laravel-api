# API

-   web.php contiene rotte del html
-   api.php le rotte per api
    -   ci risponderanno con un json(array)

1.

```php
// auth: sanctum server per far entrare solo l'utente autenticato
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
```

---

### Richiesta postman

L'url ...api\projects per vedere in che modo sono esposti i dati

---

### ProjectController per api

1. comando per creare un controller con una cartellina api

```
php artisan make:controller Api\ProjectController --api
```

-   --api serve per creare un ResourceController
-   ha tutte le funzioni tranne edit e update

---

2. Metodo apiResource che escludono edit e create - useremo solo index e show

```php
Route::apiResource("/projects", ProjectController::class)->only(["index", "show"]);
```

---

3. Scriviamo dentro index e show e specifichiamo i campi che vogliamo vedere in vue

-   responde()->json(array) ci trasforma in dati json

```php
  public function index()
    {
        $projects = Project::select("id", "title", "description", "link", "date")
        ->with('type:id,label,color', 'technology:id,label,color')
        ->orderByDesc('id')
        ->paginate(10);
    return response()->json($projects);

    }

      public function show($id)
    {
        $project = Project::select("id", "title", "link", "description", "date")
        ->where('id', $id)
        ->with('technologies:id,label,color', 'type:id,label,color')
        ->first();
    return response()->json($project);
    }
```
