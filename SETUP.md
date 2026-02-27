# Setup: Docker + Xdebug for LeetCode (Cursor / IntelliJ)

This guide helps you set up a local environment for debugging PHP algorithms.

---

## 1. Docker

### Starting the environment

```bash
make up          # Start containers
make start       # Start + composer install
make build       # Rebuild (after Dockerfile changes)
make down        # Stop
```

### Running a solution from the console

```bash
make run-script SRC=src/Stack/EvaluateReversePolishNotation/Solution.php
```

Or inside the container:
```bash
make enter-php
# inside container:
php /var/www/html/src/Stack/EvaluateReversePolishNotation/Solution.php
```

---

## 2. Cursor (VS Code)

### Step 1: Extension

1. Open **Extensions** (Ctrl+Shift+X)
2. Find and install **"PHP Debug"** by Xdebug (`xdebug.php-debug`)

### Step 2: Starting the debug session

1. **Start Docker:** `make up` (or `make start`)
2. Open any `Solution.php`, set a **breakpoint** (click left of line number)
3. **Run and Debug** (Ctrl+Shift+D) → select **"Listen for Xdebug (Docker)"** → ▶️ Start Debugging
4. In the terminal, run:
   ```bash
   make run-script SRC=src/Stack/EvaluateReversePolishNotation/Solution.php
   ```
5. Execution will stop at the breakpoint

### Running from the IDE

1. Open any `Solution.php`
2. **Command Palette** (Ctrl+Shift+P) → **"Tasks: Run Task"** → **"Run current PHP in Docker"**
3. Or set a shortcut: **File → Preferences → Keyboard Shortcuts** → search `Run Task` → add for **"workbench.action.tasks.runTask"** with `args: "Run current PHP in Docker"` — e.g. **Ctrl+Shift+R**

If you start **Listen for Xdebug (Docker)** first, the task will pick up the debug session and breakpoints will work.

### Alternative: local PHP

If you have PHP with Xdebug installed locally, use **"Launch current PHP file (local)"**: open the file and start debug (F5).

---

## 3. IntelliJ IDEA / PhpStorm

Xdebug is preconfigured in `.idea/`. Ensure Docker is running.

### Verifying settings

1. **Settings → PHP** — interpreter **php-fpm** (Docker Compose) should be present
2. **Settings → PHP → Servers** — server **web** with mapping `$PROJECT_DIR$` → `/var/www/html`
3. **Settings → PHP → Debug** — port **9003**, ✅ Can accept external connections

### Debugging

**Method 1 — from file**

1. Open any `Solution.php`
2. Set a **breakpoint** (click left of line number)
3. **Right-click file** → **Debug 'Solution.php'**
4. Or select **Solution (Docker)** in Run → change **File** to the desired script

**Method 2 — Listen + terminal**

1. **Run → Start Listening for PHP Debug Connections** (phone icon in toolbar)
2. In terminal: `make run-script SRC=src/Stack/EvaluateReversePolishNotation/Solution.php`
3. Breakpoint will trigger when the script runs

### If php-fpm interpreter fails

**Settings → PHP → CLI Interpreter** → **+** → **From Docker, Vagrant, VM...** → **Docker Compose**:
- **docker-compose.yml:** `docker/docker-compose.yml`
- **Service:** `php-fpm`
- **Remote project path:** `/var/www/html`

---

## 4. Verification

1. `make up` — containers are running
2. `make run-script SRC=src/Stack/EvaluateReversePolishNotation/Solution.php` — script runs
3. Cursor/PhpStorm: breakpoint in `Solution.php` → Listen for Xdebug → `make run-script` — execution stops at breakpoint

---

## Troubleshooting

| Problem | Solution |
|---------|----------|
| Xdebug won't connect | Cursor: ensure **Listen for Xdebug (Docker)** is running in Run and Debug. IntelliJ: phone icon (Listen) |
| Breakpoint doesn't trigger | Make sure you use the **Docker interpreter** in Run Configuration |
| host.docker.internal not found | On Linux, add to docker-compose under php-fpm: `extra_hosts: ["host.docker.internal:host-gateway"]` |
