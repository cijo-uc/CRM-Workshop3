# Set Up Lead Capture

1. To setup Lead Capture go to http://localhost:8080

On the top right click on the drop down and  Administration And go to Lead Capture

Click on Create Entry Point

Give it a name such as "my Lead Capture API"

Make sure
1. Is Active is True.
2. Subscribe To Target List is False
3. Payload Fields contain First Name, Last Name, Email, Phone, Description

Click on Save.

This will give you an API Key.

Copy it.

## Add API Key to your webapp API for authentication.

Open the following script

`webapp/js/custom.js`

On line 94 you should find the following line.

`url: http://localhost:8080/api/v1/LeadCapture/b62c8819dda851591fcd4b725c4b2691`

Replace the trailing part of the URL with your API key.

This will let your frontend authenticate itself with Your CRM.

## Enable CORs access on your CRM

Exec into your docker container.

```shell 
docker exec -it espocrm /bin/bash
```

Run the following to install vi editor.

```shell
apt-get update && apt-get install vim
```

Edit the CRM configuration file to add a new option

```shell
vi data/config.php
```

Add the following line at the end before the bracket closes.

```php
 'leadCaptureAllowOrigin' => '*',
```

Save the file and run the following commands from the CRM docker shell.

```
php clear_cache.php
php rebuild.php
```

Try to enter a few leads from the Contact Us page or Car Details Page on your webapp.

They should start appearing on the CRM.