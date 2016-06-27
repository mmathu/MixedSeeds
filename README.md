# MixedSeeds
Initially created to be a webcrawler but was turned into a perosnal article feed, that replicates an RSS feed. Developed using PHP5.

##Functionality
#######Initialising Arrays
Three arrays are created that contain the information to retrieve the appropriate headlines, [blank] is replaced with the genre fo the article:

$[blank]SearchTerms - An array that contains all the search terms that will be used to find the correct articles. Case Insensitive

$[blank]UrlArray - The array contains all the websites that will be searched. The URL used here is the home url of the website.

$[blank]ExtensionArray - The array contains the extar part of the URL that directs to the part of the website that contains the articles.

For example if you wanted news about a specific business, e.g Marks & Spencer, You put the search terms in the first array ; 'M&S', 'Marks & Spencer'.

The second array would contain the websites home url you want to search, e.g 'http://bbc.co.uk'. 'http://' must be included in the url.

The third array would contain the page you want to search articles on e.g '/news/business'.
