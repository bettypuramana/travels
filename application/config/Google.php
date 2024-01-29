<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
//adding config items. get google auth clietn id,secret keys from http://console.developers.google.com
$config['OAUTH2_CLIENT_ID'] = '490321647201-oe4uuh4cll7njn9cni4ql3fbpm4qekit.apps.googleusercontent.com'; //your auth 2.0 client id 
$config['OAUTH2_CLIENT_SECRET'] = 'xZZZHSPv3abrGttBQTOfkETp';//your auth 2,0 client secret 
$config['REDIRECT_URI'] = 'http://myinstituter.com/my/Institutes/Youtube/create'; //Authorized redirect URIs a callback url which you should save in google console
