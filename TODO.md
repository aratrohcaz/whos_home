### On-going - In progress
  - Fix up indentation to be consistent
  - Add UUID for primary key and fix constructor for tables
  - Work out how the diff command is supposed to run (looks like it makes the diff from the schema directly, what if the user cannot create consistent column names?)

### Needs - Mod Priority (after fixes and schema is made easier to manage)
  - Add pre-flight check for nmap
  - Tasks(?) for scanning network
    - Needs ability to do single ip, subnet, and take other nmap arguments
    - Handle XML response back from nmap
    - Handle not being sudo when doing nmap scans (need to think about this more)
    - Needs to be cron-able, and not running several at once
  - Console app for interacting with data through SSH/shell connection

### Wants/Wish List - Low Priority
  - Interface for viewing the info
  - Email alter/notifications when a new device is seen
    - Pair in with away mode / intruder detection
  - Monthly Reports (csv or through interface, perhaps email?)
  - Ability to poke other devices and interact with them (e.g. Homekit/Zigbee protocols)
  - If host has ability to see wireless lans, profile the air space (would be pretty cool)
  - Handling of mac-spoofing? Unsure how to go about this just yet - would be ok if able to fingerprint the devices, but that may be spoofed as well?
