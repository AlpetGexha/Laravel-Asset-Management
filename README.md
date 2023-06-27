# Asset Management

**Asset Management** it's any process a company or organization uses to keep track of the equipment and inventory vital to the day-to-day operation of their business.

ADMIN USER
![Admin-Page](https://github.com/AlpetGexha/Laravel-Asset-Management/assets/50520333/4136f2f4-1ec4-41d3-a821-a17ea5d0b3dc)

<details close>
<summary>Dark Mode</summary>
    
![Admin-User-Dark-Mode](https://github.com/AlpetGexha/Laravel-Asset-Management/assets/50520333/72742629-abeb-4d65-9f88-bbda7cc5426e)

</details>

NORMAL USER
![screencapture-127-0-0-1-8000-admin-2023-06-27-18_53_11](https://github.com/AlpetGexha/Laravel-Asset-Management/assets/50520333/286d1a87-9eb3-4f0b-a420-89a0ddba20dd)


# Installation
```
git clone https://github.com/AlpetGexha/Laravel-Asset-Management.git
cd Laravel-Asset-Management-master
composer install
cp .env.example .env
php artisan migrate --seed
```

### Start Project

``` 
php artisan serve
```
# Users

**(Super Admin)**
``` 
Email   : admin@admin.com
Password: admin
```

**(Normal User)**
``` 
Email   : user@user.com
Password: user
```

Change the email configuration to get all the feature 
```bash
MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
```
