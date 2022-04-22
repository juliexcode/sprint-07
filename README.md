#Sprint 07

lien figma pour les maquettes https://www.figma.com/file/yR2h3PDxzq1M5XaEb40ffH/Maquette-sprint-07?node-id=0%3A1
=======

# Diagrammes de séquence UML

## Sequence Ajout de Film

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
## Sequence Suppression de Film 

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
## Sequence Authentification

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


    
