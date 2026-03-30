# 💅 Fortuna Beauty - Enterprise-Grade Nail Salon Management System

[![WordPress](https://img.shields.io/badge/WordPress-6.4+-21759b?logo=wordpress&logoColor=white)](https://wordpress.org)
[![Docker](https://img.shields.io/badge/Docker-Enabled-2496ed?logo=docker&logoColor=white)](https://www.docker.com)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-4479a1?logo=mysql&logoColor=white)](https://www.mysql.com)

A premium, fully containerized WordPress solution designed for high-end nail salons and spas. This project bridges professional aesthetics with scalable infrastructure.

---

## 📖 Table of Contents
* [System Architecture](#-system-architecture)
* [Visual Features](#-visual-features)
* [Tech Stack](#-tech-stack)
* [Installation & Deployment](#-installation--deployment)
* [Advanced Configuration](#-advanced-configuration)
* [Development Workflow](#-development-workflow)
* [Security & Optimization](#-security--optimization)

---

## 🏗 System Architecture

The project follows a **Microservices-lite** approach using Docker Compose to isolate the web server from the database engine.

* **Service `wordpress`**: Runs on an Apache-PHP 8.2 environment, serving the CMS core.
* **Service `db`**: A dedicated MySQL 8.0 instance with persistent volume storage.
* **Networking**: Internal Docker bridge network ensures the database port (3306) is not exposed to the public internet, only accessible by the WordPress container.

---

## 🌟 Visual Features

### 💎 Professional UI/UX
* **Color Theory:** Soft pastel pink (#FFB6C1) palette curated for the beauty industry.
* **Interactive Particle System:** High-performance Vanilla JS floating heart effects (optimized to 0.2% CPU usage).
* **Booking CTA:** Sticky "Book Now" buttons strategically placed for maximum conversion.

### 📸 Portfolio Management
* **Masonry Layout:** Dynamic grid for nail art showcasing.
* **Lazy Loading:** Images are served with native lazy-loading to improve Largest Contentful Paint (LCP).

---

## 🛠 Tech Stack

| Layer | Technology | Details |
| :--- | :--- | :--- |
| **Engine** | WordPress Core | Custom Headless-ready architecture |
| **Database** | MySQL 8.0 | Optimized InnoDB storage engine |
| **Server** | Apache 2.4 | Configured with `.htaccess` for SEO-friendly URLs |
| **Runtime** | PHP 8.2 | Enhanced with OPcache for faster execution |
| **Orchestration** | Docker Compose | Version 3.8 specification |
| **Styling** | SCSS/CSS3 | Keyframe animations & Flexbox/Grid layouts |

---

## 🚀 Installation & Deployment

### 1. Environment Setup
Clone the repository and ensure Docker Desktop is running.

```bash
git clone [https://github.com/ThinhNguyenV/nail-salon.git](https://github.com/ThinhNguyenV/nail-salon.git)
cd nail-salon