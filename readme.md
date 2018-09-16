10 Step for create laravel app with Mobility CMS

1. Download git From: https://git-scm.com/downloads
2. Download composer from: https://getcomposer.org/download/ 
3. Install composer
4. Donwload mysql from: https://www.mysql.com/downloads/
5. Run this command using git bash:
	git clone https://bitbucket.org/mobilitydevteam/mobility-cms {project_name}
6. cd on you project dir and run this command via terminal or cmd:
	composer update
7. If you have not renamed the .env.example file to .env, you should do that now. If the application key is not set, your user sessions and other encrypted data will not be secure!
8. Run this command using terminal or cmd:
	php artisan key:generate
9. For datebase migration run this command:
	php artisan migrate
10. Run this command for start server:
	php artisan serve
	
Done
	