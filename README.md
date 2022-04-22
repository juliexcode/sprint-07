SPRINT	 07 
=======
Site 100% Laravel


## Visualiser le site
Pour pouvoir visualiser notre site: [Zanbob](perianmodely-julie.sprint-07-laravel.sc1lgvu9627.universe.wf)
 
## La maquette
Lien Figma pour visualiser la maquette: [maquette du site Zanbob](https://www.figma.com/file/yR2h3PDxzq1M5XaEb40ffH/Maquette-sprint-07?node-id=0%3A1)


# Diagrammes de séquence UML

## Séquence Ajout de Film

```mermaid
sequenceDiagram
    autonumber
    Admin->>View: Click "Ajouter" Button [store] 
    View->>Controller: store () 
    Controller->>Model: store (table, data) 
    Model-->>Controller: [added] 
    Controller-->>View: [Update View] 
    View-->>Admin: Show Users
```
## Séquence Suppression de Film 

```mermaid
sequenceDiagram
    autonumber
    Admin->>View: Click "Supprimer" Button [destroy]
    View->>Controller: destroy ()
    Controller->>Model: destroy (table, data)
    Model-->>Controller: [deleted]
    Controller-->>View: [Update View]
    View-->>Admin: Show Users
```
## Séquence Authentification

```mermaid
sequenceDiagram
    autonumber
    Admin->>Controller: http Request (login_data) 
    Controller->>Model: request AUTH (login_data) 
    Model->>Controller: return logvalid 

     alt 
    Controller-->>View: [Update show (sucess)] 
    View-->>Controller: [Update show ()] 
    Controller-->>Admin: http Response 

    Controller-->>View: [Update show (fail)] 
    View-->>Controller: [Update show ()] 
    Controller-->>Admin: http Response
    end
```
