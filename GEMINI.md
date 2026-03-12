# CYNA Web Version - Project Context

This is a Symfony 8.0 web application designed as a SaaS platform for cybersecurity services (SOC, EDR, XDR, etc.).

## Project Overview

- **Framework:** Symfony 8.4
- **PHP Version:** 8.4 (A portable version is included in the `php-8.4/` directory)
- **Database:** Doctrine ORM (Configured in `config/packages/doctrine.yaml`)
- **Frontend:** 
    - Twig templates (`templates/`)
    - Bootstrap 5 (loaded via CDN in `base.html.twig`)
    - Custom Glassmorphism UI (defined in `<style>` block in `base.html.twig`)
    - Symfony AssetMapper and Stimulus for JavaScript functionality
- **Architecture:** Standard Symfony MVC structure with a focus on a "vitrine" (showcase) approach initially.

## Key Directories

- `src/`: Contains application logic (Controllers, Entities, etc.).
- `templates/`: Twig templates for the frontend.
- `public/`: Web root (contains `index.php`).
- `config/`: Configuration files for Symfony and its bundles.
- `php-8.4/`: Local, portable PHP 8.4 installation.
- `assets/`: Stimulus controllers and CSS assets.
- `migrations/`: Doctrine database migrations.

## Building and Running

### Prerequisites
- PHP 8.4 (use the local one in `php-8.4/` if not installed globally)
- Composer

### Local Development Server
To start the built-in Symfony server:
```powershell
.\php-8.4\php.exe -S localhost:8000 -t public
```
Or if you have the Symfony CLI installed:
```powershell
symfony serve
```

### Dependency Management
```powershell
.\php-8.4\php.exe .\php-8.4\composer install
```

### Database Migrations
```powershell
.\php-8.4\php.exe bin/console doctrine:migrations:migrate
```

### Running Tests
```powershell
.\php-8.4\php.exe bin/phpunit
```

## Development Conventions

- **Coding Style:** Follow PSR-12 and Symfony coding standards.
- **Controllers:** Use Attributes for routing (e.g., `#[Route('/', name: 'app_home')]`).
- **Templates:** Use `base.html.twig` as the master layout. Frontend is currently using a Dark Mode + Glassmorphism aesthetic.
- **Assets:** Use Symfony AssetMapper for managing JS/CSS instead of Webpack Encore/Vite (unless switched later).
- **Commands:** Always prefer the local PHP version `.\php-8.4\php.exe` for consistency when running `bin/console` or `composer`.

## Roadmap / Current State
- [x] Initial Symfony 8.0 setup with PHP 8.4.
- [x] Basic "Vitrine" (Home page) with Hero, Carousel, and Services sections.
- [ ] Implement Product/Service catalog management in Back-office.
- [ ] Connect Contact form to a mailer or database.
- [ ] Implement User authentication and Dashboard.
