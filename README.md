# MovieDB
extendable small php / jquery app for querying different online movie databases

## Getting Started
* Clone the repository and copy app.inc.default to app.inc, setting your api keys inside
* Configure your server to point to the files (use php -S 0.0.0.0:8000 for example if you don't want to use a full web server)
* Visit http://(your_ip) in a browser
* Enter the name (or part) of a movie to search for and hit one of the 3 provider buttons


## Notes
* The mixture of oo and flat php files are used for convenience based upon the task in hand. Given more time the whole app would be built using a simple oo framework
* the IMDB api seems to have an issue and a search only returns one result, so OMDB and TMDB are preferred
* The more information page currently shows an image if available, but a broken img tag if not
* Pressing "Back" after clicking "more info" does not re-display the search results
* The original IMDB api php file wasn't very DRY, and had various issues, so it has been refactored.
* The moviedb class was introduced for a common interface for different movie db api endpoints and can support others easily
* If used seriously, some code should be changed to hide the api keys, currently this is only setup for convenience.
* All code has been checked via codesniffer, so whilst it may not follow the standards that everyone would choose, it should be consistent throughout in teems of spacing, formatting and doc blocks
