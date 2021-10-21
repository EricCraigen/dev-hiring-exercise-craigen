# dev-hiring-exercise-craigen
 My dev hiring exercise for CircleLink Health.

Pull repository.
Make a new .env file and set up for development.
Run composer update, npm install, and artisan key:generate.

Environment Notes:

memory_limit in php.ini set to 512M to give extra head room for the seeding.
I know that server resources are very expensive and would love to make the seeding more
efficient if possible to alleviate this concern.

When exporting with 50k records, the queued jobs can take some time to generate the .csv file.
I have added an attribute to the user model called has_export. Then when the excel jobs are done processing,
another job is triggered to update the user that requested the export to have an export file to download and then
display a button to download conditionally. I don't really like this solution as there is no indication to the user
that the report is still running. I would also like to make this process more efficient and user friendly.
