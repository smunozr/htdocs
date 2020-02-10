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
    <h2>Search Term: </h2><input type="search" id="q" name="q" placeholder="Enter Search Term">
  </div>
  <div>
    <h2>Max Results:</h2> <input type="number" id="maxResults" name="maxResults" min="1" max="100" step="1" value="25">
  </div>
  <br/>
  <input type="submit" value="BUSCAR">
</form>
END;

// This code will execute if the user entered a search query in the form
// and submitted the form. Otherwise, the page displays the form above.
if (isset($_GET['q']) && isset($_GET['maxResults'])) {
    /*
     * Set $DEVELOPER_KEY to the "API key" value from the "Access" tab of the
     * Google API Console <https://console.developers.google.com/>
     * Please ensure that you have enabled the YouTube Data API for your project.
     */
    $DEVELOPER_KEY = 'AIzaSyD0hesGVij2DHm1iiuO75OjJ5T0HuS4Y2o';

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
            'maxResults' => $_GET['maxResults'],
        ));

        $videos = '';
        $channels = '';
        $playlists = '';


        // Add each result to the appropriate list, and then display the lists of
        // matching videos, channels, and playlists.

        foreach ($searchResponse['items'] as $searchResult) {
            $url=<<<END
    <iframe></iframe>
END;

            switch ($searchResult['id']['kind']) {
                case 'youtube#video':
                    $videos .= sprintf('<li>%s (%s)</li>');
                        /*$searchResult['snippet']['title'], $searchResult['id']['videoId']);*/
                    break;
                case 'youtube#channel':
                    $channels .= sprintf('<li>%s (%s)</li>',
                        $searchResult['snippet']['title'], $searchResult['id']['channelId']);
                    break;
                case 'youtube#playlist':
                    $playlists .= sprintf('<li>%s (%s)</li>',
                        $searchResult['snippet']['title'], $searchResult['id']['playlistId']);
                    break;
            }
        }

        $htmlBody .= <<<END
    <h3 class="video">Videos</h3>
    <ul>$videos</ul>
    <h3>Channels</h3>
    <ul>$channels</ul>
    <h3>Playlists</h3>
    <ul>$playlists</ul>
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