# Bowling Game (OOD)

## Entities:

- GameSession
- Game
- Player
- Alleys - **const [1,2,3,4]**

## Classes:

### GameSession
- ID INT
- Players Player[]
- Alley INT

### Game
- ID INT
- Name STRING
- GameSession GameSession

### Player
- Name STRING
- Score INT
- Rolls INT

--------------------------------------

From src/public folder start php local server -
./../../php/php.exe -S localhost:8080 -c ../../php/php.ini

--------------------------------------

### Test Bowling Game Flow: