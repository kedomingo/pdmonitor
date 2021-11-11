# Simple PHP web health monitor using PagerDuty and Guzzle

The sample file webhealth.php makes a GET request to a fixed URL to monitor and checks the response code to be < 400.
If the response code is on the 400 or 500 level, then a call to the [Events V2 API](https://developer.pagerduty.com/docs/ZG9jOjExMDI5NTgw-events-api-v2-overview) will be made.

It uses the PagerDuty supported PHP SDK: https://github.com/adilbaig/pagerduty

## Requirements

* PHP >= 7.4
* composer

## Steps

#### 0. Clone this repository and run `composer install`
#### 1. Create a free PagerDuty account: https://support.pagerduty.com/docs/quick-start-guide
#### 2. Create your Service in PagerDuty: https://support.pagerduty.com/docs/services-and-integrations#section-create-a-new-service

Once this is done, go to the main menu > Services > Service Directory to see your service

<img width="1197" alt="Screen Shot 2021-11-11 at 1 11 18 PM" src="https://user-images.githubusercontent.com/1763107/141296831-2903a99b-4a4c-41b7-bcf6-e5710bab66a6.png">

#### 3. Go to the Integrations tab of your Service

<img width="1109" alt="Screen Shot 2021-11-11 at 1 11 35 PM" src="https://user-images.githubusercontent.com/1763107/141296902-4e9cfd8a-48ae-4f9e-be0b-c2bebacac976.png">

#### 4. Add Integration for Events API v2

<img width="1033" alt="Screen Shot 2021-11-11 at 1 11 56 PM" src="https://user-images.githubusercontent.com/1763107/141296938-2d398a82-3328-4828-b00d-69d7ffe72bb5.png">

Then after adding Events API v2, you will be back in the Integrations page. Copy the Integration Key from the Events API v2 section

<img width="1188" alt="Screen Shot 2021-11-11 at 1 13 03 PM" src="https://user-images.githubusercontent.com/1763107/141297057-2f5aecf3-6978-4a90-a725-255a68c236c3.png">

#### 5. Copy .env.sample to .env and put your integration key
#### 6. Modify the code in `webhealth.php` or copy it to a new file to replace the URL with whatever you want to check
#### 7. Run this script periodically using cron. For example you can run it every 5 minutes `*/5 * * * * php /path/to/your/monitoringfile.php`
