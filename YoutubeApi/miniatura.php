<?php


/**
 * Library Requirements
 *
 * 1. Install composer (https://getcomposer.org)
 * 2. On the command line, change to this directory (api-samples/php)
 * 3. Require the google/apiclient library
 *    $ composer require google/apiclient:~2.0
 */
if (!file_exists(__DIR__ . '/google/vendor/autoload.php')) {
    throw new \Exception('please run "composer require google/apiclient:~2.0" in "' . __DIR__ . '"');
}

require_once __DIR__ . '/google/vendor/autoload.php';

$htmlBody = <<<END
<form method="GET">
  <div>
    TITULO: <input type="search" id="q" name="q" placeholder="Enter Search Term">
  </div>
 <!-- <div>
    RESULTADOS MAXIMOS: <input type="number" id="maxResults" name="maxResults" min="1" max="10" step="1" >
  </div>-->
  <input type="submit" value="Search">
</form>
END;

// This code will execute if the user entered a search query in the form
// and submitted the form. Otherwise, the page displays the form above.
if ( isset($_GET['q'])) {
    /* && isset($_GET['maxResults'])
     * Set $DEVELOPER_KEY to the "API key" value from the "Access" tab of the
     * Google API Console <https://console.developers.google.com/>
     * Please ensure that you have enabled the YouTube Data API for your project.
     */
    $DEVELOPER_KEY = 'AIzaSyAA54HICk4u-B9-cSYRfKlYq3oDNRumk-A';

    $client = new Google_Client();
    $client->setDeveloperKey($DEVELOPER_KEY);

    // Define an object that will be used to make all API requests.
    $youtube = new Google_Service_YouTube($client);

    $htmlBody = '';
    try {

        // Call the search.list method to retrieve results matching the specified
        // query term.
        $searchResponse = $youtube->search->listSearch('id,snippet', array(
            'q' => $_GET['q'],
            'maxResults' => 1,
        ));

        $video = '';
        $channels = '';
        $playlists = '';

        // Add each result to the appropriate list, and then display the lists of
        // matching videos, channels, and playlists.
         foreach ($searchResponse['items'] as $searchResult) {
               $video = $searchResult['snippet']['title'];
                $img='<img src="https://i.ytimg.com/vi/'.$searchResult['id']['videoId'].'/maxresdefault.jpg" width="200px" height="100px">';
           }



      /*  if($searchResponse["id"]["kind"]=='youtube#video'){
            $video=$searchResponse['snippet']['title'];
            $img='<img src=\"i1.ytimg.com/vi/'.$searchResponse[]['id']['videoId'].'/maxresdefault.jpg';
        }*/

        $htmlBody .= <<<END
    $video
    $img
END;
    } catch (Google_Service_Exception $e) {
        $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
            htmlspecialchars($e->getMessage()));
    } catch (Google_Exception $e) {
        $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
            htmlspecialchars($e->getMessage()));
    }
}
?>

<!doctype html>
<html>
<head>
    <title>YouTube Search</title>
</head>
<body>
<?= $htmlBody ?>
</body>
</html>