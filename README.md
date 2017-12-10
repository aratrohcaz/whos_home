#Who's Home

A collection of php files to maintain a persistant list of devices. 

## Purpose
Keep a list of device hardware addresses and when they are/aren't visible on the network, as well as provide a history of when and any additional information on them. With this information, the user is able to determine times when network load (or personnel are on site/at home) is low and can utilise the bandwith.

## Reason
I share a supremely slow connection and would like to know when the right time to do on-demand backups would be ideal, as well as utilising a similar service in other places (e.g. work).

## TODO
 - Update this document
 - Remove unused files/the Net_Nmap folder
 - Finish off a basic yml-doctine builder/find one
 - potentially scrap this project and shift it to symfony, though a nice cli interface would be favourable for remote shell sessions

### Notes
#### Loaned code from
  - http://pear.php.net/package/Net_Nmap/ v1.0.5
