# MixedSeeds
Initially created to be a webcrawler but was turned into a perosnal article feed, that replicates an RSS feed. Developed using PHP5.

The website relies on two scripts to work:

**"FindArticles.php"** - This script searches for specific articles tailored to the user's interest (more on how this works later) and inputs the article name, article link, genre of article, and timestamp into a mysql database. 

This is NOT executed when the website is loaded up. Ideally, this script is run every hour by a webserver.

**"outPutArticle.php"** - Performs an SQL query on the database to retrieve the information and display them on the website.

The **"Previous Version"** folder contains the scripts for when the website did not incorporate an sql database and instead fetched every article when it was loaded up.







## OUTDATED INFORMATION
Functionality

Three arrays are created that contain the information to retrieve the appropriate headlines, [blank] is replaced with the genre fo the article:

$[blank]SearchTerms - An array that contains all the search terms that will be used to find the correct articles. Case Insensitive

$[blank]UrlArray - The array contains all the websites that will be searched. The URL used here is the home url of the website.

$[blank]ExtensionArray - The array contains the extar part of the URL that directs to the part of the website that contains the articles.

For example if you wanted news about a specific business, e.g Marks & Spencer, You put the search terms in the first array ; 'M&S', 'Marks & Spencer'.

The second array would contain the websites home url you want to search, e.g 'http://bbc.co.uk'. 'http://' must be included in the url.

The third array would contain the page you want to search articles on e.g '/news/business'.
