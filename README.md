lien figma pour les maquettes https://www.figma.com/file/yR2h3PDxzq1M5XaEb40ffH/Maquette-sprint-07?node-id=0%3A1

classDiagram
    View --|> User
    User --|> Controller
    Controller --|> View
    Controller --|> Model
    Model --|> View
    Model --|> Controller

    class View{
        +int age
        +isMammal()
    }
    class User{
      +String beakColor
      +quack()
    }
    class Controller{
      -int sizeInFeet
      -canEat()
    }
    class Model{
      +bool is_wild
      +run()
    }
    
