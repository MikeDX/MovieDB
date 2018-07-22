# MovieDB
extendable small php / jquery app for querying different online movie databases

## Getting Started
* Clone the repository and copy app.inc.default to app.inc, setting your api keys inside
* Configure your server to point to the files (use php -S 0.0.0.0:8000 for example if you don't want to use a full web browser)
* Visit http://(your_ip) in a browser
* Enter the name (or part) of a movie to search for and hit one of the 3 provider buttons


## Notes
* the IMDB api seems to have an issue and a search only returns one result, so OMDB and TMDB are preferred
* The more information page currently shows an image if available, but a broken img tag if not
* Pressing "Back" after clicking "more info" does not re-display the search results
