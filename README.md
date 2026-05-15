# Nodes Game (PHP)
A simple browser-based puzzle game built with PHP, sessions, and basic HTML/CSS.
## 🎮 About the Game
Nodes Game is a 4x4 grid-based puzzle where each node can be toggled between two states (ON/OFF).  
The goal is to turn all nodes into the same state to complete the game.
The game tracks progress using PHP sessions, so the state persists across page reloads.
---
## 🚀 Features
- 4x4 dynamic game grid
- Node state stored using PHP objects
- Session-based persistence
- Clickable grid interface
- Win condition detection
- Reset game functionality
- Visual UI using images for node states
- Locked state when game is completed
---
## 🧠 Technologies Used
- PHP (game logic + session management)
- HTML (structure)
- CSS (grid layout + styling)
- Basic HTTP GET requests (game interactions)
---
## 📂 Project Structure

/index.php        → Main game entry point
/Game.php         → Game logic (grid + rules)
/Node.php         → Node state logic
/images/          → UI assets (on/off states)
/styles.css       → Game styling

---
## 🎯 Game Logic
- Each cell is a Node object with a boolean state
- Clicking a node toggles its state
- The game checks after each move if all nodes are active
- If all nodes are active → game is completed and locked
---
## 🔁 Reset Game
The game can be reset using a reset button, which clears the session and starts a new game instance.
---
## 📸 UI
The grid is rendered dynamically using PHP loops and styled as a 4x4 board with visual feedback for each node state.
---
## 🧪 Future Improvements
- Replace GET navigation with POST + PRG pattern
- Add a step counter
---
## 📌 Status
Version 1 — fully playable prototype with session persistence and basic UI.
```
---