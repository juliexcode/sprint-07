Lien figma pour les maquettes https://www.figma.com/file/yR2h3PDxzq1M5XaEb40ffH/Maquette-sprint-07?node-id=0%3A1

#Diagrammes de séquence UML

```mermaid
sequenceDiagram
    autonumber
    Admin->>View: Click "Ajouter" Button [addMovie] 
    View->>Controller: addMovie () 
    Controller->>Model: addMovie (table, data) 
    Model-->>Controller: [added] 
    Controller-->>View: [Update View] 
    View-->>Admin: Show Users
```

```mermaid
sequenceDiagram
    autonumber
    Admin->>View: Click "Supprimer" Button [deleteMovie]
    View->>Controller: deleteMovie ()
    Controller->>Model: deleteMovie (table, data)
    Model-->>Controller: [deleted]
    Controller-->>View: [Update View]
    View-->>Admin: Show Users
```

```mermaid
sequenceDiagram
    autonumber
    Admin->>Controller: http Request (login_data) 
    Controller->>Model: request Loginvalidation (login_data) 
    Model->>Controller: return logvalid 

     alt 
    Controller-->>View: [Update View (sucess)] 
    View-->>Controller: [Update View ()] 
    Controller-->>Admin: http Response 

    Controller-->>View: [Update View (fail)] 
    View-->>Controller: [Update View ()] 
    Controller-->>Admin: http Response
    end
```