<?php
require_once 'php/steamApi.php';
$api = new SteamApi();

class Player {
    // public $name;
    public $id;
    public $game_list;

    function __construct($id = false, $name = false) {
      global $api;
      $this->id = $id;
      if ($name) {
        if (($result = $api->GetIdFromUrl($name))) {
          $this->id = $result;
        };
      }
      // Retrieving user's display name
      // $this->name = $api->GetPlayerSummaries($this->id)['personaname'];
    }

    public function getOwnedGames() {
      global $api;
      $this->game_list = $api->GetOwnedGames($this->id);
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Your lazy game selector</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div>
    <?php
      //$player1 = $_REQUEST['player1'];
      //$player2 = $_REQUEST['player2'];
      $player1 = new Player($id = false, $name = 'arkandiasmaniac');
      $player2 = new Player('76561197994769476', 'obayemi');

      // $player1->getOwnedGames();
      // foreach ($player1->game_list as $key) {
      //   echo "<p>{$key['appid']}</p>";
      // }
      // echo $player1->name;
    ?>
  </div>
</body>
</html>
