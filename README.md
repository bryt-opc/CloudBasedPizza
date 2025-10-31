# 🍕 Cloud Based Pizza

A cloud-ready pizza ordering platform built with **Laravel 12**, **Vue 3 (Vite)**, **Nginx**, **MySQL**, and **Docker Compose**.

---

## 🚀 Powered By
- **Laravel 12** – Backend framework  
- **Vue 3 with Vite** – Frontend UI  
- **Nginx** – Web server  
- **MySQL** – Database  
- **Docker Compose** – Containerized environment  

---

## 🧩 Requirements
Before you begin, make sure the following are installed on your system:

- **PHP 8.3**
- **Composer 2+**
- **Node 22+**
- **NPM**
- **MySQL**
- **Docker & Docker Compose**
- **Postman** (for API testing)
- **MySQL Workbench** or your preferred database client

---

## 🛠️ Local Setup Instructions

1. **Clone the repository**
   ```bash
   git clone https://github.com/bryt-opc/CloudBasedPizza.git
   ```

2. **Navigate to the project directory**
   ```bash
   cd CloudBasedPizza
   ```

3. **Run Docker containers**
   ```bash
   docker-compose up -d --build
   ```

4. **Access the application**
   Open your browser and visit:  
   👉 [http://localhost:30000](http://localhost:30000)

5. **API Resources**
   API base URL:  
   👉 [http://localhost:30000/api/v1](http://localhost:30000/api/v1)

6. **Postman Collection**
   Import `CloudBasedPizzaAPIDocumentation.postman_collection.json` into Postman to test available endpoints.

---

## 📦 Notes
- Ensure all Docker containers are running before accessing the app.  
- The frontend and backend are both served through Nginx inside Docker.  
- You may configure environment variables in `.env` as needed.

---

## 💡 Author
**Bryan Angelo Trinidad**  
[GitHub Profile](https://github.com/bryt-opc)
