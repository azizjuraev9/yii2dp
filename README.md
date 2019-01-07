
# yii2dp
This extension allows you to add setting to your yii2 based web site
### Install
**to install run:**

    composer require juraev/yii2dp
**Init table:**

    yii migrate --migrationPath=@vendor/juraev/yii2dp/migrations
**Configure module:**

```
'modules' => [
	...
	'yii2dp' => [
		'class' => 'juraev\yii2dp\admin\Module',    
		'params' => [
		
			// Usernames who can change settings
			'editor_usernames' => ['username1','username2'],
			
			// User roles who can change settings
			'editor_role' => 'role',
			
			// Usernames who can create, update, delete settings
			'creator_usernames' => ['username1','username2'],
			
			// User roles who can create, update, delete settings
			'editor_role' => 'creator_role',
		],
	],
	...
 ], 
 ```
**To use settings:**

    juraev\yii2dp\Params::get('key')
   this will return the value of `key`
