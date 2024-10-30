# Slack-Api-Laravel-Integration
I create my own workplace in laravel where our employees enter his full day report before punch out and i will send employee report to manager in company workplace



1) You have to login with your workplace email on slack api site https://slack.com/signin  and click on Your Apps menu on the top right side.
2) Click on Create New and select From Scrach then add your app name and select your workplace from drop down, click on save button to create.
3) The page opens look like this  
![image](https://github.com/user-attachments/assets/9e57978a-597e-4ae0-9098-382430e00cd5)
 4) Copy your Client ID and Client Secret for future use
 5)  User client id and secrect in controller functions print the variable data in your second function and you will get authed user id and access token you can use it in env file like this
    
Admin_Token = xoxb-6********4-7**********6-m2S*********K
Admin_ID    = UJ87ZHU9G

6) After this i create a helper function for sending user report to manager after punchout
7 ) In my controller i pass admin token and id from env and custom dynamic message to this helper function like this
 sendMessageFromUser(env('Admin_Token'),env('Admin_ID'), $content);  

and it works perfectly


