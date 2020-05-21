<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Matches</title>
    <link rel="stylesheet" href="matches.css">
  </head>
  <body>
      <header>
          <div class="wrapper">
            <div class="logo">
              <img src="image/" alt="">
          </div>
        </div>
        <div class="sport_selection">
          <select>
            <option value="type">Select a sport type...</option>
          </select>
        </div>

        <div class="matches">
        <table id="matchTable">
          <tr>
            <th>League</th>
            <th>Bet ID</th> 
            <th>MBN</th>
            <th>Team 1</th>
            <th>Team 2</th>
          </tr>
        </table>
        </div>
      <div class="matchlabel">
        <h1>Matches</h1>
      </div>
      <div class="livelabel">
        <h1>Live Match</h1>
      </div>
        <div class="live_matches">
          <h1 class="live_match_link">Click here to go to the live match</h1>
        </div>
        <div class="filter">
        <select>
            <option value="type">Filters</option>
            <option value="type">Team</option>
            <option value="type">MBN</option>
            <option value="type">League</option>
            <option value="type">Bet ID</option>
        </select>
        </div>
      </header>
  </body>
</html>