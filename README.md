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
- GameSessions map[GameSessionID]GameSession
- Alleys - **const [1,2,3,4]**

### Player
- Name STRING
- MAX_ROLLS_ALLOWED INT **const**
- Rolls INT
- Score INT
- CanPlay BOOL
- FirstRoll BOOL
- CurrentRoll INT
- FrameIndex INT

--------------------------------------

From src/public folder start php local server -
./../../php/php.exe -S localhost:8080 -c ../../php/php.ini

--------------------------------------

### Test Bowling Game Flow: