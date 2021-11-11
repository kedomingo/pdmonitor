# Simple PHP web health monitor using PagerDuty and Guzzle

The sample file webhealth.php makes a GET request to a fixed URL to monitor and checks the response code to be < 400.
If the response code is on the 400 or 500 level, then a call to the [Events V2 API](https://developer.pagerduty.com/docs/ZG9jOjExMDI5NTgw-events-api-v2-overview)

It uses the PagerDuty supported PHP API: https://github.com/adilbaig/pagerduty

## Steps

1. Create a free PagerDuty account: https://support.pagerduty.com/docs/quick-start-guide
2. Create your Service in PagerDuty: https://support.pagerduty.com/docs/services-and-integrations#section-create-a-new-service
3. Add Integration for Events API v2
4. Modify the code to use your own Integration Key and URL to check

