# Frontend of the Referral System made using Laravel

Kindly migrate all the tables and execute command 'php artisan serve' to start the server.

# The challenge/task

Develop a referrals feature using Laravel 8 and React. This feature is heavily inspired by Dropbox's referral https://www.dropbox.com/referrals so it would be a great reference for this task. For every successful referral (meaning you get a user to sign up using your referral link), you will get one point.

## Task Specifications

* Allow users to login and register
* Develop a new page `<domain>/referrals` to show a form where the user can input multiple emails to invite.
* This page should be written in react or should use a react component where the input is a multi-select _similar to dropbox_.
* Send an email notification to the invited email. The email's content doesn't have to be fancy, it can contain a simple instruction and link to the registration page with the referral link `<domain>/?refer=<code>`
* For each successful and new registrations with referral, increase the number of referrals count of the referrer.

## Notes
* Users who are invited already cannot be invited again.
* Existing users cannot be invited.
* A user can have a maximum of 10 successful referrals.

## Bonus Points
* Create a new page for an admin user `<domain>/admin/referrals` that shows the list of all the referrals made in the system. Columns can be referrer, email referred, date, status
