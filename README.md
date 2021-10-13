# Enes Doğan Final Project

Hi! I'm Enes, I have finished the final project with Laravel framework!


# Installation

1.  Clone this repository by `git clone https://github.com/teknasyon-bootcamp/enes-dogan-final-project.git`
2. `cd enes-dogan-final-project`
3. Run `composer install` if you don't have composer [visit](https://getcomposer.org/).
4. Run `cp .env.example .env` **.env.example** has already database connection credentials for docker container.
5. Run `docker-compose up` to up mySQL container if you don't have docker [visit](https://www.docker.com/).
6. Run `php artisan migrate:fresh --seed` to populate database with dummy data.
7. Run `php artisan serve` to start server.
8. Visit `http://127.0.0.1:8000/` or `http://127.0.0.1:8000/admin` demo account is shared below.

## Demo User Credentials

**email:** `enes@dogan.com`
**password:** `password`
**role:** `admin`

## Maintenance Mode Settings
You can turn on/off maintenance mode by running:
`php artisan maintenance:on` or
 `php artisan maintenance:off`

## Notes
I used 
- Laravel 8
- Bootstrap 5
- CKeditor
- spatie/laravel-permission
- docker-compose
- mySQL
technologies.

In admin create and edit pages I have tried to implement smart solution to generate forms:
In models:
```php
class News extends Model {
...
public $formColumns = [
    'title' => [
        'label' => 'Title',
        'type' => 'text',

    ],
    'body' => [
        'label' => 'Body',
        'type' => 'html',
    ],
    'category_id' => [
        'label' => 'Category',
        'type' => 'relationship',
        'relation_column' => 'name',
        'model' => Category::class
    ],
    'user_id' => [
        'label' => 'User',
        'type' => 'relationship',
        'relation_column' => 'name',
        'model' => User::class
    ],
    'is_draft' => [
        'label' => 'Save as draft',
        'type' => 'checkbox',
    ]
];
...
}
```
In blade
```php
<h1>Edit News</h1>  
<form method="post" action="{{route('admin.news.update',['news' => $model->id])}}">  
 @csrf  
 @method('put')  
 @include('forms.generic')  
 @include('forms.save')  
</form>
```

## Screenshots
![home](/images/home.png)
![news-detail](/images/news-detail.png)
![profile](/images/profile.png)
![activities](/images/activities.png)
![admin-panel](/images/admin-panel.png)
![news-list](/images/news-list.png)
![create-news](/images/create-news.png)
