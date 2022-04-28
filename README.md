SPRINT	 07 
=======
Site 100% Laravel


## Visualiser le site
Pour pouvoir visualiser notre site: [Zanbob](perianmodely-julie.sprint-07-laravel.sc1lgvu9627.universe.wf)
 
## La maquette
Lien Figma pour visualiser la maquette: [maquette du site Zanbob](https://www.figma.com/file/yR2h3PDxzq1M5XaEb40ffH/Maquette-sprint-07?node-id=0%3A1)


# Diagrammes de séquence UML

# Création d'un poste

```mermaid
sequenceDiagram
participant Navigateur
participant Route
participant Controller
participant Model
participant Vue

Navigateur->>Route: post('/') data : Titre, affiche, synopsis
Route->>Controller: appel d'une méthode d'un contrôleur
Controller->>Model: insertion des données en base
Model->>Controller: succès de l'insertion des données
Controller->>Vue: passage des données à la vue
Vue->>Navigateur: retourne le rendu HTML
```

# Acces page d'accueil

```mermaid
sequenceDiagram
participant Navigateur
participant Route
participant Controller
participant Model
participant Vue

Navigateur->>Route: get("/") : Nom du site
Route->>Controller: appelle d'une méthode d'un controller
Controller->>Model: insertion des données en base
Model->>Controller: succès de l'insertion des données
Controller->>Vue: passage des données à la vue
Vue->>Navigateur: retourne le rendu CSS

```
# Création d'un poste

```mermaid
sequenceDiagram
participant Navigateur
participant Route
participant Controller
participant Model
participant Vue

Navigateur->>Route: post("/") : Titre, affiche, synopsis
Route->>Controller: appelle d'une méthode d'un controller
Controller->>Model: insertion des données en base
Model->>Controller: succès de l'insertion des données
Controller->>Vue: passage des données à la vue
Vue->>Navigateur: retourne le rendu HTML

```
# Lecture d'un poste

```mermaid
sequenceDiagram
participant Navigateur
participant Route
participant Controller
participant Model
participant Vue

Navigateur->>Route: get("/") : Titre, affiche, synopsis
Route->>Controller: appelle d'une méthode d'un controller
Controller->>Model: insertion des données en base
Model->>Controller: succès de l'insertion des données
Controller->>Vue: passage des données à la vue
Vue->>Navigateur: retourne le rendu HTML

```
# Modification d'un poste

```mermaid
sequenceDiagram
participant Navigateur
participant Route
participant Controller
participant Model
participant Vue

Navigateur->>Route: post("/") : poste à modifier
Route->>Controller: appelle d'une méthode d'un controller
Controller->>Model: modification des données en base
Model->>Controller: succès de l'insertion des nouvelles données
Controller->>Vue: passage des données à la vue
Vue->>Navigateur: retourne le rendu HTML

```
# Suppression d'un poste

```mermaid
sequenceDiagram
participant Navigateur
participant Route
participant Controller
participant Model
participant Vue

Navigateur->>Route: get("/") : Choix du poste à supprimer
Route->>Controller: appelle d'une méthode d'un controller
Controller->>Model: suppression des données en base
Model->>Controller: succès de la suppression des données
Controller->>Vue: passage des données à la vue
Vue->>Navigateur: retourne un message de suppression

```

    Controller-->>View: [Update show (sucess)] 
    View-->>Controller: [Update show ()] 
    Controller-->>Navigateur: http Response 

    Controller-->>View: [Update show (fail)] 
    View-->>Controller: [Update show ()] 
    Controller-->>Navigateur: http Response
    end
```
